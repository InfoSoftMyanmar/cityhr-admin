@extends('layouts.app')

@section('page-title')
Company
@stop

@section('main-content')
<div class="section-body">
	<div class="container-fluid">
		<div class="d-flex justify-content-between align-items-center">
			<ul class="nav nav-tabs page-header-tab">
				<li class="nav-item">
					<a class="nav-link active" id="company-tab" data-toggle="tab" href="#company-list">
						<b>Edit Form</b>
					</a>
				</li>
			</ul>
			<div class="header-action">
				{{-- <button type="button" class="btn btn-primary"><i class="fe fe-plus mr-2"></i>Add</button> --}}
			</div>
		</div>
	</div>
</div>

<div class="section-body mt-3">
	<div class="container-fluid">
		<div class="tab-content mt-3">
			<div class="tab-pane fade show active" id="company-add" role="tabpanel">
				<div class="card">
					<div class="card-body">
						{!! Form::model($company, ['method' => 'PATCH', 'route' => ['company.update', $company->row_id], 'role' => 'form', 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data']) !!}
							<div class="row clearfix">
								<div class="col-lg-6 col-md-6 col-sm-12">
									<div class="form-group">
										<label class="form-label">{{ trans('labels.company_name') }} <span class="form-required">*</span></label>

										{!! Form::text('company_name', null, ['class' => 'form-control', 'placeholder' => trans('labels.company_name'), 'title' => trans('labels.company_name'), 'autocomplete' => 'off']) !!}

										@if($errors->has('company_name'))
											<ul class="parsley-errors-list filled">
												<li class="parsley-required ">
													<small class="form-required">{{ $errors->first('company_name') }}</small>
												</li>
											</ul>
										@endif
									</div>
								</div>

								<div class="col-lg-6 col-md-6 col-sm-12">
									<div class="form-group">
										<label class="form-label">{{ trans('labels.legal_trading_name') }} <span class="form-required">*</span></label>

										{!! Form::text('legal_trading_name', null, ['class' => 'form-control', 'placeholder' => trans('labels.legal_trading_name'), 'title' => trans('labels.legal_trading_name'), 'autocomplete' => 'off']) !!}

										@if($errors->has('legal_trading_name'))
											<ul class="parsley-errors-list filled">
												<li class="parsley-required ">
													<small class="form-required">{{ $errors->first('legal_trading_name') }}</small>
												</li>
											</ul>
										@endif
									</div>
								</div>

								<div class="col-lg-6 col-md-6 col-sm-12">
									<div class="form-group">
										<label class="form-label">{{ trans('labels.registration_number') }} <span class="form-required">*</span></label>

										{!! Form::text('registration_number', null, ['class' => 'form-control', 'placeholder' => trans('labels.registration_number'), 'title' => trans('labels.registration_number'), 'autocomplete' => 'off']) !!}

										@if($errors->has('registration_number'))
											<ul class="parsley-errors-list filled">
												<li class="parsley-required ">
													<small class="form-required">{{ $errors->first('registration_number') }}</small>
												</li>
											</ul>
										@endif
									</div>
								</div>

								<div class="col-lg-6 col-md-6 col-sm-12">
									<div class="form-group">
										<label class="form-label">{{ trans('labels.company_type') }} <span class="form-required">*</span></label>

										{!! Form::select('company_type', ['' => trans('labels.company_type')] + $companyTypes, null, ['class' => 'form-control select2', 'id' => 'company_type', 'data-live-search' => 'true', 'autocomplete' => 'off']) !!}

										@if($errors->has('company_type'))
											<ul class="parsley-errors-list filled">
												<li class="parsley-required ">
													<small class="form-required">{{ $errors->first('company_type') }}</small>
												</li>
											</ul>
										@endif
									</div>
								</div>

								<div class="col-lg-6 col-md-6 col-sm-12">
									<div class="form-group">
										<label class="form-label">{{ trans('labels.contact_person') }} <span class="form-required">*</span></label>

										{!! Form::text('contact_person', null, ['class' => 'form-control', 'placeholder' => trans('labels.contact_person'), 'title' => trans('labels.contact_person'), 'autocomplete' => 'off']) !!}

										@if($errors->has('contact_person'))
											<ul class="parsley-errors-list filled">
												<li class="parsley-required ">
													<small class="form-required">{{ $errors->first('contact_person') }}</small>
												</li>
											</ul>
										@endif
									</div>
								</div>

								<div class="col-lg-6 col-md-6 col-sm-12">
									<div class="form-group">
										<label class="form-label">{{ trans('labels.contact_person_designation') }} <span class="form-required">*</span></label>

										{!! Form::text('contact_person_designation', null, ['class' => 'form-control', 'placeholder' => trans('labels.contact_person_designation'), 'title' => trans('labels.contact_person_designation'), 'autocomplete' => 'off']) !!}

										@if($errors->has('contact_person_designation'))
											<ul class="parsley-errors-list filled">
												<li class="parsley-required ">
													<small class="form-required">{{ $errors->first('contact_person_designation') }}</small>
												</li>
											</ul>
										@endif
									</div>
								</div>

								<div class="col-lg-6 col-md-6 col-sm-12">
									<div class="form-group">
										<label class="form-label">{{ trans('labels.contact_number') }} <span class="form-required">*</span></label>

										{!! Form::text('contact_number', null, ['class' => 'form-control', 'placeholder' => trans('labels.contact_number'), 'title' => trans('labels.contact_number'), 'autocomplete' => 'off']) !!}

										@if($errors->has('contact_number'))
											<ul class="parsley-errors-list filled">
												<li class="parsley-required ">
													<small class="form-required">{{ $errors->first('contact_number') }}</small>
												</li>
											</ul>
										@endif
									</div>
								</div>

								<div class="col-lg-6 col-md-6 col-sm-12">
									<div class="form-group">
										<label class="form-label">{{ trans('labels.fax_number') }}</label>

										{!! Form::text('fax_number', null, ['class' => 'form-control', 'placeholder' => trans('labels.fax_number'), 'title' => trans('labels.fax_number'), 'autocomplete' => 'off']) !!}

										@if($errors->has('fax_number'))
											<ul class="parsley-errors-list filled">
												<li class="parsley-required ">
													<small class="form-required">{{ $errors->first('fax_number') }}</small>
												</li>
											</ul>
										@endif
									</div>
								</div>

								<div class="col-lg-6 col-md-6 col-sm-12">
									<div class="form-group">
										<label class="form-label">{{ trans('labels.email_address') }} <span class="form-required">*</span></label>

										{!! Form::email('email_address', null, ['class' => 'form-control', 'placeholder' => trans('labels.email_address'), 'title' => trans('labels.email_address'), 'autocomplete' => 'off']) !!}

										@if($errors->has('email_address'))
											<ul class="parsley-errors-list filled">
												<li class="parsley-required ">
													<small class="form-required">{{ $errors->first('email_address') }}</small>
												</li>
											</ul>
										@endif
									</div>
								</div>

								<div class="col-lg-6 col-md-6 col-sm-12">
									<div class="form-group">
										<label class="form-label">{{ trans('labels.contact_person_address') }} <span class="form-required">*</span></label>

										{!! Form::text('contact_person_address', null, ['class' => 'form-control', 'placeholder' => trans('labels.contact_person_address'), 'title' => trans('labels.contact_person_address'), 'autocomplete' => 'off']) !!}

										@if($errors->has('contact_person_address'))
											<ul class="parsley-errors-list filled">
												<li class="parsley-required ">
													<small class="form-required">{{ $errors->first('contact_person_address') }}</small>
												</li>
											</ul>
										@endif
									</div>
								</div>

								<div class="col-lg-6 col-md-6 col-sm-12">
									<div class="form-group">
										<label class="form-label">{{ trans('labels.website') }}</label>

										{!! Form::text('website', null, ['class' => 'form-control', 'placeholder' => trans('labels.website'), 'title' => trans('labels.website'), 'autocomplete' => 'off']) !!}

										@if($errors->has('website'))
											<ul class="parsley-errors-list filled">
												<li class="parsley-required ">
													<small class="form-required">{{ $errors->first('website') }}</small>
												</li>
											</ul>
										@endif
									</div>
								</div>

								<div class="col-lg-6 col-md-6 col-sm-12">
									<div class="form-group">
										<label class="form-label">{{ trans('labels.company_address') }} <span class="form-required">*</span></label>

										{!! Form::text('company_address', null, ['class' => 'form-control', 'placeholder' => trans('labels.company_address'), 'title' => trans('labels.company_address'), 'autocomplete' => 'off']) !!}

										@if($errors->has('company_address'))
											<ul class="parsley-errors-list filled">
												<li class="parsley-required ">
													<small class="form-required">{{ $errors->first('company_address') }}</small>
												</li>
											</ul>
										@endif
									</div>
								</div>

								<div class="col-lg-6 col-md-6 col-sm-12">
									<div class="form-group">
										<label class="form-label">{{ trans('labels.city') }} <span class="form-required">*</span></label>

										{!! Form::text('city', null, ['class' => 'form-control', 'placeholder' => trans('labels.city'), 'title' => trans('labels.city'), 'autocomplete' => 'off']) !!}

										@if($errors->has('city'))
											<ul class="parsley-errors-list filled">
												<li class="parsley-required ">
													<small class="form-required">{{ $errors->first('city') }}</small>
												</li>
											</ul>
										@endif
									</div>
								</div>

								<div class="col-lg-6 col-md-6 col-sm-12">
									<div class="form-group">
										<label class="form-label">{{ trans('labels.state') }} <span class="form-required">*</span></label>

										{!! Form::text('state', null, ['class' => 'form-control', 'placeholder' => trans('labels.state'), 'title' => trans('labels.state'), 'autocomplete' => 'off']) !!}

										@if($errors->has('state'))
											<ul class="parsley-errors-list filled">
												<li class="parsley-required ">
													<small class="form-required">{{ $errors->first('state') }}</small>
												</li>
											</ul>
										@endif
									</div>
								</div>

								<div class="col-lg-6 col-md-6 col-sm-12">
									<div class="form-group">
										<label class="form-label">{{ trans('labels.postal_code') }} <span class="form-required">*</span></label>

										{!! Form::number('postal_code', null, ['class' => 'form-control', 'placeholder' => trans('labels.postal_code'), 'title' => trans('labels.postal_code'), 'autocomplete' => 'off']) !!}

										@if($errors->has('postal_code'))
											<ul class="parsley-errors-list filled">
												<li class="parsley-required ">
													<small class="form-required">{{ $errors->first('postal_code') }}</small>
												</li>
											</ul>
										@endif
									</div>
								</div>

								<div class="col-lg-6 col-md-6 col-sm-12">
									<div class="form-group">
										<label class="form-label">{{ trans('labels.country') }} <span class="form-required">*</span></label>

										{!! Form::text('country', null, ['class' => 'form-control', 'placeholder' => trans('labels.country'), 'title' => trans('labels.country'), 'autocomplete' => 'off']) !!}

										@if($errors->has('country'))
											<ul class="parsley-errors-list filled">
												<li class="parsley-required ">
													<small class="form-required">{{ $errors->first('country') }}</small>
												</li>
											</ul>
										@endif
									</div>
								</div>

								<div class="col-lg-6 col-md-6 col-sm-12">
									<div class="form-group">
										<label class="form-label">{{ trans('labels.currency_use') }} <span class="form-required">*</span></label>

										{!! Form::text('currency_use', null, ['class' => 'form-control', 'placeholder' => trans('labels.currency_use'), 'title' => trans('labels.currency_use'), 'autocomplete' => 'off']) !!}

										@if($errors->has('currency_use'))
											<ul class="parsley-errors-list filled">
												<li class="parsley-required ">
													<small class="form-required">{{ $errors->first('currency_use') }}</small>
												</li>
											</ul>
										@endif
									</div>
								</div>

								<div class="col-lg-6 col-md-6 col-sm-12">
									<div class="form-group">
										<label class="form-label">{{ trans('labels.currency_sign') }} <span class="form-required">*</span></label>

										{!! Form::text('currency_sign', null, ['class' => 'form-control', 'placeholder' => trans('labels.currency_sign'), 'title' => trans('labels.currency_sign'), 'autocomplete' => 'off']) !!}

										@if($errors->has('currency_sign'))
											<ul class="parsley-errors-list filled">
												<li class="parsley-required ">
													<small class="form-required">{{ $errors->first('currency_sign') }}</small>
												</li>
											</ul>
										@endif
									</div>
								</div>

								<div class="col-lg-6 col-md-6 col-sm-12">
									<div class="form-group">
										<label class="form-label">{{ trans('labels.vision') }} <span class="form-required">*</span></label>

										{!! Form::textarea('vision', null, ['class' => 'form-control', 'placeholder' => trans('labels.vision'), 'title' => trans('labels.vision'), 'autocomplete' => 'off', 'rows' => 3]) !!}

										@if($errors->has('vision'))
											<ul class="parsley-errors-list filled">
												<li class="parsley-required ">
													<small class="form-required">{{ $errors->first('vision') }}</small>
												</li>
											</ul>
										@endif
									</div>
								</div>

								<div class="col-lg-6 col-md-6 col-sm-12">
									<div class="form-group">
										<label class="form-label">{{ trans('labels.mission') }} <span class="form-required">*</span></label>

										{!! Form::textarea('mission', null, ['class' => 'form-control', 'placeholder' => trans('labels.mission'), 'title' => trans('labels.mission'), 'autocomplete' => 'off', 'rows' => 3]) !!}

										@if($errors->has('mission'))
											<ul class="parsley-errors-list filled">
												<li class="parsley-required ">
													<small class="form-required">{{ $errors->first('mission') }}</small>
												</li>
											</ul>
										@endif
									</div>
								</div>

								<div class="col-lg-6 col-md-6 col-sm-12">
									<div class="form-group">
										<label class="form-label">{{ trans('labels.profile') }} <span class="form-required">*</span></label>

										{!! Form::textarea('profile', null, ['class' => 'form-control', 'placeholder' => trans('labels.profile'), 'title' => trans('labels.profile'), 'autocomplete' => 'off', 'rows' => 3]) !!}

										@if($errors->has('profile'))
											<ul class="parsley-errors-list filled">
												<li class="parsley-required ">
													<small class="form-required">{{ $errors->first('profile') }}</small>
												</li>
											</ul>
										@endif
									</div>
								</div>

								<div class="col-lg-6 col-md-6 col-sm-12">
									<div class="form-group">
										<label class="form-label">{{ trans('labels.additional_note') }}</label>

										{!! Form::textarea('additional_note', null, ['class' => 'form-control', 'placeholder' => trans('labels.additional_note'), 'title' => trans('labels.additional_note'), 'autocomplete' => 'off', 'rows' => 3]) !!}

										@if($errors->has('additional_note'))
											<ul class="parsley-errors-list filled">
												<li class="parsley-required ">
													<small class="form-required">{{ $errors->first('additional_note') }}</small>
												</li>
											</ul>
										@endif
									</div>
								</div>

								<div class="col-lg-6 col-md-6 col-sm-12">
									<label class="form-label">{{ trans('labels.company_logo') }}</label>
									<input type="file" class="dropify" name="company_logo" @if($company->company_logo) data-default-file="{{ asset('uploads/companies/logos/' . $company->company_logo) }}" @endif>

									@if($errors->has('company_logo'))
										<ul class="parsley-errors-list filled">
											<li class="parsley-required ">
												<small class="form-required">{{ $errors->first('company_logo') }}</small>
											</li>
										</ul>
									@endif
								</div>

								<div class="col-lg-6 col-md-6 col-sm-12">
									<label class="form-label">{{ trans('labels.attachment_file') }}</label>
									<input type="file" class="dropify" name="attachment_file" @if($company->attachment_file) data-default-file="{{ asset('uploads/companies/attachments/' . $mycompany->attachment_file) }}" @endif>

									@if($errors->has('attachment_file'))
										<ul class="parsley-errors-list filled">
											<li class="parsley-required ">
												<small class="form-required">{{ $errors->first('attachment_file') }}</small>
											</li>
										</ul>
									@endif
								</div>

								<div class="col-sm-12">
									<br />
									<button type="sumbit" class="btn btn-primary">Update</button>
									<a href="{{ route('company.index') }}" class="btn btn-secondary">Close</a>
								</div>
							</div>
						{!! Form::close() !!}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@stop

@section('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/dropify/css/dropify.min.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/select2/css/select2.css') }}" />
@stop

@section('scripts')
<script src="{{ asset('assets/plugins/dropify/js/dropify.min.js') }}"></script>
<script src="{{ asset('assets/js/form/dropify.js') }}"></script>
<script src="{{ asset('assets/plugins/select2/js/select2.min.js') }}"></script>

<script type="text/javascript">
	$(document).ready(function(){
		$('.select2').select2();
	});
</script>
@stop
