<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrganizationNewsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('organization_news', function (Blueprint $table) {
			// $table->id();
			$table->uuid('row_id')->primary();
			$table->uuid('company_id')->nullable();
			$table->string('company_name', 100)->nullable();
			$table->string('news_title', 50)->nullable();
			$table->timestamp('announce_date')->nullable();
			$table->longText('news_detail')->nullable();
			$table->string('news_image')->nullable();
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
		Schema::dropIfExists('organization_news');
	}
}
