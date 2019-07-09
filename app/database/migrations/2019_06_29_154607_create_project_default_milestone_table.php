<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectDefaultMilestoneTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('project_default_milestones', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('module_id');
			$table->text('milestone_name');
			$table->text('shortcode')->nullable();
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
		Schema::drop('deafult_milestones');
	}

}
