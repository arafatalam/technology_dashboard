<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModuleFieldsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('module_fields', function(Blueprint $table)
		{
			$table->increments('id');

            $table->integer('module_id');
            $table->text('field_name');
            $table->text('field_data_type');
            $table->boolean('is_dropdown');
            $table->text('dropdown_values')->nullable();
            $table->integer('serial');
            $table->text('html_class')->nullable();
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
		Schema::drop('module_fields');
	}

}
