@extends('admin.master')
@section('content')
@if(isset($editModeData))
	@section('title','Edit Item Price')
@else
	@section('title','Add Item Price')
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
				<a href="{{route('price.index')}}"  class="btn btn-success pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light"><i class="fa fa-list-ul" aria-hidden="true"></i>  View Item Price</a>
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
								{{ Form::model($editModeData, array('route' => array('price.update', $editModeData->id), 'method' => 'PUT','files' => 'true','id' => 'form','enctype'=>'multipart/form-data',)) }}
							@else
								{{ Form::open(array('route' => 'price.store','enctype'=>'multipart/form-data','id'=>'form')) }}
							@endif
								<div class="form-body">
									<div class="row">

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInput">Item<span class="validateRq">*</span></label>
                                                {{ Form::select('item_id', $itemList, Input::old('item_id'), array('class' => 'form-control item_id select2 required')) }}
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="exampleInput">User <span class="validateRq">*</span></label>
                                                {{ Form::select('item_by', $userList, Input::old('item_by'), array('class' => 'form-control item_by select2 required')) }}
                                            </div>
                                        </div>

										<div class="col-md-3">
											<div class="form-group">
												<label for="exampleInput">Amount<span class="validateRq">*</span></label>
												{!! Form::text('amount', Input::old('amount'), $attributes = array('class'=>'form-control','placeholder'=>'Enter Item Amount')) !!}
											</div>
										</div>


									</div>

									<div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="exampleInput">Market<span class="validateRq">*</span></label>
                                                {{ Form::select('market_id', $marketList, Input::old('market_id'), array('class' => 'form-control status select2 required')) }}
                                            </div>
                                        </div>

										<div class="col-md-3">
											<div class="form-group">
												<label for="exampleInput">Price Type<span class="validateRq">*</span></label>
												{!! Form::select('price_type_id', $priceTypeList,Input::old('price_type_id'), $attributes = array('class'=>'form-control')) !!}
											</div>
										</div>

										<div class="col-md-3">
											<div class="form-group">
												<label for="exampleInput">UOM<span class="validateRq">*</span></label>
												{!! Form::select('uom_id', $uomList,Input::old('uom_id'), $attributes = array('class'=>'form-control')) !!}
											</div>
										</div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="exampleInput">Currency<span class="validateRq">*</span></label>
                                                {!! Form::text('currency', Input::old('currency'), $attributes = array('class'=>'form-control','placeholder'=>'Enter Item Currency')) !!}
                                            </div>
                                        </div>




									</div>

									<div class="row">

										<div class="col-md-3">
											<div class="form-group">
												<label class="control-label">Country </label>
												{{ Form::select('country_id',  $countryList, Input::old('country_id'), array('class' => 'form-control ','id'=>'country_id')) }}
											</div>
										</div>

										<div class="col-md-3">
											<div class="form-group">
												<label class="control-label">State </label>
												{{ Form::select('state_id',[''=>'-- Select State --'], Input::old('state_id'), array('class' => 'form-control ','id'=>'state_id')) }}
											</div>
										</div>

										<div class="col-md-3">
											<div class="form-group">
												<label class="control-label">City </label>
												{{ Form::select('city_id',[''=>'-- Select City --'], Input::old('city_id'), array('class' => 'form-control ','id'=>'city_id')) }}
											</div>
										</div>


									</div>



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
<script>
    $(document).ready(function(){
        <?php if(isset($editModeData->state_id)) { ?>
        default_state();
        default_city();
        <?php } ?>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#country_id').on('change', function(e){
            // console.log(e);
            var country_id = $("#country_id").val();
            //ajax
            $.get('ajax-state/' + country_id, function(data){
                //console.log(data);
                //$("#state_id").select2("val", "");
                $('#state_id').empty();
                $('#city_id').empty();
                $('#state_id').append('<option value ="">--Select State--</option>');
                $('#city_id').append('<option value ="">--Select City--</option>');
                $.each(data, function(index, subcatObj){

                    $('#state_id').append('<option value ="'+ subcatObj.id +'">'+subcatObj.name+'</option>');

                });
            });
        });

        $('#state_id').on('change', function(e){
            // console.log(e);
            var state_id = $("#state_id").val();
            //ajax
            $.get('ajax-city/' + state_id, function(data){
                //console.log(data);

                $('#city_id').empty();
                // $("#city_id").select2("val", "");
                $('#city_id').append('<option value ="">--Select City--</option>');
                $.each(data, function(index, subcatObj){

                    $('#city_id').append('<option value ="'+ subcatObj.id +'">'+subcatObj.name+'</option>');

                });
            });
        });


    });
</script>
<script>
    <?php if(isset($editModeData->state_id)) { ?>
    function default_state()
    {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        //When page load
        var country_id =$("#country_id").val();
        //ajax
        $.get('ajax-state/' + country_id, function(data){
            //console.log(data);
            //$("#state_id").select2("val", "");
            $('#state_id').empty();
            $('#city_id').empty();
            $('#state_id').append('<option value ="">--Select State--</option>');
            $('#city_id').append('<option value ="">--Select City--</option>');
            var  selectedId = '{{$editModeData->state_id}}';
            $.each(data, function(index, subcatObj){
                if(selectedId == subcatObj.id) {
                    $('#state_id').append('<option value ="' + subcatObj.id + '" selected>' + subcatObj.name + '</option>');
                }else{
                    $('#state_id').append('<option value ="' + subcatObj.id + '">' + subcatObj.name + '</option>');

                }

            });
        });

    }



    function default_city()
    {
        // console.log(e);
        var state_id = {{ $editModeData->state_id }};
        $.get('ajax-city/' + state_id, function(data){
            //console.log(data);

            $('#city_id').empty();
            // $("#city_id").select2("val", "");
            $('#city_id').append('<option value ="">--Select City--</option>');
            var  selectedId = '{{$editModeData->city_id}}';
            $.each(data, function(index, subcatObj){
                if(selectedId == subcatObj.id) {
                    $('#city_id').append('<option value ="' + subcatObj.id + '" selected>' + subcatObj.name + '</option>');
                }else{
                    $('#city_id').append('<option value ="' + subcatObj.id + '">' + subcatObj.name + '</option>');

                }


            });
        });

    }
    <?php } ?>

</script>
@endsection

