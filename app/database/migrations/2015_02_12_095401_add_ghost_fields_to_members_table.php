<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddGhostFieldsToMembersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('members', function(Blueprint $table) {
			$table->integer('ghost_id')->nullable()->index()->after('github_id');
			$table->string('ghost_name', 100)->default('')->after('ghost_id');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('members', function(Blueprint $table) {
			$table->dropColumn('ghost_id');
			$table->dropColumn('ghost_name');
		});
	}

}
