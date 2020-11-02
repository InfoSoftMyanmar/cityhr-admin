<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\CompanySetup;
use App\Models\ConstantsTables	;
use Illuminate\Http\Request;
use Str;

class CompanyController extends Controller {
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct() {
		// $this->middleware('auth');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(Request $request) {
		if (session('tabindex')) {
			session(['tabpanel' => 'index']);
		}

		$companies = CompanySetup::all();
		if ($request->keyword) {
			$keyword   = $request->keyword;
			$companies = CompanySetup::where('company_name', 'LIKE', "%$keyword%")->get();
			session(['tabpanel' => 'index']);
		}
		session(['tabindex' => 1]);

		$companyTypes = array();
		$constant     = ConstantsTables::where('master_table_name', 'CompanyType')->first();
		if ($constant) {
			$companyTypes = explode(',', $constant->description);
			//$companyTypes = array_combine($companyTypes, $companyTypes);
		}

		$trial_days = array();
		$constant     = ConstantsTables::where('master_table_name', 'TrialDays')->first();
		if ($constant) {
			$trial_days = explode(',', $constant->description);
			//$trial_days = array_combine($trial_days, $trial_days);
		}

		return view('company.index', ['companies' => $companies, 'companyTypes' => $companyTypes, 'trial_days' => $trial_days]);
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
			'company_logo'               => 'mimes:jpeg,jpg,png|max:10240',
			'legal_trading_name'         => 'required|max:100|string',
			'registration_number'        => 'required|max:20|string|unique:companies,registration_number,NULL,company_id,is_deleted,0',
			'company_type'               => 'required|max:100|string',
			'contact_person'             => 'required|max:50|string',
			'contact_person_designation' => 'required|max:100|string',
			'contact_number'             => 'required|max:20|string',
			'fax_number'                 => 'nullable|max:20|string',
			'email_address'              => 'required|max:50|string',
			'contact_person_address'     => 'required|max:255|string',
			'website'                    => 'nullable|max:50|string',
			'company_address'            => 'required|max:150|string',
			'city'                       => 'required|max:50|string',
			'state'                      => 'required|max:50|string',
			'postal_code'                => 'required|max:10|string',
			'country'                    => 'required|max:50|string',
			'currency_use'               => 'required|max:10|string',
			'currency_sign'              => 'required|max:5|string',
			'vision'                     => 'required|string',
			'mission'                    => 'required|string',
			'profile'                    => 'required|string',
			'additional_note'            => 'nullable|max:150|string',
			'attachment_file'            => 'mimes:csv,txt,xlx,xls,pdf,docs|max:10240',
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

		Company::create($input);
		session(['tabpanel' => 'index']);

		return redirect()->route('adminstrator.companies.index')
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
		session(['tabindex' => 1]);
		$company = CompanySetup::find($uuid);

		if (is_null($company)) {
			return redirect()->route('company.index')
				->with('status', 0)->with('message', 'Record is not found.');
		}

		$companyTypes = array();
		$constant     = ConstantsTables::where('master_table_name', 'CompanyType')->first();
		if ($constant) {
			$companyTypes = explode(', ', $constant->description);
			$companyTypes = array_combine($companyTypes, $companyTypes);
		}

		return view('company.edit', ['company' => $company, 'companyTypes' => $companyTypes]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Models\CompanySetup  $company
	 * @return \Illuminate\Http\Response
	 */
	public function update($uuid, Request $request, Company $company) {
		$this->validate($request, [
			'company_name'               => 'required|max:100|string',
			'company_logo'               => 'mimes:jpeg,jpg,png|max:10240',
			'legal_trading_name'         => 'required|max:100|string',
			'registration_number'        => 'required|max:20|string|unique:companies,registration_number,' . $uuid . ',company_id,is_deleted,0',
			'company_type'               => 'required|max:100|string',
			'contact_person'             => 'required|max:50|string',
			'contact_person_designation' => 'required|max:100|string',
			'contact_number'             => 'required|max:20|string',
			'fax_number'                 => 'nullable|max:20|string',
			'email_address'              => 'required|max:50|string',
			'contact_person_address'     => 'required|max:255|string',
			'website'                    => 'nullable|max:50|string',
			'company_address'            => 'required|max:150|string',
			'city'                       => 'required|max:50|string',
			'state'                      => 'required|max:50|string',
			'postal_code'                => 'required|max:10|string',
			'country'                    => 'required|max:50|string',
			'currency_use'               => 'required|max:10|string',
			'currency_sign'              => 'required|max:5|string',
			'vision'                     => 'required|string',
			'mission'                    => 'required|string',
			'profile'                    => 'required|string',
			'additional_note'            => 'nullable|max:150|string',
			'attachment_file'            => 'mimes:csv,txt,xlx,xls,pdf,docs|max:10240',
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
	public function destroy($uuid, Company $company) {
		$mycompany = CompanySetup::find($uuid);

		if (is_null($mycompany)) {
			return redirect()->route('company.index')
				->with('status', 0)->with('message', 'Record is not found.');
		}

		$input['is_deleted'] = 1;
		// $input['deleted_by'] = ;
		$input['deleted_at'] = date('Y-m-d H:i:s');

		$mycompany->update($input);
		session(['tabpanel' => 'index']);

		return redirect()->route('company.index')
			->with('status', 1)->with('message', 'Record is successfully destroyed.');
	}
}
