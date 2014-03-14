<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePeriodsTransactionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('periods_transactions', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('period_id')->unsigned();
			$table->integer('transaction_id')->unsigned();
			$table->integer('status');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('periods_transactions');
	}

}
