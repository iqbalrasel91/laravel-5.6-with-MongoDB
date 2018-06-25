@extends('admin.master')
@section('content')
@section('title','Item Price List')
<div class="container-fluid">
	<div class="row bg-title">
		<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
		   <ol class="breadcrumb">
				<li class="active breadcrumbColor"><a href="{{ url('dashboard') }}"><i class="fa fa-home"></i> Dashboard</a></li>
				<li>@yield('title')</li>
			</ol>
		</div>

			<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
				<a href="{{ route('price.create') }}"  class="btn btn-success pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light"> <i class="fa fa-plus-circle" aria-hidden="true"></i> Add Item Price</a>
			</div>

	</div>
                
	<div class="row">
		<div class="col-sm-12">
			<div class="panel panel-info">
				<div class="panel-heading"><i class="mdi mdi-table fa-fw"></i> @yield('title')</div>
				<div class="panel-wrapper collapse in" aria-expanded="true">
					<div class="panel-body">
						<div class="table-responsive">
							<table id="myTable" class="table table-bordered">
								<thead class="tr_header">
									<tr>
										<th>S/L</th>
										<th> Image</th>
										<th> Name</th>
										<th>Amount</th>
										<th>Market</th>
										<th>Price Type</th>
										<th>UOM</th>
										<th>Currency</th>
										<th>Country</th>
										<th>State</th>
										<th>City</th>
										<th>Item By</th>
										<th>Entry By</th>
										<th>Entry Date</th>
										<th>Updated By</th>
										<th>Updated Date</th>

										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									{!! $sl = null !!}
									@foreach($results AS $value)
										<tr class="{!! $value->id !!}">
											<td style="width: 100px;">{!! ++$sl !!}</td>
											<td>
												@if(file_exists('uploads/itemimg/'.$value->item['item_image']))
													<img src="{{asset('uploads/itemimg/'.$value->item['item_image'])}}" style="width: 100px;height: 86px;">
												@else
													<img src="{{asset('admin_assets/img/default.png')}}">
												@endif
											</td>
											<td>{!! $value->item['name'] !!}</td>
											<td>{!! $value->amount !!}</td>
											<td>{!! $value->market['name'] !!}</td>

											<td>@if(isset($value->item)) @if($value->price_type['type'] !='') {!! $value->price_type['type'] !!} @endif @endif</td>
											<td>@if(isset($value->uom)) @if($value->uom['name'] !='') {!! $value->uom['name'] !!} @endif @endif</td>
											<td>{!! $value->currency !!}</td>
											<td>{!! $value->country['name'] !!}</td>
											<td>{!! $value->state['name'] !!}</td>
											<td>{!! $value->city['name'] !!}</td>
											<td>{!! $value->item_user_by['full_name'] !!}</td>
											<td>{!! $value->entry_by['full_name'] !!}</td>
											<td>{!! $value->created_at !!}</td>

											<td>{!! $value->update_by['full_name'] !!}</td>
											<td>{!! $value->updated_at !!}</td>


											<td style="width: 100px;">
												<a href="{!! route('price.edit',$value->id) !!}"  class="btn btn-success btn-sm btnColor">
													<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
												</a>
												<a href="{!!route('price.destroy',$value->id )!!}" class="delete btn btn-danger btn-sm deleteBtn btnColor"
												   data-token="{!! csrf_token() !!}" data-id="{!! $value->id !!}"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
											</td>
										</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
