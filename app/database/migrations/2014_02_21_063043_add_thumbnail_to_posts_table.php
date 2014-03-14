<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddThumbnailToPostsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('posts', function(Blueprint $table) {
			$table->string('thumbnail', 100)->default('')->after('slug');
			$table->string('type', 50)->default('post')->after('thumbnail');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('posts', function(Blueprint $table) {
			$table->dropColumn('thumbnail');
			$table->dropColumn('type');
		});
	}

}
