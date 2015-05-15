<?php namespace Gtskk\Storage;

use Member, Topic;
use Illuminate\Support\ServiceProvider;
use Gtskk\Storage\Topic\EloquentTopicRepository;
use Gtskk\Storage\Member\EloquentMemberRepository;

class StorageServiceProvider extends ServiceProvider
{
	protected $defer = true;

	public function register()
	{
		$this->app->bind('Gtskk\Storage\Topic\TopicInterface', function($app)
		{
			return new EloquentTopicRepository(new Topic);
		});

		$this->app->bind('Gtskk\Storage\Member\MemberInterface', function($app)
		{
			return new EloquentMemberRepository(new Member);
		});
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array(
			'Gtskk\Storage\Member\MemberInterface',
			'Gtskk\Storage\Topic\TopicInterface'
		);
	}
}