<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSingleCategoriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('single_categories', function(Blueprint $table) {
			$table->bigInteger('object_id')->default(0);
			$table->bigInteger('category_id')->default(0);
			$table->integer('category_order')->default(0);
			$table->primary(array('object_id', 'category_id'));
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('single_categories', function($table){
			$table->dropPrimary('single_object_id_categories_id_primary');
		});
		Schema::drop('single_categories');
	}

}
