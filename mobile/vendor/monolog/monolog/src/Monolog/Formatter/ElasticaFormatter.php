<?php
//dezend by  QQ:2172298892
namespace Monolog\Formatter;

class ElasticaFormatter extends NormalizerFormatter
{
	/**
     * @var string Elastic search index name
     */
	protected $index;
	/**
     * @var string Elastic search document type
     */
	protected $type;

	public function __construct($index, $type)
	{
		parent::__construct('Y-m-d\\TH:i:s.uP');
		$this->index = $index;
		$this->type = $type;
	}

	public function format(array $record)
	{
		$record = parent::format($record);
		return $this->getDocument($record);
	}

	public function getIndex()
	{
		return $this->index;
	}

	public function getType()
	{
		return $this->type;
	}

	protected function getDocument($record)
	{
		$document = new \Elastica\Document();
		$document->setData($record);
		$document->setType($this->type);
		$document->setIndex($this->index);
		return $document;
	}
}

?>
