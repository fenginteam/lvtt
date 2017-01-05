<?php
//dezend by  QQ:2172298892
namespace Monolog\Handler;

abstract class AbstractHandler implements HandlerInterface
{
	protected $level = Monolog\Logger::DEBUG;
	protected $bubble = true;
	/**
     * @var FormatterInterface
     */
	protected $formatter;
	protected $processors = array();

	public function __construct($level = Monolog\Logger::DEBUG, $bubble = true)
	{
		$this->setLevel($level);
		$this->bubble = $bubble;
	}

	public function isHandling(array $record)
	{
		return $this->level <= $record['level'];
	}

	public function handleBatch(array $records)
	{
		foreach ($records as $record) {
			$this->handle($record);
		}
	}

	public function close()
	{
	}

	public function pushProcessor($callback)
	{
		if (!is_callable($callback)) {
			throw new \InvalidArgumentException('Processors must be valid callables (callback or object with an __invoke method), ' . var_export($callback, true) . ' given');
		}

		array_unshift($this->processors, $callback);
		return $this;
	}

	public function popProcessor()
	{
		if (!$this->processors) {
			throw new \LogicException('You tried to pop from an empty processor stack.');
		}

		return array_shift($this->processors);
	}

	public function setFormatter(\Monolog\Formatter\FormatterInterface $formatter)
	{
		$this->formatter = $formatter;
		return $this;
	}

	public function getFormatter()
	{
		if (!$this->formatter) {
			$this->formatter = $this->getDefaultFormatter();
		}

		return $this->formatter;
	}

	public function setLevel($level)
	{
		$this->level = \Monolog\Logger::toMonologLevel($level);
		return $this;
	}

	public function getLevel()
	{
		return $this->level;
	}

	public function setBubble($bubble)
	{
		$this->bubble = $bubble;
		return $this;
	}

	public function getBubble()
	{
		return $this->bubble;
	}

	public function __destruct()
	{
		try {
			$this->close();
		}
		catch (\Exception $e) {
		}
		catch (\Throwable $e) {
		}
	}

	protected function getDefaultFormatter()
	{
		return new \Monolog\Formatter\LineFormatter();
	}
}

?>
