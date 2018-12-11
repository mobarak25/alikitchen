@extends('layouts.app')
@push('css')

@endpush
@section('content')
<div class="content">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				@include('layouts.partial.msg')
				<div class="card">
					<div class="card-header card-header-primary">
						<h4 class="card-title ">Add Category</h4>
					</div>
					<div class="card-body">
						<form action="{{route('category.store')}}" method="POST" enctype= multipart/form-data>
							@csrf
						
						<div class="form-group">
							<label class="bmd-label-floating">Category Name</label>
							<input type="text" name="name" class="form-control">
						</div>
						
						<div class="form-group">
							<button class="btn btn-primary" type="submit">ADD CATEGORY</button>
						</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@push('scripts')

@endpush
