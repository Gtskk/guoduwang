<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddGithubFieldsToMembersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('members', function(Blueprint $table) {
			$table->integer('github_id')->nullable()->index()->after('github_name');
			$table->integer('github_url')->nullable()->after('github_id');
			$table->boolean('is_banned')->default(false)->index()->after('remember_token');
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
			$table->dropColumn('github_id');
			$table->dropColumn('github_url');
			$table->dropColumn('is_banned');
		});
	}

}
