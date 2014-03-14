<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('products', function(Blueprint $table) {
			$table->increments('id');
			$table->string('brand', 100)->default('');
			$table->string('style', 150)->default('');
			$table->string('specification', 150)->default('');
			$table->string('process', 150)->default('');
			$table->string('thumbnail', 100)->default('');
			$table->integer('category');
			$table->integer('top_status')->default(0);
			$table->string('top_img', 100)->default('');
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
		Schema::drop('products');
	}

}
