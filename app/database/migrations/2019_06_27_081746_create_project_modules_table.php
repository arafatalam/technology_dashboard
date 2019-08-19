<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectModulesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('project_modules', function(Blueprint $table)
		{
			$table->increments('id');
			$table->text('module_name');
			$table->text('module_milestone_type');
			$table->string('db_table_name')->unique();
            $table->string('milestone_table_name')->unique();
			$table->text('remarks');
			$table->text('updated_by');
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
		Schema::drop('modules');
	}

}
