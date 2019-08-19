<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMilestonesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('milestones', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('project_id');
			$table->integer('status_id');
			$table->text('milestone_name')->nullable;
			$table->date('milestone_start_date')->nullable;
			$table->date('milestone_end_date')->nullable;
			$table->text('remarks')->nullable;
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
		Schema::drop('milestones');
	}

}
