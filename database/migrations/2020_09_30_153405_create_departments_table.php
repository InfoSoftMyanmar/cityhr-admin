<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepartmentsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('departments', function (Blueprint $table) {
			// $table->id();
			$table->uuid('department_id')->primary();
			$table->uuid('company_id')->nullable();
			$table->string('company_name', 100)->nullable();
			$table->uuid('station_id')->nullable();
			$table->string('station_name', 50)->nullable();
			$table->string('department_name', 50)->nullable();
			$table->string('initial', 10)->nullable();
			$table->string('forward_to', 50)->nullable();
			$table->string('parent_department', 50)->nullable();
			$table->string('additional_note', 150)->nullable();
			$table->tinyInteger('active')->default(1);
			$table->tinyInteger('is_deleted')->default(0);
			$table->uuid('created_by')->nullable();
			$table->uuid('updated_by')->nullable();
			$table->uuid('deleted_by')->nullable();
			$table->timestamps();
			$table->softDeletes();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('departments');
	}
}
