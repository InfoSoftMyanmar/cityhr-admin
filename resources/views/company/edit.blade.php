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
						{!! Form::model($company, ['method' => 'PATCH', 'route' => ['company.update', $company->company_id], 'role' => 'form', 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data']) !!}
						<div class="row clearfix">

							<div class="col-lg-12 col-md-12 col-sm-12">
								<div class="form-group">
								<label class="form-label" style="margin-left: -5px; color: gray;">{{ trans('labels.company_setup') }} </label>
								</div>
							</div>
						
							<div class="col-lg-6 col-md-6 col-sm-12">
								<div class="form-group">
									<label class="form-label">{{ trans('labels.company_name') }} <span class="form-required">*</span></label>
						
									{!! Form::text('company_name', null, ['class' => 'form-control', 'placeholder' => trans('labels.company_name'), 'title' => trans('labels.company_name'), 'autocomplete' => 'off', 'required']) !!}
						
									<div class="help-block with-errors error_label"></div>
								</div>
							</div>
						
							
						
							<div class="col-lg-6 col-md-6 col-sm-12">
								<div class="form-group">
									<label class="form-label">{{ trans('labels.database_name') }} <span class="form-required">*</span></label>
						
									{!! Form::text('database_name', null, ['class' => 'form-control', 'placeholder' => trans('labels.database_name'), 'title' => trans('labels.database_name'), 'autocomplete' => 'off', 'required']) !!}
						
									<div class="help-block with-errors error_label"></div>
								</div>
							</div>
						
							<div class="col-lg-6 col-md-6 col-sm-12">
								<div class="form-group">
									<label class="form-label">{{ trans('labels.financialyear_startdate') }} <span class="form-required">*</span></label>
						
									{!! Form::text('financialyear_startdate', null, ['class' => 'form-control datepicker', 'id' => 'financialyear_startdate', 'placeholder' => trans('labels.financialyear_startdate'), 'title' => trans('labels.financialyear_startdate'), 'autocomplete' => 'off', 'required']) !!}
						
									<div class="help-block with-errors error_label"></div>
								</div>
							</div>
						
							<div class="col-lg-6 col-md-6 col-sm-12">
								<div class="form-group">
									<label class="form-label">{{ trans('labels.financialyear_enddate') }} <span class="form-required">*</span></label>
						
									{!! Form::text('financialyear_enddate', null, ['class' => 'form-control datepicker', 'id' => 'financialyear_enddate', 'placeholder' => trans('labels.financialyear_enddate'), 'title' => trans('labels.financialyear_enddate'), 'autocomplete' => 'off', 'required']) !!}
						
									<div class="help-block with-errors error_label"></div>
								</div>
							</div>
						
							<div class="col-lg-6 col-md-6 col-sm-12">
								<div class="form-group">
									<label class="form-label">{{ trans('labels.contact_person') }} <span class="form-required">*</span></label>
						
									{!! Form::text('contact_person', null, ['class' => 'form-control', 'placeholder' => trans('labels.contact_person'), 'title' => trans('labels.contact_person'), 'autocomplete' => 'off', 'required']) !!}
						
									<div class="help-block with-errors error_label"></div>
								</div>
							</div>
						
							<div class="col-lg-6 col-md-6 col-sm-12">
								<div class="form-group">
									<label class="form-label">{{ trans('labels.contact_number') }} <span class="form-required">*</span></label>
						
									{!! Form::text('contact_number', null, ['class' => 'form-control', 'placeholder' => trans('labels.contact_number'), 'title' => trans('labels.contact_number'), 'autocomplete' => 'off', 'required']) !!}
						
									<div class="help-block with-errors error_label"></div>
								</div>
							</div>
						
							<div class="col-lg-6 col-md-6 col-sm-12">
								<div class="form-group">
									<label class="form-label">{{ trans('labels.email_address') }} <span class="form-required">*</span></label>
						
									{!! Form::email('email_address', null, ['class' => 'form-control', 'placeholder' => trans('labels.email_address'), 'title' => trans('labels.email_address'), 'autocomplete' => 'off', 'required']) !!}
						
									<div class="help-block with-errors error_label"></div>
								</div>
							</div>
							
							<div class="col-lg-6 col-md-6 col-sm-12">
								<div class="row clearfix">
									<div class="col-lg-2 col-md-2 col-sm-2">
										<div class="form-group">
											<label class="form-label">{{ trans('labels.is_trial') }}</label>
											
											{{-- {!! Form::checkbox('is_trial', null, null, ['class' => 'custom-control-input', 'id' => 'is_trial']) !!} --}}


											<label class="custom-control custom-checkbox mb-0">
												{!! Form::checkbox('is_trial', null, null, ['class' => 'custom-control-input', 'id' => 'is_trial']) !!}
												<span class="custom-control-label"></span>
											</label>
											
										</div>
									</div>
								
									<div class="col-lg-10 col-md-10 col-sm-10">
										<div class="form-group">
											<label class="form-label">{{ trans('labels.trial_day') }}</label>
											
											@if($company->is_trial == '1')  
												{!! Form::select('trial_days', $trial_days, old('trial_days', $company->trial_days), ['class' => 'form-control select2', 'data-live-search' => 'false', 'id'=>'trial_days', 'autocomplete' => 'off']) !!}							
											@else
												{!! Form::select('trial_days', $trial_days, old('trial_days', $company->trial_days), ['class' => 'form-control select2', 'data-live-search' => 'false', 'id'=>'trial_days', 'autocomplete' => 'off', 'disabled'=> 'false']) !!}
											@endif
										</div>
									</div>		
								</div>
							</div>
						
							<div class="col-lg-12 col-md-12 col-sm-12">
								<div class="form-group">
								<label class="form-label" style="margin-left: -5px; color: gray;">{{ trans('labels.company_info') }} </label>
								</div>
							</div>
						
						
							<div class="col-lg-6 col-md-6 col-sm-12">
								<div class="form-group">
									<label class="form-label">{{ trans('labels.legal_trading_name') }}</label>
						
									{!! Form::text('legal_trading_name', null, ['class' => 'form-control', 'placeholder' => trans('labels.legal_trading_name'), 'title' => trans('labels.legal_trading_name'), 'autocomplete' => 'off']) !!}
						
								</div>
							</div>
						
							<div class="col-lg-6 col-md-6 col-sm-12">
								<div class="form-group">
									<label class="form-label">{{ trans('labels.registration_number') }} </label>
						
									{!! Form::text('registration_number', null, ['class' => 'form-control', 'placeholder' => trans('labels.registration_number'), 'title' => trans('labels.registration_number'), 'autocomplete' => 'off']) !!}
						
								</div>
							</div>								
						
							<div class="col-lg-6 col-md-6 col-sm-12">
								<div class="form-group">
									<label class="form-label">{{ trans('labels.contact_person_designation') }}</label>
						
									{!! Form::text('contact_person_designation', null, ['class' => 'form-control', 'placeholder' => trans('labels.contact_person_designation'), 'title' => trans('labels.contact_person_designation'), 'autocomplete' => 'off']) !!}
						
								</div>
							</div>
						
							<div class="col-lg-6 col-md-6 col-sm-12">
								<div class="form-group">
									<label class="form-label">{{ trans('labels.website') }}</label>
						
									{!! Form::text('website', null, ['class' => 'form-control', 'placeholder' => trans('labels.website'), 'title' => trans('labels.website'), 'autocomplete' => 'off']) !!}
						
								</div>
							</div>
						
							<div class="col-lg-6 col-md-6 col-sm-12">
								<div class="form-group">
									<label class="form-label">{{ trans('labels.contact_person_address') }}</label>
						
									{!! Form::text('contact_person_address', null, ['class' => 'form-control', 'placeholder' => trans('labels.contact_person_address'), 'title' => trans('labels.contact_person_address'), 'autocomplete' => 'off']) !!}
						
								</div>
							</div>
						
							<div class="col-lg-6 col-md-6 col-sm-12">
								<div class="form-group">
									<label class="form-label">{{ trans('labels.fax_number') }}</label>
						
									{!! Form::text('fax_number', null, ['class' => 'form-control', 'placeholder' => trans('labels.fax_number'), 'title' => trans('labels.fax_number'), 'autocomplete' => 'off']) !!}
						
								</div>
							</div>
						
							<div class="col-lg-6 col-md-6 col-sm-12">
								<div class="form-group">
									<label class="form-label">{{ trans('labels.country') }} </label>
						
									{!! Form::text('country', null, ['class' => 'form-control', 'placeholder' => trans('labels.country'), 'title' => trans('labels.country'), 'autocomplete' => 'off']) !!}
						
								</div>
							</div>
						
							<div class="col-lg-6 col-md-6 col-sm-12">
								<div class="form-group">
									<label class="form-label">{{ trans('labels.city') }} </label>
						
									{!! Form::text('city', null, ['class' => 'form-control', 'placeholder' => trans('labels.city'), 'title' => trans('labels.city'), 'autocomplete' => 'off']) !!}
						
								</div>
							</div>
						
							<div class="col-lg-6 col-md-6 col-sm-12">
								<div class="form-group">
									<label class="form-label">{{ trans('labels.state') }} </label>
						
									{!! Form::text('state', null, ['class' => 'form-control', 'placeholder' => trans('labels.state'), 'title' => trans('labels.state'), 'autocomplete' => 'off']) !!}
						
								</div>
							</div>
						
							<div class="col-lg-6 col-md-6 col-sm-12">
								<div class="form-group">
									<label class="form-label">{{ trans('labels.postal_code') }}</label>
						
									{!! Form::number('postal_code', null, ['class' => 'form-control', 'placeholder' => trans('labels.postal_code'), 'title' => trans('labels.postal_code'), 'autocomplete' => 'off']) !!}
						
								</div>
							</div>
						
							<div class="col-lg-6 col-md-6 col-sm-12">
								<div class="form-group">
									<label class="form-label">{{ trans('labels.company_type') }} </label>
						
									{!! Form::select('company_type', $companyTypes, old('company_type', $companyTypeDefault), ['class' => 'form-control select2', 'id' => 'company_type', 'data-live-search' => 'false', 'autocomplete' => 'off']) !!}
						
								</div>
							</div>
						
							<div class="col-lg-6 col-md-6 col-sm-12">
								<div class="form-group">
									<label class="form-label">{{ trans('labels.company_address') }} </label>
						
									{!! Form::text('company_address', null, ['class' => 'form-control', 'placeholder' => trans('labels.company_address'), 'title' => trans('labels.company_address'), 'autocomplete' => 'off']) !!}
						
								</div>
							</div>
						
							{{-- <div class="col-lg-6 col-md-6 col-sm-12">
								<div class="form-group">
									<label class="form-label">{{ trans('labels.currency_use') }} </label>
						
									{!! Form::text('currency_use', null, ['class' => 'form-control', 'placeholder' => trans('labels.currency_use'), 'title' => trans('labels.currency_use'), 'autocomplete' => 'off']) !!}
						
								</div>
							</div> --}}
						
							<div class="col-lg-6 col-md-6 col-sm-12">
								<div class="form-group">
									<label class="form-label">{{ trans('labels.currency_use') }} </label>
						
									{!! Form::select('currency_use', $currencyUse, old('currency_use', $company->currency_use), ['class' => 'form-control select2', 'id' => 'currency_use', 'data-live-search' => 'false', 'autocomplete' => 'off']) !!}
						
								</div>
							</div>
						
							<div class="col-lg-6 col-md-6 col-sm-12">
								<div class="form-group">
									<label class="form-label">{{ trans('labels.currency_sign') }}</label>
						
									{!! Form::text('currency_sign', null, ['class' => 'form-control', 'placeholder' => trans('labels.currency_sign'), 'title' => trans('labels.currency_sign'), 'autocomplete' => 'off']) !!}
						
								</div>
							</div>
						
							<div class="col-lg-6 col-md-6 col-sm-12">
								<div class="form-group">
									<label class="form-label">{{ trans('labels.vision') }} </label>
						
									{!! Form::textarea('vision', null, ['class' => 'form-control', 'placeholder' => trans('labels.vision'), 'title' => trans('labels.vision'), 'autocomplete' => 'off', 'rows' => 3]) !!}
						
								</div>
							</div>
						
							<div class="col-lg-6 col-md-6 col-sm-12">
								<div class="form-group">
									<label class="form-label">{{ trans('labels.mission') }} </label>
						
									{!! Form::textarea('mission', null, ['class' => 'form-control', 'placeholder' => trans('labels.mission'), 'title' => trans('labels.mission'), 'autocomplete' => 'off', 'rows' => 3]) !!}
						
								</div>
							</div>
						
							<div class="col-lg-6 col-md-6 col-sm-12">
								<div class="form-group">
									<label class="form-label">{{ trans('labels.profile') }} </label>
						
									{!! Form::textarea('profile', null, ['class' => 'form-control', 'placeholder' => trans('labels.profile'), 'title' => trans('labels.profile'), 'autocomplete' => 'off', 'rows' => 3]) !!}
						
								</div>
							</div>
						
							<div class="col-lg-6 col-md-6 col-sm-12">
								<div class="form-group">
									<label class="form-label">{{ trans('labels.additional_note') }}</label>
						
									{!! Form::textarea('additional_note', null, ['class' => 'form-control', 'placeholder' => trans('labels.additional_note'), 'title' => trans('labels.additional_note'), 'autocomplete' => 'off', 'rows' => 3]) !!}
						
								</div>
							</div>
						
							<div class="col-lg-6 col-md-6 col-sm-12">
								<label class="form-label">{{ trans('labels.company_logo') }}</label>
								<input type="file" class="dropify" name="company_logo" @if($company->company_logo) data-default-file="{{ asset('uploads/companies/logos/' . $company->company_logo) }}" @endif>
						
							</div>
						
							<div class="col-lg-6 col-md-6 col-sm-12">
								<label class="form-label">{{ trans('labels.attachment_file') }}</label>
								<input type="file" class="dropify" name="attachment_file" @if($company->attachment_file) data-default-file="{{ asset('uploads/companies/attachments/' . $mycompany->attachment_file) }}" @endif>
						
							</div>
						
							<div class="col-sm-12">
								<br />
								<button type="sumbit" class="btn btn-primary btn-lg btn-huge">Update</button>
								<button type="reset" class="btn btn-secondary btn-lg btn-huge">Reset</button>
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

<link rel="stylesheet" href="{{ asset('assets/css/general.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/plugins/summernote/dist/summernote.css') }}"/>
<link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/dropify/css/dropify.min.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/select2/css/select2.css') }}" />
<link href="{{ asset('assets/plugins/datetimepicker/css/bootstrap-datetimepicker.css') }}" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
@stop

@section('scripts')
<script src="{{ asset('assets/bundles/dataTables.bundle.js') }}"></script>
<script src="{{ asset('assets/js/table/datatable.js') }}"></script>
<script src="{{ asset('assets/plugins/dropify/js/dropify.min.js') }}"></script>
<script src="{{ asset('assets/js/form/dropify.js') }}"></script>
<script src="{{ asset('assets/js/moment.min.js') }}"></script>
<script src="{{ asset('assets/plugins/select2/js/select2.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datetimepicker/js/bootstrap-datetimepicker.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<script type="text/javascript">
	$(document).ready(function(){
		$('.select2').select2();

		$('#financialyear_startdate').datetimepicker({
			format: 'YYYY-MM-DD',
			widgetPositioning:{
				horizontal: 'auto',
				vertical: 'top'
			}
		});
		$('#financialyear_enddate').datetimepicker({
			format: 'YYYY-MM-DD',
			widgetPositioning:{
				horizontal: 'auto',
				vertical: 'top'
			},
			useCurrent: false
		});

		$("#financialyear_startdate").on("dp.change", function (e) {
           $('#financialyear_enddate').data("DateTimePicker").minDate(e.date);
		});

		$("#financialyear_enddate").on("dp.change", function (e) {
			$('#financialyear_startdate').data("DateTimePicker").maxDate(e.date);
		});

		$('#is_trial').change(function(e) {
			if($(this).is(':checked')){
				//Enable the submit button.
				$('#trial_days').attr("disabled", false);
			} else{
				//If it is not checked, disable the button.
				$('#trial_days').attr("disabled", true);
			}
		});
	});
</script>
@stop
