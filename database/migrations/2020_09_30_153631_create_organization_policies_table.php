<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrganizationPoliciesTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('organization_policies', function (Blueprint $table) {
			// $table->id();
			$table->uuid('row_id')->primary();
			$table->string('policy_title', 50)->nullable();
			$table->string('policy_type', 50)->nullable();
			$table->timestamp('policy_date')->nullable();
			$table->uuid('company_id')->nullable();
			$table->string('company_name', 100)->nullable();
			$table->uuid('station_id')->nullable();
			$table->string('station_name', 150)->nullable();
			$table->uuid('department_id')->nullable();
			$table->string('department_name', 50)->nullable();
			$table->text('description')->nullable();
			$table->string('additonal_note', 150)->nullable();
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
		Schema::dropIfExists('organization_policies');
	}
}
