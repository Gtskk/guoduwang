<?php namespace Gtskk\Ghost;

use OAuth;

class GhostUserDataReader
{
	public function getDataFromCredentials($user, $pass)
	{
		$data = $this->readFromGhost($user, $pass);
		return $this->formatGhostData($data);
	}

	private function readFromGhost($user, $pass)
	{
		$ghostService = OAuth::consumer('Ghost');

		$token = $ghostService->requestGhostAccessToken($user, $pass);
		$result = json_decode($ghostService->request('/users/me/'), true);

		return isset($result['users']) ? $result['users'][0] : null;
	}

	private function formatGhostData($data)
    {
        return $data ? [
            'id'         => $data['id'],
            'username'   => $data['name'],
            'ghost_name'   => $data['name'],
            'email'      => $data['email'],
            'ghost_id'  => $data['id'],
            'image_url'  => $data['image'],
            'personal_website' => $data['website'],
            'city' => $data['location'],
            'introduction' => $data['bio']
        ] : null;
    }
}