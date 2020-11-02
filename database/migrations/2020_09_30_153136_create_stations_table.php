<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStationsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('stations', function (Blueprint $table) {
			// $table->id();
			$table->uuid('station_id')->primary();
			$table->uuid('company_id')->nullable();
			$table->string('company_name', 100)->nullable();
			$table->string('station_type', 50)->nullable();
			$table->string('station_name', 50)->nullable();
			$table->string('parent_station', 50)->nullable();
			$table->string('currency_use', 10)->nullable();
			$table->string('currency_sign', 5)->nullable();
			$table->string('address', 150)->nullable();
			$table->string('phone_number', 50)->nullable();
			$table->string('fax_number', 50)->nullable();
			$table->string('email_address', 50)->nullable();
			$table->string('website', 50)->nullable();
			$table->string('additional_note', 150)->nullable();
			$table->string('station_photo')->nullable();
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
		Schema::dropIfExists('stations');
	}
}
