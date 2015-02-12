<?php namespace Gtskk\Ghost;

use Gtskk\Listeners\LoginAuthenticatorListener;
use Member;

class GhostAuthenticator
{
	protected $userModel;

	public function __construct(Member $userModel, GhostUserDataReader $reader)
	{
		$this->userModel = $userModel;
		$this->reader = $reader;
	}

	public function authByCredentials(LoginAuthenticatorListener $listener, $user, $pass)
	{
		$ghostData = $this->reader->getDataFromCredentials($user, $pass);
		$member = $this->userModel->getByGhostId($ghostData['id']);

		if($member)
		{
			return $this->loginMember($listener, $member, $ghostData);
		}

		return $listener->userNotFound('ghostlogindata', $ghostData);
	}

	private function loginMember($listener, $member, $ghostData)
	{
		if($member->is_banned)
		{
			return $listener->userIsBanned($member);
		}

		return $listener->userFound('ghostlogindata', $member);
	}
}