<?php

use Faker\Factory as Faker;

class MemberTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		// DB::table('member')->truncate();
		$faker = Faker::create();

		foreach(range(2, 50) as $index)
		{
			$member = new Member;
		    $member->username = $faker->userName;
		    $member->email = $faker->email;
		    $member->phone = $faker->phoneNumber;
		    $member->password = '6399998';
		    $member->password_confirmation = '6399998';
		    $member->confirmation_code = md5(uniqid(mt_rand(), true));

		    if(! $member->save()) {
		      	Log::error('Unable to create member '.$member->username, (array)$member->errors());
		    } else {
		      	Log::info('Created member "'.$member->username.'" <'.$member->email.'>');
		    }
		}
	}

}
