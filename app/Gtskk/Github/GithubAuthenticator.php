<?php namespace Gtskk\Github;

use Gtskk\Listeners\LoginAuthenticatorListener;
use Member;

class GithubAuthenticator{
	protected $userModel;

    public function __construct(Member $userModel, GithubUserDataReader $reader)
    {
        $this->userModel = $userModel;
        $this->reader = $reader;
    }

    public function authByCode(LoginAuthenticatorListener $listener, $code)
    {
        $githubData = $this->reader->getDataFromCode($code);
        $user = $this->userModel->getByGithubId($githubData['id']);

        if ($user) {
            return $this->loginMember($listener, $user, $githubData);
        }

        return $listener->userNotFound('githublogindata', $githubData);
    }

    private function loginMember($listener, $user, $githubData)
    {
        if ($user->is_banned) {
            return $listener->userIsBanned($user);
        }

        return $listener->userFound('githublogindata', $user);
    }
}