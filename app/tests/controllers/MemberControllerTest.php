<?php

class MemberControllerTest extends TestCase
{

	public function setUp()
	{
		parent::setUp();
		$this->mock = $this->mock('Gtskk\Storage\Member\MemberRepository');
	}

	public function mock($class)
	{
		$mock = Mockery::mock($class);
		$this->app->instance($class, $mock);

		return $mock;
	}

	public function testIndex()
	{
		$this->mock->shouldReceive('limitAll')->once()->andReturn('gtskk');
	}

	/**
	 * 关闭Mockery
	 */
	public function tearDown()
	{
		Mockery::close();
	}
}