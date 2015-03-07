<?php

class BaseController extends Controller {

	public function __construct()
    {

        // csrf check for every post request
        $this->beforeFilter('csrf', ['on' => 'post']);
    }

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
		//share the config option to all the views
        $site = Config::get('site.site_config',array());
        View::share('site', $site);
        View::share('siteStat', App::make('Gtskk\SiteStats\Stat')->getSiteStat());
		View::share('currentUser', Confide::user());
	}

	public function authorOrAdminPermissioinRequire($author_id)
	{
		if (!Entrust::can('manage_topics') || $author_id != Confide::user()->id)
		{
			return false;
		}
		return true;
	}

}