<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppMenus extends Model
{
    use HasFactory;

    /**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'app_menus';

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $primaryKey = 'menu_id';

	/**
	 * Set keyType to string.
	 *
	 * @var string
	 */
	protected $keyType = 'string';

	/**
	 * Set auto-increment to false.
	 *
	 * @var bool
	 */
	public $incrementing = false;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'menu_id',
		'menu_short_name',
        'menu_name',
        'menu_group',
        'menu_route',
        'menu_group_index',
        'menu_index',
        'active',
        'include_view',
        'include_add',
        'include_edit',
		'include_delete'
	];

	/**
	 * Get the route key for the model.
	 *
	 * @return string
	 */
	public function getRouteKeyName() {
		return 'menu_id';
	}
}
