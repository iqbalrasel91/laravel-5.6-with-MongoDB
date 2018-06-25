@extends('admin.master')
@section('content')
@section('title','Brand List')
<div class="container-fluid">
	<div class="row bg-title">
		<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
		   <ol class="breadcrumb">
				<li class="active breadcrumbColor"><a href="{{ url('dashboard') }}"><i class="fa fa-home"></i> Dashboard</a></li>
				<li>@yield('title')</li>
			</ol>
		</div>

			<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
				<a href="{{ route('brand.create') }}"  class="btn btn-success pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light">
					<i class="fa fa-plus-circle" aria-hidden="true"></i> Add Brand</a>
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
										<th>Category Name</th>
										<th>Brand Name</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									{!! $sl=null !!}
									@foreach($results AS $value)
										<tr class="{!! $value->id !!}">
											<td style="width: 100px;">{!! ++$sl !!}</td>
											<td>@if(isset($value->category)) @if($value->category->name !='') {!! $value->category->name !!} @endif @endif</td>
											<td>{!! $value->name !!}</td>
											<td style="width: 100px;">
													<a href="{!! route('brand.edit',$value->id) !!}"  class="btn btn-success btn-sm btnColor">
														<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
													</a>

													<a href="{!!route('brand.destroy',$value->id )!!}" class="delete btn btn-danger btn-sm deleteBtn btnColor"
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
