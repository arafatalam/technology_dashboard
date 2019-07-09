<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectFieldDataTypesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('project_field_data_types', function(Blueprint $table)
		{
			$table->increments('id');
			$table->text('name');
			$table->string('db_data_type');
			$table->text('html_element');
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
		Schema::drop('field_data_types');
	}

}
