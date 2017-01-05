<?php
//zend by QQ:2172298892
namespace app\http\admin\controllers;

class Upload extends \app\http\base\controllers\Backend
{
	private $conf = array();

	public function __construct()
	{
		parent::__construct();
		config('SHOW_PAGE_TRACE', false);
		l(require LANG_PATH . c('shop.lang') . '/user.php');
		$this->content = file_get_contents(ROOT_PATH . 'resources/assets/vendor/editor/config.json');
		$this->conf = json_decode(preg_replace('/\\/\\*[\\s\\S]+?\\*\\//', '', str_replace('__ROOT__', dirname(__ROOT__), $this->content)), true);
	}

	public function actionIndex()
	{
		$action = i('get.action');

		switch ($action) {
		case 'config':
			$result = json_encode($this->conf);
			break;

		case 'uploadimage':
		case 'uploadscrawl':
		case 'uploadvideo':
		case 'uploadfile':
			$result = $this->uploads();
			break;

		case 'listimage':
			$result = $this->lists();
			break;

		case 'listfile':
			$result = $this->lists();
			break;

		case 'catchimage':
			$result = $this->crawler();
			break;

		default:
			$result = json_encode(array('state' => l('request_url_error')));
			break;
		}

		if (isset($_GET['callback'])) {
			if (preg_match('/^[\\w_]+$/', $_GET['callback'])) {
				echo htmlspecialchars($_GET['callback']) . '(' . $result . ')';
			}
			else {
				echo json_encode(array('state' => l('parameter_error')));
			}
		}
		else {
			echo $result;
		}
	}

	private function uploads()
	{
		$base64 = 'upload';

		switch (htmlspecialchars($_GET['action'])) {
		case 'uploadimage':
			$config = array('pathFormat' => $this->conf['imagePathFormat'], 'maxSize' => $this->conf['imageMaxSize'], 'allowFiles' => $this->conf['imageAllowFiles']);
			$fieldName = $this->conf['imageFieldName'];
			break;

		case 'uploadscrawl':
			$config = array('pathFormat' => $this->conf['scrawlPathFormat'], 'maxSize' => $this->conf['scrawlMaxSize'], 'allowFiles' => $this->conf['scrawlAllowFiles'], 'oriName' => 'scrawl.png');
			$fieldName = $this->conf['scrawlFieldName'];
			$base64 = 'base64';
			break;

		case 'uploadvideo':
			$config = array('pathFormat' => $this->conf['videoPathFormat'], 'maxSize' => $this->conf['videoMaxSize'], 'allowFiles' => $this->conf['videoAllowFiles']);
			$fieldName = $this->conf['videoFieldName'];
			break;

		case 'uploadfile':
		default:
			$config = array('pathFormat' => $this->conf['filePathFormat'], 'maxSize' => $this->conf['fileMaxSize'], 'allowFiles' => $this->conf['fileAllowFiles']);
			$fieldName = $this->conf['fileFieldName'];
			break;
		}

		$up = new \ectouch\Uploader($fieldName, $config, $base64);
		return json_encode($up->getFileInfo());
	}

	private function lists()
	{
		switch ($_GET['action']) {
		case 'listfile':
			$allowFiles = $this->conf['fileManagerAllowFiles'];
			$listSize = $this->conf['fileManagerListSize'];
			$path = $this->conf['fileManagerListPath'];
			break;

		case 'listimage':
		default:
			$allowFiles = $this->conf['imageManagerAllowFiles'];
			$listSize = $this->conf['imageManagerListSize'];
			$path = $this->conf['imageManagerListPath'];
		}

		$allowFiles = substr(str_replace('.', '|', join('', $allowFiles)), 1);
		$size = (isset($_GET['size']) ? htmlspecialchars($_GET['size']) : $listSize);
		$start = (isset($_GET['start']) ? htmlspecialchars($_GET['start']) : 0);
		$end = $start + $size;
		$path = $_SERVER['DOCUMENT_ROOT'] . (substr($path, 0, 1) == '/' ? '' : '/') . $path;
		$files = $this->getfiles($path, $allowFiles);

		if (!count($files)) {
			return json_encode(array(
	'state' => 'no match file',
	'list'  => array(),
	'start' => $start,
	'total' => count($files)
	));
		}

		$len = count($files);
		$i = min($end, $len) - 1;

		for ($list = array(); $start <= $i; $i--) {
			$list[] = $files[$i];
		}

		$result = json_encode(array('state' => 'SUCCESS', 'list' => $list, 'start' => $start, 'total' => count($files)));
		return $result;
	}

	private function crawler()
	{
		set_time_limit(0);
		$config = array('pathFormat' => $this->conf['catcherPathFormat'], 'maxSize' => $this->conf['catcherMaxSize'], 'allowFiles' => $this->conf['catcherAllowFiles'], 'oriName' => 'remote.png');
		$fieldName = $this->conf['catcherFieldName'];
		$list = array();

		if (isset($_POST[$fieldName])) {
			$source = $_POST[$fieldName];
		}
		else {
			$source = $_GET[$fieldName];
		}

		foreach ($source as $imgUrl) {
			$item = new \ectouch\Uploader($imgUrl, $config, 'remote');
			$info = $item->getFileInfo();
			array_push($list, array('state' => $info['state'], 'url' => $info['url'], 'size' => $info['size'], 'title' => htmlspecialchars($info['title']), 'original' => htmlspecialchars($info['original']), 'source' => htmlspecialchars($imgUrl)));
		}

		return json_encode(array('state' => count($list) ? 'SUCCESS' : 'ERROR', 'list' => $list));
	}

	private function getfiles($path, $allowFiles, &$files = array())
	{
		if (!is_dir($path)) {
			return null;
		}

		if (substr($path, strlen($path) - 1) != '/') {
			$path .= '/';
		}

		$handle = opendir($path);

		while (false !== ($file = readdir($handle))) {
			if (($file != '.') && ($file != '..')) {
				$path2 = $path . $file;

				if (is_dir($path2)) {
					$this->getfiles($path2, $allowFiles, $files);
				}
				else if (preg_match('/\\.(' . $allowFiles . ')$/i', $file)) {
					$files[] = array('url' => substr($path2, strlen($_SERVER['DOCUMENT_ROOT'])), 'mtime' => filemtime($path2));
				}
			}
		}

		return $files;
	}
}

?>
