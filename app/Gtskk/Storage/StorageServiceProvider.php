<?php namespace Gtskk\Storage;

use Illuminate\Support\ServiceProvider;

class StorageServiceProvider extends ServiceProvider
{
	protected $defer = true;

	public function register()
	{
		$this->app->bind('Gtskk\Storage\Topic\TopicRepository', 'Gtskk\Storage\Topic\EloquentTopicRepository');

		$this->app->bind('Gtskk\Storage\Member\MemberRepository', 'Gtskk\Storage\Member\EloquentMemberRepository');
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array(
			'Gtskk\Storage\Member\MemberRepository',
			'Gtskk\Storage\Topic\TopicRepository'
		);
	}
}