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

        /**
         * Ghost
         */
        'Ghost' => [
        	'client_id'     => 'tttt6399998@126.com',
        	'client_secret' => 'yoho9646',
        	'scope'         => array(),
        ],

	)

);