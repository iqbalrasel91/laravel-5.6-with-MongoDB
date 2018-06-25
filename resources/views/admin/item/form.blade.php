@extends('admin.master')
@section('content')
@if(isset($editModeData))
	@section('title','Edit Item')
@else
	@section('title','Add Item')
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
				<a href="{{route('item.index')}}"  class="btn btn-success pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light"><i class="fa fa-list-ul" aria-hidden="true"></i>  View Item</a>
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
								{{ Form::model($editModeData, array('route' => array('item.update', $editModeData->id), 'method' => 'PUT','files' => 'true','id' => 'form','enctype'=>'multipart/form-data',)) }}
							@else
								{{ Form::open(array('route' => 'item.store','enctype'=>'multipart/form-data','id'=>'form')) }}
							@endif
								<div class="form-body">
									<div class="row">
										<div class="col-md-4">
											<div class="form-group">
												<label for="exampleInput">Item Name<span class="validateRq">*</span></label>
												{!! Form::text('name', Input::old('name'), $attributes = array('class'=>'form-control','placeholder'=>'Enter Item Name')) !!}
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
											  <label for="exampleInput">Category<span class="validateRq">*</span></label>
												@php
													$categoryData = $categoryList;
                                                    $categoryData[''] = '--- Select Category ---';
												@endphp
												{{ Form::select('category_id', $categoryData, Input::old('category_id'), array('class' => 'form-control status')) }}
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
											  <label for="exampleInput">Market<span class="validateRq">*</span></label>
												@php
													$marketData = $marketList;
                                                    $marketData[''] = '--- Select Market ---';
												@endphp
												{{ Form::select('market_id', $marketData, Input::old('market_id'), array('class' => 'form-control status select2 required')) }}
											</div>
										</div>
									</div>

									<div class="row">

										<div class="col-md-4">
											<div class="form-group">
											  <label for="exampleInput">Brand<span class="validateRq">*</span></label>
												@php
													$brandData = $brandList;
                                                    $brandData[''] = '--- Select Brand ---';
												@endphp
												{{ Form::select('brand_id', $brandData, Input::old('brand_id'), array('class' => 'form-control status select2 required')) }}
											</div>
										</div>

										<div class="col-md-4">
											<div class="form-group">
											  <label for="exampleInput">Status<span class="validateRq">*</span></label>
												{{ Form::select('status', array('1' => 'Active', '2' => 'Inactive'), Input::old('status'), array('class' => 'form-control status select2 required')) }}
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<label for="exampleInput">Item Image</label>
												<div class="input-group">
													<div class="input-group-addon"><i class="fa fa-files-o"></i></div>
													{!! Form::file('item_image',$attributes = array('class'=>'form-control','accept'=>'image/png, image/jpeg, image/gif,image/jpg')) !!}
												</div>
											</div>
										</div>
										<div class="col-md-1">
											@if(isset($editModeData->item_image) && $editModeData->item_image !='' && file_exists('uploads/itemimg/'.$editModeData->item_image))
												<img src="{{asset('uploads/itemimg/'.$editModeData->item_image)}}" style="width: 70px;">
											@else
												<img src="{{asset('admin_assets/img/default.png')}}">
											@endif
										</div>
									</div>

									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label for="exampleInput">Item Description</label>
												{!! Form::textarea('desc', Input::old('desc'), $attributes = array('class'=>'form-control summernote','placeholder'=>'Enter Description..','rows'=>'5','cols'=>'5')) !!}
											</div>
										</div>
									</div>
										@if(isset($editModeData))

										<div class="row">
											<div class="col-md-3 pull-right">
												<button type="button" class="btn btn-success colon_sp" ><i class="fa fa-plus"></i> Add More Specification</button>
											</div>
										</div>



										@foreach($editModeSpecificationData as $editSpecification)
										<div id="coloned_input_sp">
												<div class="row">
													<div class="col-md-5">
														<div class="form-group">
															<label for="exampleInput">Item Specification <span class="validateRq">*</span></label>
															<input type="text" class="form-control" placeholder="Enter Item Specification" name="item_specification_name[]" value="{{$editSpecification->name}}">
														</div>
													</div>
													<div class="col-md-5">
														<div class="form-group">
															<label for="exampleInput">Specification Value<span class="validateRq">*</span></label>
															<input type="text" class="form-control" placeholder="Enter Item Specification" name="value[]" value="{{$editSpecification->value}}">
														</div>
													</div>
													<div class="col-md-2">
														<button type="button" class="btn btn-danger remove_sp" style="margin-top: 25px"><i class="fa fa-minus"></i> Remove</button>
													</div>
												</div>

										</div>

										@endforeach
										<div id="coloned_output_sp">

										</div>

                                        @else


											<div class="row">
												<div class="col-md-3 pull-right">
													<button type="button" class="btn btn-success colon_image" ><i class="fa fa-plus"></i> Add More Specification</button>
												</div>
                                            </div>

											<div id="coloned_input_image">

												 <div class="row">
													<div class="col-md-5">
														<div class="form-group">
															<label for="exampleInput">Item Specification Title <span class="validateRq">*</span></label>
															{!! Form::text('item_specification_name[]', Input::old('item_specification_name'), $attributes = array('class'=>'form-control','placeholder'=>'Enter Item Specification Title','required')) !!}
														</div>
													</div>
													<div class="col-md-5">
														<div class="form-group">
															<label for="exampleInput">Specification Value<span class="validateRq">*</span></label>
															{!! Form::text('value[]', Input::old('value'), $attributes = array('class'=>'form-control','placeholder'=>'Enter Specification Value','required')) !!}
														</div>
													</div>

													<div class="col-md-2">
														<button type="button" class="btn btn-danger remove_image" style="margin-top: 25px"><i class="fa fa-minus"></i> Remove</button>
													</div>

												 </div>

											</div>


										<div id="coloned_output_image">

										</div>



										@endif


									<div class="row">
										<div class="col-md-6">
											@if(isset($editModeData))
												<button type="submit" class="btn btn-info btn_style"><i class="fa fa-pencil"></i> Update</button>
											@else
												<button type="submit" class="btn btn-info btn_style"><i class="fa fa-check"></i> Save</button>
											@endif
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
	<script type="text/javascript">
	$(document).ready(function(){

		$('button.colon_image').click(function(){
            var clone = $('#coloned_input_image:last').clone();
            clone.find("input").val("");
            clone.appendTo('#coloned_output_image:last');

		});

		
		$('body').on('click','.remove_image', function() {
				$(this).closest('#coloned_input_image').remove();

		});


        $('button.colon_sp').click(function(){
            var clone = $('#coloned_input_sp:last').clone();
            clone.find("input").val("");
            clone.appendTo('#coloned_output_sp:last');

        });

        $('body').on('click','.remove_sp', function() {
            $(this).closest('#coloned_input_sp').remove();

        });


    });
</script>
@endsection

