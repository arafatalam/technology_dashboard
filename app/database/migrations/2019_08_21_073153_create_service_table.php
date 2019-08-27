<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServiceTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('services', function(Blueprint $table)
		{
			$table->increments('id');
            $table->text('service_details');
			$table->integer('vendor_id')->nullable;
			$table->integer('service_category_id')->nullable;
			$table->text('service_category')->nullable;
			$table->integer('service_subcategory_id')->nullable;
			$table->text('service_subcategory')->nullable;
			$table->integer('department_id')->nullable;
			$table->integer('user_department')->nullable;
			$table->date('service_nda_expiry_date')->nullable;
			$table->date('service_contract_date')->nullable;
			$table->date('contract_expiry_date')->nullable;
			$table->integer('service_sla')->nullable;
			$table->boolean('service_pr_status')->nullable;
			$table->boolean('service_po_status')->nullable;
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
		Schema::drop('services');
	}

}
