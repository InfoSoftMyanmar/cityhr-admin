<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\CompanySetup;
use App\Models\ConstantsTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Str;

class CompanyController extends Controller {
		/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct() {
		$this->middleware('auth');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(Request $request) {
		$myHelper     = new Helper();

		if (session('tabindex')) {
			session(['tabpanel' => 'index']);
		}		

		$companies = CompanySetup::where('active', 1)->get();
		if ($request->keyword) {
			$keyword   = $request->keyword;
			$companies = CompanySetup::where('company_name', 'LIKE', "%$keyword%")->get();
			session(['tabpanel' => 'index']);
		}
		session(['tabindex' => 1]);

		$companyTypes       = array();
		$companyTypeDefault = null;
		$constant           = ConstantsTables::where('active', 1)->where('master_table_name', 'CompanyType')->first();
		if ($constant) {
			$companyTypes       = $myHelper->multiexplode([',', ', '], $constant->description);
			$companyTypes       = array_combine($companyTypes, $companyTypes);
			$companyTypeDefault = $constant->default_value;
		}

		$trial_days = array();
		$trialDayDefault = null;
		$constant     = ConstantsTables::where('active', 1)->where('master_table_name', 'TrialDays')->first();
		if ($constant) {
			$trial_days 		= $myHelper->multiexplode([',', ', '], $constant->description);
			$trial_days       	= array_combine($trial_days, $trial_days);
			$trialDayDefault 	= $constant->default_value;
		}

		$currencyUse        = array();
		$currencyUseDefault = null;
		$constant           = ConstantsTables::where('active', 1)->where('master_table_name', 'CurrencyUse')->first();
		if ($constant) {
			$currencyUse        = $myHelper->multiexplode([',', ', '], $constant->description);
			$currencyUse        = array_combine($currencyUse, $currencyUse);
			$currencyUseDefault = $constant->default_value;
		}

		return view('company.index', ['companies' => $companies, 'companyTypes' => $companyTypes, 'companyTypeDefault' => $companyTypeDefault, 'trial_days' => $trial_days, 'trialDayDefault' => $trialDayDefault,'currencyUse' => $currencyUse, 'currencyUseDefault' => $currencyUseDefault]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		session(['tabpanel' => 'create']);

		return redirect()->route('company.index');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		session(['tabpanel' => 'create']);
		session(['tabindex' => 0]);

		$this->validate($request, [
			'company_name'               => 'required|max:100|string',
			'database_name'         	 => 'required|max:100|string',
			'financialyear_startdate'    => 'required|max:100|string',
			'financialyear_enddate'      => 'required|max:50|string',
			'email_address'              => 'required|max:50|string',
			'contact_person_address'     => 'required|max:255|string',
			'contact_number'             => 'required|max:20|string',
		]);

		$input               = $request->all();
		$input['company_id'] = (string) Str::uuid();

		$myHelper = new Helper();
		$logopath = public_path('uploads/companies/logos/');
		$logoName = $myHelper->fileUpload($request, $logopath, 'company_logo');
		if ($logoName) {
			$input['company_logo'] = $logoName;
		}

		$filepath = public_path('uploads/companies/attachments/');
		$fileName = $myHelper->fileUpload($request, $filepath, 'attachment_file');
		if ($fileName) {
			$input['attachment_file'] = $fileName;
		}

		$input['is_trial'] = $request->is_trial ? 1 : 0;

		$input['active'] = 1;
		$input['created_by']    = auth()->users()->user_id;
		$input['created_at']    = date('Y-m-d H:i:s');

		CompanySetup::create($input);
		DB::select('SELECT public.clone_schema(?, ?) AS cs', ['sample', $request->database_name]);
		session(['tabpanel' => 'index']);

		return redirect()->route('company.index')
			->with('status', 1)->with('message', 'Record is successfully created.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Models\CompanySetup  $company
	 * @return \Illuminate\Http\Response
	 */
	public function show(Company $company) {
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Models\CompanySetup  $company
	 * @return \Illuminate\Http\Response
	 */
	public function edit($uuid) {
		$myHelper     = new Helper();
		
		session(['tabindex' => 1]);
		$company = CompanySetup::find($uuid);

		if (is_null($company)) {
			return redirect()->route('company.index')
				->with('status', 0)->with('message', 'Record is not found.');
		}

		$companyTypes       = array();
		$companyTypeDefault = null;
		$constant           = ConstantsTables::where('active', 1)->where('master_table_name', 'CompanyType')->first();
		if ($constant) {
			$companyTypes       = $myHelper->multiexplode([',', ', '], $constant->description);
			$companyTypes       = array_combine($companyTypes, $companyTypes);
			$companyTypeDefault = $constant->default_value;
		}

		$trial_days = array();
		$trialDayDefault = null;
		$constant     = ConstantsTables::where('active', 1)->where('master_table_name', 'TrialDays')->first();
		if ($constant) {
			$trial_days 		= $myHelper->multiexplode([',', ', '], $constant->description);
			$trial_days       	= array_combine($trial_days, $trial_days);
			$trialDayDefault 	= $constant->default_value;
		}

		$currencyUse        = array();
		$currencyUseDefault = null;
		$constant           = ConstantsTables::where('active', 1)->where('master_table_name', 'CurrencyUse')->first();
		if ($constant) {
			$currencyUse        = $myHelper->multiexplode([',', ', '], $constant->description);
			$currencyUse        = array_combine($currencyUse, $currencyUse);
			$currencyUseDefault = $constant->default_value;
		}

		return view('company.edit', ['company' => $company, 'companyTypes' => $companyTypes, 'companyTypeDefault' => $companyTypeDefault, 'trial_days' => $trial_days, 'trialDayDefault' => $trialDayDefault,'currencyUse' => $currencyUse, 'currencyUseDefault' => $currencyUseDefault]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Models\CompanySetup  $company
	 * @return \Illuminate\Http\Response
	 */
	public function update($uuid, Request $request, CompanySetup $company) {
		// $this->validate($request, [
		// 	'company_name'               => 'required|max:100|string',
		// 	'company_logo'               => 'mimes:jpeg,jpg,png|max:10240',
		// 	'legal_trading_name'         => 'required|max:100|string',
		// 	'registration_number'        => 'required|max:20|string|unique:companies,registration_number,' . $uuid . ',company_id,is_deleted,0',
		// 	'company_type'               => 'required|max:100|string',
		// 	'contact_person'             => 'required|max:50|string',
		// 	'contact_person_designation' => 'required|max:100|string',
		// 	'contact_number'             => 'required|max:20|string',
		// 	'fax_number'                 => 'nullable|max:20|string',
		// 	'email_address'              => 'required|max:50|string',
		// 	'contact_person_address'     => 'required|max:255|string',
		// 	'website'                    => 'nullable|max:50|string',
		// 	'company_address'            => 'required|max:150|string',
		// 	'city'                       => 'required|max:50|string',
		// 	'state'                      => 'required|max:50|string',
		// 	'postal_code'                => 'required|max:10|string',
		// 	'country'                    => 'required|max:50|string',
		// 	'currency_use'               => 'required|max:10|string',
		// 	'currency_sign'              => 'required|max:5|string',
		// 	'vision'                     => 'required|string',
		// 	'mission'                    => 'required|string',
		// 	'profile'                    => 'required|string',
		// 	'additional_note'            => 'nullable|max:150|string',
		// 	'attachment_file'            => 'mimes:csv,txt,xlx,xls,pdf,docs|max:10240',
		// ]);

		$this->validate($request, [
			'company_name'               => 'required|max:100|string',
			'database_name'         	 => 'required|max:100|string',
			'financialyear_startdate'    => 'required|max:100|string',
			'financialyear_enddate'      => 'required|max:50|string',
			'email_address'              => 'required|max:50|string',
			'contact_person_address'     => 'required|max:255|string',
			'contact_number'             => 'required|max:20|string',
		]);


		$input = $request->all();

		$myHelper = new Helper();
		$logopath = public_path('uploads/companies/logos/');
		$logoName = $myHelper->fileUpload($request, $logopath, 'company_logo');
		if ($logoName) {
			$input['company_logo'] = $logoName;
		}

		$filepath = public_path('uploads/companies/attachments/');
		$fileName = $myHelper->fileUpload($request, $filepath, 'attachment_file');
		if ($fileName) {
			$input['attachment_file'] = $fileName;
		}

		$mycompany = CompanySetup::find($uuid);

		if (is_null($mycompany)) {
			return redirect()->route('company.index')
				->with('status', 0)->with('message', 'Record is not found.');
		}

		$oldLogo = $mycompany->company_logo;
		$oldFile = $mycompany->attachment_file;

		$input['is_trial'] = $request->is_trial ? 1 : 0;
		$input['created_by'] = 'b4e6df7b-0b8f-4014-9fd9-dc224604f340';
		$input['created_at'] = '2020-11-03 00:00:00';

		$mycompany->update($input);
		session(['tabpanel' => 'index']);

		if ($logoName) {
			$myHelper->destroyFile($oldLogo, $logopath);
		}

		if ($fileName) {
			$myHelper->destroyFile($oldFile, $filepath);
		}

		return redirect()->route('company.index')
			->with('status', 1)->with('message', 'Record is successfully updated.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Models\CompanySetup  $company
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($uuid) {
		$mycompany = CompanySetup::find($uuid);

		if (is_null($mycompany)) {
			return redirect()->route('company.index')
				->with('status', 0)->with('message', 'Record is not found.');
		}

		$input['active'] = 0;
		// $input['deleted_by'] = ;
		//$input['deleted_at'] = date('Y-m-d H:i:s');

		$mycompany->update($input);
		session(['tabpanel' => 'index']);

		return redirect()->route('company.index')
			->with('status', 1)->with('message', 'Record is successfully destroyed.');
	}
}
