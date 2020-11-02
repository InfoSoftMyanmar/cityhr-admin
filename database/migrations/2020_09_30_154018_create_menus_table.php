<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenusTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('menus', function (Blueprint $table) {
			// $table->id();
			$table->uuid('menu_id')->primary();
			$table->string('menu_name_en', 50)->nullable();
			$table->string('menu_name_mm', 50)->nullable();
			// $table->string('sub_menu_id', 30)->nullable();
			$table->string('menu', 50)->nullable();
			$table->string('menu_group', 50)->nullable();
			$table->tinyInteger('menu_group_index')->default(0);
			$table->tinyInteger('menu_index')->default(0);
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
		Schema::dropIfExists('menus');
	}
}
