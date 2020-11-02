<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRoleDetails extends Model
{
    use HasFactory;

    /**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'user_role_details';

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $primaryKey = 'row_id';

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
		'row_id',
		'role_id',
        'menu_id',
        'description',
        'able_to_view',
        'able_to_add',
        'able_to_update',
		'able_to_delete'
	];

	/**
	 * Get the route key for the model.
	 *
	 * @return string
	 */
	public function getRouteKeyName() {
		return 'row_id';
	}
}
