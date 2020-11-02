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
						{!! Form::model($myconstant, ['method' => 'PATCH', 'route' => ['constants.update', $myconstant->row_id], 'role' => 'form', 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data']) !!}
							<div class="row clearfix">
								<div class="col-lg-6 col-md-6 col-sm-12">
									<div class="form-group">
										<label class="form-label">{{ trans('labels.master_table_name') }} <span class="form-required">*</span></label>

										{!! Form::text('master_table_name', null, ['class' => 'form-control', 'placeholder' => trans('labels.master_table_name'), 'title' => trans('labels.master_table_name'), 'autocomplete' => 'off']) !!}

										@if($errors->has('master_table_name'))
											<ul class="parsley-errors-list filled">
												<li class="parsley-required ">
													<small class="form-required">{{ $errors->first('master_table_name') }}</small>
												</li>
											</ul>
										@endif
									</div>
								</div>

								<div class="col-lg-12 col-md-12 col-sm-12">
									<div class="form-group">
										<label class="form-label">{{ trans('labels.description') }} <span class="form-required">*</span></label>

										{!! Form::text('description', null, ['class' => 'form-control', 'placeholder' => trans('labels.description'), 'title' => trans('labels.description'), 'autocomplete' => 'off']) !!}

										@if($errors->has('description'))
											<ul class="parsley-errors-list filled">
												<li class="parsley-required ">
													<small class="form-required">{{ $errors->first('description') }}</small>
												</li>
											</ul>
										@endif
									</div>
								</div>

								<div class="col-sm-12">
									<br />
									<button type="sumbit" class="btn btn-primary">Update</button>
									<a href="{{ route('constants.index') }}" class="btn btn-secondary">Close</a>
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
<link rel="stylesheet" href="{{ asset('assets/plugins/dropify/css/dropify.min.css') }}">
@stop

@section('scripts')
<script src="{{ asset('assets/plugins/dropify/js/dropify.min.js') }}"></script>
@stop
