<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanySetup extends Model
{
    use HasFactory;

    /**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'company_setup';

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $primaryKey = 'company_id';

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
		'company_id',
		'company_name',
        'database_name',
        'financialyear_startdate',
        'financialyear_enddate',
        'is_trial',
        'trial_days',
        'company_logo',
        'legal_trading_name',
        'registration_number',
        'company_type',
        'contact_person',
        'contact_person_designation',
        'conact_number',
        'fax_number',
        'email_address',
        'contact_person_address',
        'website',
        'company_address',
        'country',
        'city',
        'state',
        'postal_code',
        'currency_use',
        'currency_sign',
        'vision',
        'mission',
        'profile',
        'additional_note',
        'attachment_file',
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
		return 'company_id';
	}
}
