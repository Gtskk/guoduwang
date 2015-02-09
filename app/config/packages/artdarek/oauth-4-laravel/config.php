<?php 

return array( 
	
	/*
	|--------------------------------------------------------------------------
	| oAuth Config
	|--------------------------------------------------------------------------
	*/

	/**
	 * Storage
	 */
	'storage' => 'Session', 

	/**
	 * Consumers
	 */
	'consumers' => array(

		/**
		 * Github
		 */
        'GitHub' => [
            'client_id'     => getenv('client_id'),
            'client_secret' => getenv('client_secret'),
            'scope'         => ['user:email'],
        ],		

	)

);