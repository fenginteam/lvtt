<?php
//dezend by  QQ:2172298892
namespace Monolog\Handler;

class StreamHandlerTest extends \Monolog\TestCase
{
	public function testWrite()
	{
		$handle = fopen('php://memory', 'a+');
		$handler = new StreamHandler($handle);
		$handler->setFormatter($this->getIdentityFormatter());
		$handler->handle($this->getRecord(\Monolog\Logger::WARNING, 'test'));
		$handler->handle($this->getRecord(\Monolog\Logger::WARNING, 'test2'));
		$handler->handle($this->getRecord(\Monolog\Logger::WARNING, 'test3'));
		fseek($handle, 0);
		$this->assertEquals('testtest2test3', fread($handle, 100));
	}

	public function testCloseKeepsExternalHandlersOpen()
	{
		$handle = fopen('php://memory', 'a+');
		$handler = new StreamHandler($handle);
		$this->assertTrue(is_resource($handle));
		$handler->close();
		$this->assertTrue(is_resource($handle));
	}

	public function testClose()
	{
		$handler = new StreamHandler('php://memory');
		$handler->handle($this->getRecord(\Monolog\Logger::WARNING, 'test'));
		$streamProp = new \ReflectionProperty('Monolog\\Handler\\StreamHandler', 'stream');
		$streamProp->setAccessible(true);
		$handle = $streamProp->getValue($handler);
		$this->assertTrue(is_resource($handle));
		$handler->close();
		$this->assertFalse(is_resource($handle));
	}

	public function testWriteCreatesTheStreamResource()
	{
		$handler = new StreamHandler('php://memory');
		$handler->handle($this->getRecord());
	}

	public function testWriteLocking()
	{
		$temp = sys_get_temp_dir() . DIRECTORY_SEPARATOR . 'monolog_locked_log';
		$handler = new StreamHandler($temp, \Monolog\Logger::DEBUG, true, null, true);
		$handler->handle($this->getRecord());
	}

	public function testWriteMissingResource()
	{
		$handler = new StreamHandler(null);
		$handler->handle($this->getRecord());
	}

	public function invalidArgumentProvider()
	{
		return array(
	array(1),
	array(
		array()
		),
	array(
		array('bogus://url')
		)
	);
	}

	public function testWriteInvalidArgument($invalidArgument)
	{
		$handler = new StreamHandler($invalidArgument);
	}

	public function testWriteInvalidResource()
	{
		$handler = new StreamHandler('bogus://url');
		$handler->handle($this->getRecord());
	}

	public function testWriteNonExistingResource()
	{
		$handler = new StreamHandler('ftp://foo/bar/baz/' . rand(0, 10000));
		$handler->handle($this->getRecord());
	}

	public function testWriteNonExistingPath()
	{
		$handler = new StreamHandler(sys_get_temp_dir() . '/bar/' . rand(0, 10000) . DIRECTORY_SEPARATOR . rand(0, 10000));
		$handler->handle($this->getRecord());
	}

	public function testWriteNonExistingFileResource()
	{
		$handler = new StreamHandler('file://' . sys_get_temp_dir() . '/bar/' . rand(0, 10000) . DIRECTORY_SEPARATOR . rand(0, 10000));
		$handler->handle($this->getRecord());
	}

	public function testWriteNonExistingAndNotCreatablePath()
	{
		if (defined('PHP_WINDOWS_VERSION_BUILD')) {
			$this->markTestSkipped('Permissions checks can not run on windows');
		}

		$handler = new StreamHandler('/foo/bar/' . rand(0, 10000) . DIRECTORY_SEPARATOR . rand(0, 10000));
		$handler->handle($this->getRecord());
	}

	public function testWriteNonExistingAndNotCreatableFileResource()
	{
		if (defined('PHP_WINDOWS_VERSION_BUILD')) {
			$this->markTestSkipped('Permissions checks can not run on windows');
		}

		$handler = new StreamHandler('file:///foo/bar/' . rand(0, 10000) . DIRECTORY_SEPARATOR . rand(0, 10000));
		$handler->handle($this->getRecord());
	}
}

?>
