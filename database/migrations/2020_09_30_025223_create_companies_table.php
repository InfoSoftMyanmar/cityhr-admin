<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('companies', function (Blueprint $table) {
			// $table->id();
			$table->uuid('company_id')->primary();
			$table->string('company_name', 100)->nullable();
			$table->string('company_logo', 100)->nullable();
			$table->string('legal_trading_name', 100)->nullable();
			$table->string('registration_number', 20)->nullable();
			$table->string('company_type', 100)->nullable();
			$table->string('contact_person', 50)->nullable();
			$table->string('contact_person_designation', 100)->nullable();
			$table->string('contact_number', 20)->nullable();
			$table->string('fax_number', 20)->nullable();
			$table->string('email_address', 50)->nullable();
			$table->string('contact_person_address')->nullable();
			$table->string('website', 50)->nullable();
			$table->string('company_address', 150)->nullable();
			$table->string('city', 50)->nullable();
			$table->string('state', 50)->nullable();
			$table->string('postal_code', 10)->nullable();
			$table->string('country', 50)->nullable();
			$table->string('currency_use', 10)->nullable();
			$table->string('currency_sign', 5)->nullable();
			$table->text('vision')->nullable();
			$table->text('mission')->nullable();
			$table->text('profile')->nullable();
			$table->string('additional_note', 150)->nullable();
			$table->string('attachment_file')->nullable();
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
		Schema::dropIfExists('companies');
	}
}
