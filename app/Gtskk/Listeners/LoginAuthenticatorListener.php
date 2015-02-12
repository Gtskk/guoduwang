<?php namespace Gtskk\Listeners;

interface LoginAuthenticatorListener
{
    public function userFound($type, $user);
    public function userIsBanned($user);
    public function userNotFound($type, $loginData);
}