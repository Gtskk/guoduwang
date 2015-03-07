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
		$this->mock->shouldReceive('limitAll')->once()->andReturn(array());
		$this->call('GET', 'members');
	}

	public function testCreate()
	{
		$this->call('GET', 'members/create');
		$this->assertResponseOk();
	}

	public function testStoreFailed()
	{
		$member = new Member;
		$member->id = null;

		$this->mock->shouldReceive('create')->once()->andReturn($member);

		$this->call('POST', 'members');
		$this->assertRedirectedToRoute('members.create');
		$this->assertSessionHas('error');
	}

	public function testStoreSuccess()
	{
		$member = new Member;
		$member->id = 2;

	  	$this->mock->shouldReceive('create')
	            ->once()
	            ->andReturn($member);
	 
	  	$this->call('POST', 'members');
	  	$this->assertRedirectedToRoute('login-required');
	  	$this->assertSessionHas('notice');
	}

	public function testEdit()
	{
		$this->mock->shouldReceive('findOrFail')
	        ->once();
	  	$this->call('GET', 'members/1/edit');
	  		 
	  	$this->assertResponseOk();
	}



	/**
	 * 关闭Mockery
	 */
	public function tearDown()
	{
		Mockery::close();
	}
}