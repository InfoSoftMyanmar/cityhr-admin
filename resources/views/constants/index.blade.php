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
													{!! Form::open(['route' => ['constants.destroy', $constant->row_id], 'method'=>'DELETE', 'role' => 'form', 'class' => 'form-horizontal']) !!}
														<a href="{{ route('constants.edit', $constant->row_id) }}" class="btn btn-success btn-sm"><i class="fe fe-edit"></i></a>

														<button class="btn btn-danger btn-sm"><i class="fe fe-trash"></i></button>
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
								{!! Form::open(['route' => 'constants.store', 'method'=>'POST', 'role' => 'form', 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data']) !!}
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
											<button type="sumbit" class="btn btn-primary">Add</button>
											<button type="reset" class="btn btn-secondary">Reset</button>
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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
@stop

@section('scripts')
<script src="{{ asset('assets/bundles/dataTables.bundle.js') }}"></script>
<script src="{{ asset('assets/js/table/datatable.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>

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
	});
</script>
@stop
