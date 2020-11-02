<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnnouncementsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('announcements', function (Blueprint $table) {
			// $table->id();
			$table->uuid('announcement_id')->primary();
			$table->uuid('company_id')->nullable();
			$table->string('company_name', 100)->nullable();
			$table->string('announcement_to', 250)->nullable();
			$table->string('title', 50)->nullable();
			$table->timestamp('announce_date')->nullable();
			$table->timestamp('duration_start_date')->nullable();
			$table->timestamp('duration_end_date')->nullable();
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
		Schema::dropIfExists('announcements');
	}
}
