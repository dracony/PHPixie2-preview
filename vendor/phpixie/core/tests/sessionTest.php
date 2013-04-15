<?php

require_once(CLASSDIR.'/session.php');
require_once(CLASSDIR.'/pixie.php');

/**
 * Generated by PHPUnit_SkeletonGenerator on 2013 - 02 - 06 at 08:47:19.
 * @runTestsInSeparateProcesses
 */
class sessionTest extends PHPUnit_Framework_TestCase
{

	/**
	 * @var Session
	 */
	protected $object;

	/**
	 * Sets up the fixture, for example, opens a network connection.
	 * This method is called before a test is executed.
	 */
	protected function setUp()
	{
		$this->object = new \PHPixie\Session(new \PHPixie\Pixie);
	}

	/**
	 * Tears down the fixture, for example, closes a network connection.
	 * This method is called after a test is executed.
	 */
	protected function tearDown()
	{
		session_destroy();
	}

	/**
	 * @covers $this->object->get
	 * @todo   Implement testGet().
	 */
	public function testGet()
	{
		session_start();
		$_SESSION['test'] = 'TEST';
		$this->assertEquals($this->object->get('test'), 'TEST');
		$this->assertEquals($this->object->get('bogus', false), false);
	}

	/**
	 * @covers $this->object->set
	 * @todo   Implement testSet().
	 */
	public function testSet()
	{
		$this->object->set('testSet', 'test');
		$this->assertArrayHasKey('testSet', $_SESSION);
		$this->assertEquals('test', $_SESSION['testSet']);
	}

	/**
	 * @covers $this->object->remove
	 * @todo   Implement testRemove().
	 */
	public function testRemove()
	{
		session_start();
		$_SESSION['test'] = 'TEST';
		$this->object->remove('test');
		$this->assertEquals(false, isset($_SESSION['test']));
	}

	/**
	 * @covers $this->object->reset
	 * @todo   Implement testReset().
	 */
	public function testReset()
	{
		session_start();
		$_SESSION['test'] = 'TEST';
		$this->object->reset();
		$this->assertEquals(0, count($_SESSION));
	}

	/**
	 * @covers $this->object->flash
	 */
	public function testFlash()
	{
		$this->object->flash('test', 'Trixie');
		$this->object->flash('test', 'Tinkerbell');
		$this->assertEquals('Tinkerbell', $this->object->flash('test'));
		$this->assertEquals(null, $this->object->flash('test'));
	}

}
