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
				<a href="{{route('sliders.create')}}" class="btn btn-info" type="submit">ADD SLIDER</a>
				<div class="card">
					<div class="card-header card-header-primary">
						<h4 class="card-title ">Simple Table</h4>
						<p class="card-category"> Here is a subtitle for this table</p>
					</div>
					<div class="card-body">
						<div class="responsive">
							<table id="example" class="table table-striped table-bordered" style="width:100%">
								<thead class=" text-primary">
									<th class="text-center">SI.</th>
									<th>Title</th>
									<th>Subtitle</th>
									<th>Image</th>
									<th>Action</th>
								</thead>
								<tbody>
										@php
											$i = 1;
										@endphp
									@foreach($sliders as $slider)
									<tr>
										<td class="text-center">{{$i++}}</td>
										<td>{{$slider->title}}</td>
										<td>{{$slider->subtitle}}</td>
										<td>{{$slider->image}}</td>
										<td>
											<a class="btn btn-info" href="{{ route('sliders.edit',$slider->id) }}">Edit</a>

											<a class="btn btn-info" href="{{ route('sliders.destroy', $slider->id) }}" 
											onclick="event.preventDefault();
                                         	document.getElementById('delete-form-{{$slider->id}}').submit();">Delete</a>

                                         	<form id="delete-form-{{$slider->id}}" action="{{ route('sliders.destroy', $slider->id) }}" method="POST" style="display: none;">
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