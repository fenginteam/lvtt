<?php
//dezend by  QQ:2172298892
namespace Monolog;

class LoggerTest extends \PHPUnit_Framework_TestCase
{
	public function testGetName()
	{
		$logger = new Logger('foo');
		$this->assertEquals('foo', $logger->getName());
	}

	public function testGetLevelName()
	{
		$this->assertEquals('ERROR', Logger::getLevelName(Logger::ERROR));
	}

	public function testWithName()
	{
		$first = new Logger('first', array($handler = new Handler\TestHandler()));
		$second = $first->withName('second');
		$this->assertSame('first', $first->getName());
		$this->assertSame('second', $second->getName());
		$this->assertSame($handler, $second->popHandler());
	}

	public function testConvertPSR3ToMonologLevel()
	{
		$this->assertEquals(Logger::toMonologLevel('debug'), 100);
		$this->assertEquals(Logger::toMonologLevel('info'), 200);
		$this->assertEquals(Logger::toMonologLevel('notice'), 250);
		$this->assertEquals(Logger::toMonologLevel('warning'), 300);
		$this->assertEquals(Logger::toMonologLevel('error'), 400);
		$this->assertEquals(Logger::toMonologLevel('critical'), 500);
		$this->assertEquals(Logger::toMonologLevel('alert'), 550);
		$this->assertEquals(Logger::toMonologLevel('emergency'), 600);
	}

	public function testGetLevelNameThrows()
	{
		Logger::getLevelName(5);
	}

	public function testChannel()
	{
		$logger = new Logger('foo');
		$handler = new Handler\TestHandler();
		$logger->pushHandler($handler);
		$logger->addWarning('test');
		list($record) = $handler->getRecords();
		$this->assertEquals('foo', $record['channel']);
	}

	public function testLog()
	{
		$logger = new Logger('Monolog\\LoggerTest::testLog');
		$handler = $this->getMock('Monolog\\Handler\\NullHandler', array('handle'));
		$handler->expects($this->once())->method('handle');
		$logger->pushHandler($handler);
		$this->assertTrue($logger->addWarning('test'));
	}

	public function testLogNotHandled()
	{
		$logger = new Logger('Monolog\\LoggerTest::testLogNotHandled');
		$handler = $this->getMock('Monolog\\Handler\\NullHandler', array('handle'), array(Logger::ERROR));
		$handler->expects($this->never())->method('handle');
		$logger->pushHandler($handler);
		$this->assertFalse($logger->addWarning('test'));
	}

	public function testHandlersInCtor()
	{
		$handler1 = new Handler\TestHandler();
		$handler2 = new Handler\TestHandler();
		$logger = new Logger('Monolog\\LoggerTest::testHandlersInCtor', array($handler1, $handler2));
		$this->assertEquals($handler1, $logger->popHandler());
		$this->assertEquals($handler2, $logger->popHandler());
	}

	public function testProcessorsInCtor()
	{
		$processor1 = new Processor\WebProcessor();
		$processor2 = new Processor\WebProcessor();
		$logger = new Logger('Monolog\\LoggerTest::testProcessorsInCtor', array(), array($processor1, $processor2));
		$this->assertEquals($processor1, $logger->popProcessor());
		$this->assertEquals($processor2, $logger->popProcessor());
	}

	public function testPushPopHandler()
	{
		$logger = new Logger('Monolog\\LoggerTest::testPushPopHandler');
		$handler1 = new Handler\TestHandler();
		$handler2 = new Handler\TestHandler();
		$logger->pushHandler($handler1);
		$logger->pushHandler($handler2);
		$this->assertEquals($handler2, $logger->popHandler());
		$this->assertEquals($handler1, $logger->popHandler());
		$logger->popHandler();
	}

	public function testSetHandlers()
	{
		$logger = new Logger('Monolog\\LoggerTest::testSetHandlers');
		$handler1 = new Handler\TestHandler();
		$handler2 = new Handler\TestHandler();
		$logger->pushHandler($handler1);
		$logger->setHandlers(array($handler2));
		$this->assertEquals(array($handler2), $logger->getHandlers());
		$logger->setHandlers(array('AMapKey' => $handler1, 'Woop' => $handler2));
		$this->assertEquals(array($handler1, $handler2), $logger->getHandlers());
	}

	public function testPushPopProcessor()
	{
		$logger = new Logger('Monolog\\LoggerTest::testPushPopProcessor');
		$processor1 = new Processor\WebProcessor();
		$processor2 = new Processor\WebProcessor();
		$logger->pushProcessor($processor1);
		$logger->pushProcessor($processor2);
		$this->assertEquals($processor2, $logger->popProcessor());
		$this->assertEquals($processor1, $logger->popProcessor());
		$logger->popProcessor();
	}

	public function testPushProcessorWithNonCallable()
	{
		$logger = new Logger('Monolog\\LoggerTest::testPushProcessorWithNonCallable');
		$logger->pushProcessor(new \stdClass());
	}

	public function testProcessorsAreExecuted()
	{
		$logger = new Logger('Monolog\\LoggerTest::testProcessorsAreExecuted');
		$handler = new Handler\TestHandler();
		$logger->pushHandler($handler);
		$logger->pushProcessor(function($record) {
			$record['extra']['win'] = true;
			return $record;
		});
		$logger->addError('test');
		list($record) = $handler->getRecords();
		$this->assertTrue($record['extra']['win']);
	}

	public function testProcessorsAreCalledOnlyOnce()
	{
		$logger = new Logger('Monolog\\LoggerTest::testProcessorsAreCalledOnlyOnce');
		$handler = $this->getMock('Monolog\\Handler\\HandlerInterface');
		$handler->expects($this->any())->method('isHandling')->will($this->returnValue(true));
		$handler->expects($this->any())->method('handle')->will($this->returnValue(true));
		$logger->pushHandler($handler);
		$processor = $this->getMockBuilder('Monolog\\Processor\\WebProcessor')->disableOriginalConstructor()->setMethods(array('__invoke'))->getMock();
		$processor->expects($this->once())->method('__invoke')->will($this->returnArgument(0));
		$logger->pushProcessor($processor);
		$logger->addError('test');
	}

	public function testProcessorsNotCalledWhenNotHandled()
	{
		$logger = new Logger('Monolog\\LoggerTest::testProcessorsNotCalledWhenNotHandled');
		$handler = $this->getMock('Monolog\\Handler\\HandlerInterface');
		$handler->expects($this->once())->method('isHandling')->will($this->returnValue(false));
		$logger->pushHandler($handler);
		$that = $this;
		$logger->pushProcessor(function($record) use($that) {
			$that->fail('The processor should not be called');
		});
		$logger->addAlert('test');
	}

	public function testHandlersNotCalledBeforeFirstHandling()
	{
		$logger = new Logger('Monolog\\LoggerTest::testHandlersNotCalledBeforeFirstHandling');
		$handler1 = $this->getMock('Monolog\\Handler\\HandlerInterface');
		$handler1->expects($this->never())->method('isHandling')->will($this->returnValue(false));
		$handler1->expects($this->once())->method('handle')->will($this->returnValue(false));
		$logger->pushHandler($handler1);
		$handler2 = $this->getMock('Monolog\\Handler\\HandlerInterface');
		$handler2->expects($this->once())->method('isHandling')->will($this->returnValue(true));
		$handler2->expects($this->once())->method('handle')->will($this->returnValue(false));
		$logger->pushHandler($handler2);
		$handler3 = $this->getMock('Monolog\\Handler\\HandlerInterface');
		$handler3->expects($this->once())->method('isHandling')->will($this->returnValue(false));
		$handler3->expects($this->never())->method('handle');
		$logger->pushHandler($handler3);
		$logger->debug('test');
	}

	public function testHandlersNotCalledBeforeFirstHandlingWithAssocArray()
	{
		$handler1 = $this->getMock('Monolog\\Handler\\HandlerInterface');
		$handler1->expects($this->never())->method('isHandling')->will($this->returnValue(false));
		$handler1->expects($this->once())->method('handle')->will($this->returnValue(false));
		$handler2 = $this->getMock('Monolog\\Handler\\HandlerInterface');
		$handler2->expects($this->once())->method('isHandling')->will($this->returnValue(true));
		$handler2->expects($this->once())->method('handle')->will($this->returnValue(false));
		$handler3 = $this->getMock('Monolog\\Handler\\HandlerInterface');
		$handler3->expects($this->once())->method('isHandling')->will($this->returnValue(false));
		$handler3->expects($this->never())->method('handle');
		$logger = new Logger('Monolog\\LoggerTest::testHandlersNotCalledBeforeFirstHandlingWithAssocArray', array('last' => $handler3, 'second' => $handler2, 'first' => $handler1));
		$logger->debug('test');
	}

	public function testBubblingWhenTheHandlerReturnsFalse()
	{
		$logger = new Logger('Monolog\\LoggerTest::testBubblingWhenTheHandlerReturnsFalse');
		$handler1 = $this->getMock('Monolog\\Handler\\HandlerInterface');
		$handler1->expects($this->any())->method('isHandling')->will($this->returnValue(true));
		$handler1->expects($this->once())->method('handle')->will($this->returnValue(false));
		$logger->pushHandler($handler1);
		$handler2 = $this->getMock('Monolog\\Handler\\HandlerInterface');
		$handler2->expects($this->any())->method('isHandling')->will($this->returnValue(true));
		$handler2->expects($this->once())->method('handle')->will($this->returnValue(false));
		$logger->pushHandler($handler2);
		$logger->debug('test');
	}

	public function testNotBubblingWhenTheHandlerReturnsTrue()
	{
		$logger = new Logger('Monolog\\LoggerTest::testNotBubblingWhenTheHandlerReturnsTrue');
		$handler1 = $this->getMock('Monolog\\Handler\\HandlerInterface');
		$handler1->expects($this->any())->method('isHandling')->will($this->returnValue(true));
		$handler1->expects($this->never())->method('handle');
		$logger->pushHandler($handler1);
		$handler2 = $this->getMock('Monolog\\Handler\\HandlerInterface');
		$handler2->expects($this->any())->method('isHandling')->will($this->returnValue(true));
		$handler2->expects($this->once())->method('handle')->will($this->returnValue(true));
		$logger->pushHandler($handler2);
		$logger->debug('test');
	}

	public function testIsHandling()
	{
		$logger = new Logger('Monolog\\LoggerTest::testIsHandling');
		$handler1 = $this->getMock('Monolog\\Handler\\HandlerInterface');
		$handler1->expects($this->any())->method('isHandling')->will($this->returnValue(false));
		$logger->pushHandler($handler1);
		$this->assertFalse($logger->isHandling(Logger::DEBUG));
		$handler2 = $this->getMock('Monolog\\Handler\\HandlerInterface');
		$handler2->expects($this->any())->method('isHandling')->will($this->returnValue(true));
		$logger->pushHandler($handler2);
		$this->assertTrue($logger->isHandling(Logger::DEBUG));
	}

	public function testLogMethods($method, $expectedLevel)
	{
		$logger = new Logger('foo');
		$handler = new Handler\TestHandler();
		$logger->pushHandler($handler);
		$logger->$method('test');
		list($record) = $handler->getRecords();
		$this->assertEquals($expectedLevel, $record['level']);
	}

	public function logMethodProvider()
	{
		return array(
	array('addDebug', Logger::DEBUG),
	array('addInfo', Logger::INFO),
	array('addNotice', Logger::NOTICE),
	array('addWarning', Logger::WARNING),
	array('addError', Logger::ERROR),
	array('addCritical', Logger::CRITICAL),
	array('addAlert', Logger::ALERT),
	array('addEmergency', Logger::EMERGENCY),
	array('debug', Logger::DEBUG),
	array('info', Logger::INFO),
	array('notice', Logger::NOTICE),
	array('warn', Logger::WARNING),
	array('err', Logger::ERROR),
	array('crit', Logger::CRITICAL),
	array('alert', Logger::ALERT),
	array('emerg', Logger::EMERGENCY)
	);
	}

	public function testSetTimezone($tz)
	{
		Logger::setTimezone($tz);
		$logger = new Logger('foo');
		$handler = new Handler\TestHandler();
		$logger->pushHandler($handler);
		$logger->info('test');
		list($record) = $handler->getRecords();
		$this->assertEquals($tz, $record['datetime']->getTimezone());
	}

	public function setTimezoneProvider()
	{
		return array_map(function($tz) {
			return array(new \DateTimeZone($tz));
		}, \DateTimeZone::listIdentifiers());
	}

	public function testUseMicrosecondTimestamps($micro, $assert)
	{
		$logger = new Logger('foo');
		$logger->useMicrosecondTimestamps($micro);
		$handler = new Handler\TestHandler();
		$logger->pushHandler($handler);
		$logger->info('test');
		list($record) = $handler->getRecords();
		$this->$assert('000000', $record['datetime']->format('u'));
	}

	public function useMicrosecondTimestampsProvider()
	{
		return array(
	'with microseconds'    => array(true, 'assertNotSame'),
	'without microseconds' => array(false, 'assertSame')
	);
	}
}

?>
