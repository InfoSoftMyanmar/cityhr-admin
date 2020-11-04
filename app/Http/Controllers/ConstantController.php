<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ConstantsTables;
use Illuminate\Http\Request;
use Str;

class ConstantController extends Controller {
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
		if (session('tabindex')) {
			session(['tabpanel' => 'index']);
		}

		$query = ConstantsTables::where('active', 1);
		if ($request->keyword) {
			$keyword = $request->keyword;
			$query   = $query->where('master_table_name', 'LIKE', "%$keyword%");
			session(['tabpanel' => 'index']);
		}

		$constants = $query->orderBy('created_at', 'desc')->get();
		session(['tabindex' => 1]);

		return view('constants.index', ['constants' => $constants]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		session(['tabpanel' => 'create']);

		return redirect()->route('constants.index');
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
			'master_table_name' => 'required|max:50',
			'description'       => 'required',
		]);

		$input                = $request->all();
		$input['constant_id'] = (string) Str::uuid();
		$input['created_by']    = auth()->user()->user_id;
		$input['created_at']    = date('Y-m-d H:i:s');

		ConstantsTables::create($input);
		session(['tabpanel' => 'index']);

		return redirect()->route('constants.index')
			->with('status', 1)->with('message', 'Record is successfully created.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Models\ConstantsTables  $constant
	 * @return \Illuminate\Http\Response
	 */
	public function show(ConstantsTables $constant) {
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Models\ConstantsTables  $constant
	 * @return \Illuminate\Http\Response
	 */
	public function edit($uuid) {
		session(['tabindex' => 1]);
		$myconstant = ConstantsTables::find($uuid);

		if (is_null($myconstant)) {
			return redirect()->route('constants.index')
				->with('status', 0)->with('message', 'Record is not found.');
		}

		return view('constants.edit', ['myconstant' => $myconstant]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Models\ConstantsTables  $constant
	 * @return \Illuminate\Http\Response
	 */
	public function update($uuid, Request $request, ConstantsTables $constant) {
		$this->validate($request, [
			'master_table_name' => 'required|max:50',
			'description'       => 'required',
		]);

		$input = $request->all();

		$myconstant = ConstantsTables::find($uuid);

		if (is_null($myconstant)) {
			return redirect()->route('constants.index')
				->with('status', 0)->with('message', 'Record is not found.');
		}

		$myconstant->update($input);
		session(['tabpanel' => 'index']);

		return redirect()->route('constants.index')
			->with('status', 1)->with('message', 'Record is successfully updated.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Models\ConstantsTables  $constant
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($uuid) {
		$myconstant = ConstantsTables::find($uuid);

		if (is_null($myconstant)) {
			return redirect()->route('constants.index')
				->with('status', 0)->with('message', 'Record is not found.');
		}

		$input['active'] = 0;
		// $input['deleted_by'] = ;

		$myconstant->update($input);
		session(['tabpanel' => 'index']);

		return redirect()->route('constants.index')
			->with('status', 1)->with('message', 'Record is successfully destroyed.');
	}
}
