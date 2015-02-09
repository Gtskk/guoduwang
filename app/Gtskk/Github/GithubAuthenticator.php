<?php namespace Gtskk\Github;

use Gtskk\Listeners\GithubAuthenticatorListener;
use Member;

class GithubAuthenticator{
	protected $userModel;

    public function __construct(Member $userModel, GithubUserDataReader $reader)
    {
        $this->userModel = $userModel;
        $this->reader = $reader;
    }

    public function authByCode(GithubAuthenticatorListener $listener, $code)
    {
        $githubData = $this->reader->getDataFromCode($code);
        $user = $this->userModel->getByGithubId($githubData['id']);

        if ($user) {
            return $this->loginUser($listener, $user, $githubData);
        }

        return $listener->userNotFound($githubData);
    }

    private function loginUser($listener, $user, $githubData)
    {
        if ($user->is_banned) {
            return $listener->userIsBanned($user);
        }

        return $listener->userFound($user);
    }
}