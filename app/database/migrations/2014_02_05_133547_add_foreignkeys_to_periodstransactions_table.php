<?php

use Illuminate\Database\Migrations\Migration;

class AddForeignkeysToPeriodstransactionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('periods_transactions', function($table) {
		    $table->foreign('period_id')->references('id')->on('periods');
		    $table->foreign('transaction_id')->references('id')->on('transactions');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{		
		Schema::table('periods_transactions', function($table){
		    $table->dropIndex('periods_transactions_period_id_foreign');
		    $table->dropForeign('periods_transactions_transaction_id_foreign');
		});
	}

}