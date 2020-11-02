<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkScheduleHeadersTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('work_schedule_headers', function (Blueprint $table) {
			// $table->id();
			$table->uuid('schedule_id')->primary();
			$table->uuid('company_id')->nullable();
			$table->string('company_name', 100)->nullable();
			$table->uuid('station_id')->nullable();
			$table->string('station_name', 50)->nullable();
			$table->string('title', 50)->nullable();
			$table->string('shift_type', 50)->nullable();
			$table->string('morning_checkin_from', 11)->nullable();
			$table->string('morning_checkin_to', 11)->nullable();
			$table->string('morning_checkout', 11)->nullable();
			$table->string('evening_checkin', 11)->nullable();
			$table->string('evening_checkout_from', 11)->nullable();
			$table->string('evening_checkout_to', 11)->nullable();
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
		Schema::dropIfExists('work_schedule_headers');
	}
}
