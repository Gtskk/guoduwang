<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePmTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pms', function(Blueprint $table) {
			$table->bigInteger('id');
			$table->integer('id2');
			$table->string('title', 255);
			$table->bigInteger('user1');
			$table->bigInteger('user2');
			$table->text('message');
			$table->string('user1read', 3);
			$table->string('user2read', 3);
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('pms');
	}

}
