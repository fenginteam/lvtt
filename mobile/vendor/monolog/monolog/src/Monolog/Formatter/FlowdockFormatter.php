<?php
//dezend by  QQ:2172298892
namespace Monolog\Formatter;

class FlowdockFormatter implements FormatterInterface
{
	/**
     * @var string
     */
	private $source;
	/**
     * @var string
     */
	private $sourceEmail;

	public function __construct($source, $sourceEmail)
	{
		$this->source = $source;
		$this->sourceEmail = $sourceEmail;
	}

	public function format(array $record)
	{
		$tags = array('#logs', '#' . strtolower($record['level_name']), '#' . $record['channel']);

		foreach ($record['extra'] as $value) {
			$tags[] = '#' . $value;
		}

		$subject = sprintf('in %s: %s - %s', $this->source, $record['level_name'], $this->getShortMessage($record['message']));
		$record['flowdock'] = array('source' => $this->source, 'from_address' => $this->sourceEmail, 'subject' => $subject, 'content' => $record['message'], 'tags' => $tags, 'project' => $this->source);
		return $record;
	}

	public function formatBatch(array $records)
	{
		$formatted = array();

		foreach ($records as $record) {
			$formatted[] = $this->format($record);
		}

		return $formatted;
	}

	public function getShortMessage($message)
	{
		static $hasMbString;

		if (null === $hasMbString) {
			$hasMbString = function_exists('mb_strlen');
		}

		$maxLength = 45;

		if ($hasMbString) {
			if ($maxLength < mb_strlen($message, 'UTF-8')) {
				$message = mb_substr($message, 0, $maxLength - 4, 'UTF-8') . ' ...';
			}
		}
		else if ($maxLength < strlen($message)) {
			$message = substr($message, 0, $maxLength - 4) . ' ...';
		}

		return $message;
	}
}

?>
