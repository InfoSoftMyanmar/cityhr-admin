<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserRolesTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('user_roles', function (Blueprint $table) {
			// $table->id();
			$table->uuid('role_id')->primary();
			$table->uuid('employee_id')->nullable();
			$table->uuid('menu_id')->nullable();
			$table->string('menu_short_name', 50)->nullable();
			$table->string('sub_menu_id', 30)->nullable();
			$table->tinyInteger('able_to_view')->default(0);
			$table->tinyInteger('able_to_add')->default(0);
			$table->tinyInteger('able_to_update')->default(0);
			$table->tinyInteger('able_to_delete')->default(0);
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
		Schema::dropIfExists('user_roles');
	}
}
