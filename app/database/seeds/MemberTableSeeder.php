<?php

class MemberTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		// DB::table('member')->truncate();

		$member = new Member;
	    $member->username = 'johndoe';
	    $member->email = 'johndoe@site.dev';
	    $member->phone = '15212230025';
	    $member->password = 'foo_bar_1234';
	    $member->password_confirmation = 'foo_bar_1234';
	    $member->confirmation_code = md5(uniqid(mt_rand(), true));

	    if(! $member->save()) {
	      Log::info('Unable to create member '.$member->username, (array)$member->errors());
	    } else {
	      Log::info('Created member "'.$member->username.'" <'.$member->email.'>');
	    }
	}

}
