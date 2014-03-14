<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMemberlogsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('memberlogs', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('member_id');
			$table->string('member');
			$table->string('transaction');
			$table->timestamp('dateandtime');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('memberlogs');
	}

}
