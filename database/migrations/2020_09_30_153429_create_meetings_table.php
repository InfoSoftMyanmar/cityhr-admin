<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMeetingsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('meetings', function (Blueprint $table) {
			// $table->id();
			$table->uuid('meeting_id')->primary();
			$table->string('meeting_title', 50)->nullable();
			$table->uuid('company_id')->nullable();
			$table->string('company_name', 100)->nullable();
			$table->uuid('station_id')->nullable();
			$table->string('station_name', 50)->nullable();
			$table->string('meeting_location', 150)->nullable();
			$table->timestamp('meeting_start_date')->nullable();
			$table->timestamp('meeting_end_date')->nullable();
			$table->string('meeting_chaired_by', 50)->nullable();
			$table->string('meeting_attended_by', 500)->nullable();
			$table->text('meeting_agenda')->nullable();
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
		Schema::dropIfExists('meetings');
	}
}
