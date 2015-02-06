<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsToMembersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('members', function(Blueprint $table) {
			$table->string('real_name', 100)->default('')->after('confirmed');
			$table->string('github_name', 100)->default('')->after('real_name');
			$table->string('company', 100)->default('')->after('github_name');
			$table->string('city', 100)->default('')->after('company');
			$table->string('personal_website', 100)->default('')->after('city');
			$table->string('signature', 255)->default('')->after('personal_website');
			$table->string('introduction', 255)->default('')->after('signature');
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
			$table->dropColumn('real_name');
			$table->dropColumn('github_name');
			$table->dropColumn('company');
			$table->dropColumn('city');
			$table->dropColumn('personal_website');
			$table->dropColumn('signature');
		});
	}

}
