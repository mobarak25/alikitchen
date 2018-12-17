@extends('layouts.app')
@push('css')
<style>
	.dataTables_filter{ text-align: right; }
</style>
@endpush
@section('content')
<div class="content">
	
	<div class="container-fluid">
		@include('layouts.partial.msg')
		<div class="row">
			<div class="col-md-12">
				<a href="{{route('item.create')}}" class="btn btn-info" type="submit">Add Item</a>
				<div class="card">
					<div class="card-header card-header-primary">
						<h4 class="card-title ">Item Table</h4>
						<p class="card-category"> Here is all Item</p>
					</div>
					<div class="card-body">
						<div class="responsive">
							<table id="example" class="table table-striped table-bordered" style="width:100%">
								<thead class=" text-primary">
									<th>SI.</th>
									<th>Item Name</th>
									<th>Category</th>
									<th>Description</th>
									<th>Price</th>
									<th>Image</th>
									<th>Action</th>
								</thead>
								<tbody>
									@php
										$i = 1;
									@endphp
									
									@foreach($items as $item)
									<tr>
										<td>{{$i++}}</td>
										<td>{{$item->name}}</td>
										<td>{{$item->category->name}}</td>
										<td>{{$item->description}}</td>
										<td>{{$item->price}}$</td>
										<td><img src="{{ url($item->image) }}" alt="" width="50"></td>
										<td>
											<a class="btn btn-info" href="{{ route('item.edit',$item->id) }}">Edit</a>

											<a class="btn btn-danger" href="{{ route('item.destroy', $item->id) }}" 
											onclick="event.preventDefault();
                                         	document.getElementById('delete-form-{{$item->id}}').submit();">Delete</a>

                                         	<form id="delete-form-{{$item->id}}" action="{{ route('item.destroy', $item->id) }}" method="POST" style="display: none;">
					                            @csrf
					                            @method('DELETE')
					                        </form>
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

@push('scripts')
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script>
	$(document).ready(function() {
	    $('#example').DataTable();
	});
</script>
@endpush