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
					<a class="nav-link @if(session('tabpanel') == 'index') active @endif" id="constant-tab" data-toggle="tab" href="#constant-list">
						<b>List</b>
					</a>
				</li>

				<li class="nav-item">
					<a class="nav-link @if(session('tabpanel') == 'create') active @endif" id="constant-tab" data-toggle="tab" href="#constant-add">
						<b>Add New</b>
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
		<div class="row clearfix">
			<div class="col-md-12">
				<div class="tab-content mt-3">
					<div class="tab-pane fade @if(session('tabpanel') == 'index') show active @endif" id="constant-list" role="tabpanel">
						<div class="card">
							<div class="card-header">
								<h3 class="card-title">Constant List</h3>
								{{-- <div class="card-options">
									{!! Form::open(['route' => 'constants.index', 'method'=>'POST', 'role' => 'form', 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data']) !!}
										<div class="input-group">
											{!! Form::text('keyword', old('keyword', request()->keyword), ['class' => 'form-control form-control-sm', 'placeholder' => 'Search something...', 'title' => 'Search something...', 'autocomplete' => 'off']) !!}

											<span class="input-group-btn ml-2"><button class="btn btn-sm btn-default" type="submit"><span class="fe fe-search"></span></button></span>
										</div>
									{!! Form::close() !!}
								</div> --}}
							</div>

							<div class="card-body">
								<div class="table-responsive">
									<table class="table table-hover js-basic-example table-vcenter text-nowrap mb-0">
										<thead>
											<tr>
												<th>#</th>
												<th class="w100">Action</th>
												<th>{{ trans('labels.master_table_name') }}</th>
												<th>{{ trans('labels.description') }}</th>
											</tr>
										</thead>
										<tbody>
											@foreach($constants as $key => $constant)
											<tr>
												<td>{{ $key + 1 }}</td>

												<td>
													{!! Form::open(['route' => ['constants.destroy', $constant->constant_id], 'method'=>'DELETE', 'role' => 'form', 'class' => 'form-horizontal']) !!}
														<a href="{{ route('constants.edit', $constant->constant_id) }}" class="btn btn-success btn-sm"><i class="fe fe-edit"></i></a>

														{{-- <button class="btn btn-danger btn-sm destroy"><i class="fe fe-trash"></i></button> --}}

														<button class="btn btn-danger btn-sm destroy" id="{{ $constant->constant_id }}">
															<i class="fe fe-trash"></i>
														</button>
													{!! Form::close() !!}
												</td>

												<td>{{ $constant->master_table_name }}</td>

												<td>{{ $constant->description }}</td>
											</tr>
											@endforeach
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>

					<div class="tab-pane fade @if(session('tabpanel') == 'create') show active @endif" id="constant-add" role="tabpanel">
						<div class="card">
							<div class="card-body">
								{!! Form::open(['route' => 'constants.store', 'method'=>'POST', 'role' => 'form', 'id' => 'myform', 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data']) !!}
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
												<label class="form-label">{{ trans('labels.default_value') }}</label>

												{!! Form::text('default_value', null, ['class' => 'form-control', 'placeholder' => trans('labels.default_value'), 'title' => trans('labels.default_value'), 'autocomplete' => 'off']) !!}
												
											</div>
										</div>

										<div class="col-sm-12">
											<br />
											<button type="sumbit" id="btnAdd" class="btn btn-primary btn-lg btn-huge">Add</button>
											<button type="reset" id="btnReset" class="btn btn-secondary btn-lg btn-huge">Reset</button>
										</div>
									</div>
								{!! Form::close() !!}
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@stop

@section('styles')
<link rel="stylesheet" href="{{ asset('assets/css/general.css') }}" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
@stop

@section('scripts')
<script src="{{ asset('assets/bundles/dataTables.bundle.js') }}"></script>
<script src="{{ asset('assets/js/table/datatable.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.5/validator.min.js"></script>

<script type="text/javascript">
	$(document).ready(function() {
		@if(session('message'))
			@if(session('status'))
				$.alert({
					title: "<h4 style='color: #43A047; text-align: center;'>Success!</h4>",
					icon: 'fa fa-success',
					type: 'green',
					content: "{{ session('message') }}",
				});
			@else
				$.alert({
					title: "<h4 style='color: #f00; text-align: center;'>Warning!</h4>",
					icon: 'fa fa-warning',
					type: 'red',
					content: "{{ session('message') }}",
				});
			@endif
		@endif

		$("#myform").submit(function (e) {			
            $("#btnAdd").attr("disabled", true);
            return true;
		});
		
		// $('.destroy').click(function(e) {
		// 	e.preventDefault();
		// 	var id = $(this).attr('id');

		// 	$.confirm({
		// 		title: "<h4 style='color: #f00; text-align: center;'>Confirm</h4>",
		// 		icon: 'fa fa-warning',
		// 		type: 'red',
		// 		content: 'Are you sure to destroy?',
		// 		buttons: {
		// 			confirm: function () {
		// 				$.ajax({
		// 					url: "{!! url('constants/"+ id +"') !!}",
		// 					type: 'DELETE',
		// 					data: {_token: '{!! csrf_token() !!}'},
		// 					dataType: 'JSON',
		// 					success: function (data) {
		// 						location.replace(data.url);
		// 					}
		// 				});
		// 			},
		// 			cancel: function () {
		// 			}
		// 		}
		// 	});
		// });

	});
</script>
@stop
