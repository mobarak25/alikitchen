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
				<div class="card">
					<div class="card-header card-header-primary">
						<h4 class="card-title ">Reservation Table</h4>
						<p class="card-category"> Here is all Reservation</p>
					</div>
					<div class="card-body">
						<div class="responsive">
							<table id="example" class="table table-striped table-bordered" style="width:100%">
								<thead class=" text-primary">
									<th>SI.</th>
									<th>Name</th>
									<th>Phone</th>
									<th>Email</th>
									<th>Message</th>
									<th>Time</th>
									<th>Status</th>
								</thead>
								<tbody>
									@php
										$i = 1;
									@endphp
									
									@foreach($reservations as $reservation)
									<tr>
										<td>{{$i++}}</td>
										<td>{{$reservation->name}}</td>
										<td>{{$reservation->phone}}</td>
										<td>{{$reservation->email}}</td>
										<td>{{$reservation->message}}</td>
										<td>{{$reservation->date_and_time}}</td>
										<td>
											@if ($reservation->status == 0)
												
											<a href="{{ route('reservation.status',$reservation->id) }}" class="badge badge-danger">Not Confirmed</a> 
											@else
											 <a" class="badge badge-success"> Confirmed</a>
											@endif		
											
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