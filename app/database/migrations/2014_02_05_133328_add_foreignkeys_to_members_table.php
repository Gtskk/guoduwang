<?php

use Illuminate\Database\Migrations\Migration;

class AddForeignkeysToMembersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('members', function($table) {
		    $table->foreign('period_id')->references('id')->on('periods');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('users', function($table){
		    $table->dropIndex('members_period_id_foreign');
		    $table->dropForeign('members_period_id_foreign');
		});
	}

}