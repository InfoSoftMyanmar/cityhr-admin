@extends('layouts.app')

@section('page-title')
Constant
@stop

@section('main-content')
<div class="section-body">
	<div class="container-fluid">
		<div class="d-flex justify-content-between align-items-center">
			<ul class="nav nav-tabs page-header-tab">
				<li class="nav-item">
					<a class="nav-link active" id="constant-tab" data-toggle="tab" href="#constant-list">
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
			<div class="tab-pane fade show active" id="constant-add" role="tabpanel">
				<div class="card">
					<div class="card-body">
						{!! Form::model($myconstant, ['data-toggle' => 'validator', 'method' => 'PATCH', 'route' => ['constants.update', $myconstant->constant_id], 'role' => 'form', 'id' => 'myform', 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data']) !!}
							<div class="row clearfix">
								<div class="col-lg-6 col-md-6 col-sm-12">
									<div class="form-group">
										<label class="form-label">{{ trans('labels.constant_name') }} <span class="form-required">*</span></label>
	
										{!! Form::text('master_table_name', null, ['class' => 'form-control', 'placeholder' => trans('labels.constant_name'), 'title' => trans('labels.constant_name'), 'autocomplete' => 'off', 'required']) !!}
										<div class="help-block with-errors error_label"></div>
									</div>
								</div>
	
								<div class="col-lg-12 col-md-12 col-sm-12">
									<div class="form-group">
										<label class="form-label">{{ trans('labels.data_list') }} <span class="form-required">*</span></label>
	
										{!! Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => trans('labels.data_list'), 'title' => trans('labels.data_list'), 'autocomplete' => 'off', 'rows' => 3, 'required']) !!}
										<div class="help-block with-errors error_label"></div>
									</div>
								</div>
	
								<div class="col-lg-12 col-md-12 col-sm-12">
									<div class="form-group">
										<label class="form-label">{{ trans('labels.default_value') }} </label>
	
										{!! Form::text('default_value', null, ['class' => 'form-control', 'placeholder' => trans('labels.default_value'), 'title' => trans('labels.default_value'), 'autocomplete' => 'off']) !!}
										
									</div>
								</div>
	
								<div class="col-sm-12">
									<br />
									<button type="sumbit" id="btnUpdate" class="btn btn-primary btn-lg btn-huge">Update</button>
									<button type="reset" class="btn btn-secondary btn-lg btn-huge">Reset</button>
									<a href="{{ route('constants.index') }}" class="btn btn-danger btn-lg btn-huge">Close</a>
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
<link rel="stylesheet" href="{{ asset('assets/plugins/dropify/css/dropify.min.css') }}">
@stop

@section('scripts')
<script src="{{ asset('assets/plugins/dropify/js/dropify.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.5/validator.min.js"></script>

<script type="text/javascript">
	$(document).ready(function() {
		
		$("#myform").submit(function (e) {			
            $("#btnUpdate").attr("disabled", true);
            return true;
        });
	});
</script>
@stop
