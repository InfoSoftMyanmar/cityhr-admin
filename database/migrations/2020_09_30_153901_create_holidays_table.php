<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHolidaysTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('holidays', function (Blueprint $table) {
			// $table->id();
			$table->uuid('row_id')->primary();
			$table->uuid('company_id')->nullable();
			$table->string('company_name', 100)->nullable();
			$table->uuid('station_id')->nullable();
			$table->string('station_name', 1000)->nullable();
			$table->string('title', 50)->nullable();
			$table->timestamp('holiday_start_date')->nullable();
			$table->timestamp('holiday_end_date')->nullable();
			$table->integer('day_count')->default(0);
			$table->text('description')->nullable();
			$table->string('additional_note', 150)->nullable();
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
		Schema::dropIfExists('holidays');
	}
}
