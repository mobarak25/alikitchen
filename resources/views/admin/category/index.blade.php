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
				<a href="{{route('category.create')}}" class="btn btn-info" type="submit">Add Category</a>
				<div class="card">
					<div class="card-header card-header-primary">
						<h4 class="card-title ">Category Table</h4>
						<p class="card-category"> Here is all Category</p>
					</div>
					<div class="card-body">
						<div class="responsive">
							<table id="example" class="table table-striped table-bordered" style="width:100%">
								<thead class=" text-primary">
									<th>SI.</th>
									<th>Category Name</th>
									<th>Category Slug</th>
									<th>Action</th>
								</thead>
								<tbody>
									@foreach($categories as $category)
									<tr>
										<td>1</td>
										<td>{{$category->name}}</td>
										<td>{{$category->slug}}</td>
										<td>
											<a class="btn btn-info" href="{{ route('category.edit',$category->id) }}">Edit</a>

											<a class="btn btn-info" href="{{ route('category.destroy', $category->id) }}" 
											onclick="event.preventDefault();
                                         	document.getElementById('delete-form-{{$category->id}}').submit();">Delete</a>

                                         	<form id="delete-form-{{$category->id}}" action="{{ route('category.destroy', $category->id) }}" method="POST" style="display: none;">
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