<?php namespace Gtskk\Presenters;

use Laracasts\Presenter\Presenter;
use Route;

class MemberPresenter extends Presenter
{
    /**
     * Present a link to the user gravatar
     */
    public function gravatar()
    {
        return asset('img/avatarDefault.jpg');
    }

    public function githubCard($theme = 'default')
    {
        $githubCard = '<div class="github-card" data-github='.$this->github_name.' data-width="100%" data-height="150" data-theme="'.$theme.'"></div>
        <script src="http://lab.lepture.com/github-cards/widget.js"></script>';

        return $githubCard;
    }

    public function userinfoNavActive($anchor)
    {
        return Route::currentRouteName() == $anchor ? 'active' : '';
    }

}
