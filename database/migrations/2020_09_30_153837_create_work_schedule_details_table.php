<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkScheduleDetailsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('work_schedule_details', function (Blueprint $table) {
			// $table->id();
			$table->uuid('row_id')->primary();
			$table->uuid('schedule_id')->nullable();
			$table->string('work_day', 10)->nullable();
			$table->string('regular_work_hour_from', 11)->nullable();
			$table->string('regular_work_hour_to', 11)->nullable();
			$table->string('lunch_break_hour_from', 11)->nullable();
			$table->string('luch_berak_hour_to', 11)->nullable();
			$table->string('additional_break_hour_from', 11)->nullable();
			$table->string('additional_break_hour_to', 11)->nullable();
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
		Schema::dropIfExists('work_schedule_details');
	}
}
