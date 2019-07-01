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
            $table->integer('field_data_type_id');
            $table->boolean('is_dropdown');
            $table->text('dropdown_values')->nullable();
            $table->integer('serial');
            $table->string('html_id')->nullable()->unique();
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
