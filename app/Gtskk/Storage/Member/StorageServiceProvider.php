<?php namespace Gtskk\Storage\Member;

use Illuminate\Support\ServiceProvider;

class StorageServiceProvider extends ServiceProvider
{
	protected $defer = false;

	public function register()
	{
		$this->app->bind('Gtskk\Storage\Member\MemberRepository', 'Gtskk\Storage\Member\EloquentMemberRepository');
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array('Gtskk\Storage\MemberRepository');
	}
}