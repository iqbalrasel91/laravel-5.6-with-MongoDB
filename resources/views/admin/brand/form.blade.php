@extends('admin.master')
@section('content')
@if(isset($editModeData))
	@section('title','Edit Brand')
@else
	@section('title','Add Brand')
@endif

	<div class="container-fluid">
		<div class="row bg-title">
			<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
				<ol class="breadcrumb">
					<li class="active breadcrumbColor"><a href="{{ url('dashboard') }}"><i class="fa fa-home"></i> Dashboard</a></li>
					<li>@yield('title')</li>
				  
				</ol>
			</div>
			<div class="col-lg-9 col-md-8 col-sm-8 col-xs-12">
				<a href="{{route('brand.index')}}"  class="btn btn-success pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light"><i class="fa fa-list-ul" aria-hidden="true"></i>  Brand List</a>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-info">
					<div class="panel-heading"><i class="mdi mdi-clipboard-text fa-fw"></i>@yield('title')</div>
					<div class="panel-wrapper collapse in" aria-expanded="true">
						<div class="panel-body">
							@if(isset($editModeData))
								{{ Form::model($editModeData, array('route' => array('brand.update', $editModeData->id), 'method' => 'PUT','files' => 'true','id' => 'form','class' => 'form-horizontal')) }}
							@else
								{{ Form::open(array('route' => 'brand.store','enctype'=>'multipart/form-data','id'=>'form','class' => 'form-horizontal')) }}
							@endif
							
								<div class="form-body">
									<div class="row">
										<div class="col-md-offset-2 col-md-6">
											@if($errors->any())
												<div class="alert alert-danger alert-dismissible" role="alert">
													<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
													<ul>
														@foreach($errors->all() as $error)
															<li>{!! $error !!}</li>
														@endforeach
													</ul>
												</div>
											@endif
										</div>
									</div>
									<div class="row">
										<div class="col-md-8">
											<div class="form-group">
												<label class="control-label col-md-4">Category <span class="validateRq">*</span></label>
												<div class="col-md-8">
													@php
														$data = $categoryList;
														$data[''] = '--- Select Category ---';
													@endphp
													{{ Form::select('category_id', $data, Input::old('category_id'), array('class' => 'form-control status select2 required')) }}
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-8">
											<div class="form-group">
												<label class="control-label col-md-4">Brand Name<span class="validateRq">*</span></label>
												<div class="col-md-8">
													{!! Form::text('name',Input::old('name'), $attributes = array('class'=>'form-control','placeholder'=>'Enter Brand Name')) !!}
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="form-actions">
									<div class="row">
										<div class="col-md-8">
											<div class="row">
												<div class="col-md-offset-4 col-md-8">
													@if(isset($editModeData))
														<button type="submit" class="btn btn-info btn_style"><i class="fa fa-pencil"></i> Update</button>
													@else
														<button type="submit" class="btn btn-info btn_style"><i class="fa fa-check"></i> Save</button>
													@endif
												</div>
											</div>
										</div>
									</div>
								</div>
							{{ Form::close() }}
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection


