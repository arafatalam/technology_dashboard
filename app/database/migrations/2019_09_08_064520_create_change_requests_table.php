<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChangeRequestsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('change_requests', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('cr_no');
			$table->text('cr_name');
			$table->integer('vendor_id');
			$table->integer('service_id');
			$table->text('cr_owner');
			$table->date('cr_raising_date');
			$table->text('activity_status');
			$table->text('cr_description');
			$table->text('cr_summery_status');
			$table->text('cr_detailed_status');
			$table->date('cr_deadline');
			$table->text('cr_dependency');
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
		Schema::drop('change_requests');
	}

}
