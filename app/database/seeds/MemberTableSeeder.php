<?php

class MemberTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		// DB::table('member')->truncate();

		$member = array(
			'name' => 'Rock Zhang',
			'period_id' => 1,
			'username' => 'gtskk',
			'password' => Hash::make('6399998'),
			'email' => 'tttt6399998@126.com',
			'phone' => '15212230025',
			'status' => 1
		);

		// Uncomment the below to run the seeder
		DB::table('members')->insert($member);
	}

}
