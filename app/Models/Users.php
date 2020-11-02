<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Users extends Authenticatable
{
	use HasFactory;
	use Notifiable;
    /**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $primaryKey = 'user_id';

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
		'user_id',
		'user_name',
        'password',
        'role_id',
        'company_id',
        'company_permission',
        'email',
        'email_verified',
        'email_verified_at',
        'active',
        'is_delete',
        'created_by',
        'created_at'
	];

	/**
	 * Get the route key for the model.
	 *
	 * @return string
	 */
	public function getRouteKeyName() {
		return 'user_id';
	}

	public function getAuthPassword()
    {
      return $this->password;
    }
}
