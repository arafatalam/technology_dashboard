<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIssuesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('issues', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('vendor_id');
			$table->integer('service_id');
			$table->text('issue_details');
			$table->text('issue_status');
			$table->text('responsible_personnel');
			$table->date('solving_date');
			$table->date('raising_date');
			$table->integer('aging');
			$table->integer('sla');
			$table->text('sla_status');
			$table->text('remarks');
			$table->integer('updated_by');
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
		Schema::drop('issues');
	}

}
