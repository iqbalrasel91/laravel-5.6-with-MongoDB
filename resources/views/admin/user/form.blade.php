@extends('admin.master')
@section('content')
@if(isset($editModeData))
@section('title','Edit User')
@else
	@section('title','Add User')
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
				<a href="{{route('user.index')}}"  class="btn btn-success pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light"><i class="fa fa-list-ul" aria-hidden="true"></i>  View Users</a>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-info">
					<div class="panel-heading"><i class="mdi mdi-clipboard-text fa-fw"></i> @yield('title')</div>
					<div class="panel-wrapper collapse in" aria-expanded="true">
						<div class="panel-body">
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

							@if(isset($editModeData))
								{{ Form::model(@$editModeData, array('route' => array('user.update', $editModeData->id), 'method' => 'PUT','files' => 'true','id' => 'userForm')) }}
							@else
								{{ Form::open(array('route' => 'user.store','enctype'=>'multipart/form-data','id'=>'userForm')) }}
							@endif
								<div class="form-body">
									<div class="row">
										<div class="col-md-4">
											<div class="form-group">
												<label for="exampleInput">Full Name<span class="validateRq">*</span></label>
												<input type="hidden" name="user_type" value="1">
												{!! Form::text('name', Input::old('name'), $attributes = array('class'=>'form-control required name','id'=>'name','placeholder'=>'Enter your full name')) !!}
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
											  <label for="exampleInput">Email <span class="validateRq">*</span></label>
												{!! Form::text('email', Input::old('email'), $attributes = array('class'=>'form-control required email','id'=>'email','placeholder'=>'Enter your email')) !!}
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label for="picture">User Type<span class="validateRq">*</span></label>
												{{ Form::select('user_type', array('1' => 'Admin', '2' => 'Viewer'), Input::old('user_type'), array('class' => 'form-control user_type required')) }}
											</div>
										</div>

									</div>
									<div class="row">
										@if(!isset($editModeData))
											<div class="col-md-4">
												<div class="form-group">
													<label for="password">Password<span class="validateRq">*</span></label>
													{!! Form::password('password', $attributes = array('class'=>'form-control required password','id'=>'password','placeholder'=>'Enter Password')) !!}
												</div>
											</div>

										<div class="col-md-4">
											<div class="form-group">
												<label for="password_confirmation">Confirm Password <span class="validateRq">*</span></label>
												{!! Form::password('password_confirmation', $attributes = array('class'=>'form-control required password_confirmation','id'=>'password_confirmation','placeholder'=>'Enter confirm password')) !!}
											</div>
										</div>
										@endif

									</div>
								</div>
								<div class="form-actions">
									<div class="row">
										<div class="col-md-6">
											<button type="submit" class="btn btn-info btn_style"><i class="fa fa-check"></i> Submit</button>
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

