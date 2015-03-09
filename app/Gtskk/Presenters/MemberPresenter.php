<?php namespace Gtskk\Presenters;

use Laracasts\Presenter\Presenter;
use Route;

class MemberPresenter extends Presenter
{
    /**
     * Present a link to the user gravatar
     */
    public function gravatar($size = 80)
    {
        return asset('img/avatarDefault.jpg');
    }

    public function userinfoNavActive($anchor)
    {
        return Route::currentRouteName() == $anchor ? 'active' : '';
    }

}
