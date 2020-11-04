<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConstantsTables extends Model
{
    use HasFactory;

    /**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'main.constants_tables';
	public $timestamps    = false;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $primaryKey = 'constant_id';

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
		'constant_id',
		'master_table_name',
        'description',
        'default_value',
		'active',
        'created_by',
        'created_at'
	];

	/**
	 * Get the route key for the model.
	 *
	 * @return string
	 */
	public function getRouteKeyName() {
		return 'constant_id';
	}
}
