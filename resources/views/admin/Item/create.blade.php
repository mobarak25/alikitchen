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
						<h4 class="card-title ">Add Iteam</h4>
					</div>
					<div class="card-body">
						<form action="{{route('item.store')}}" method="POST" enctype= multipart/form-data>
							@csrf
						
						<div class="form-group">
							<label class="bmd-label-floating">Item Name</label>
							<input type="text" name="name" class="form-control">
						</div>
						
						<div class="form-group">
							<label class="bmd-label-floating">Item Category</label>
							<select class="form-control" name="category">
								@foreach ($categories as $category)
									<option value="{{ $category->id }}">{{ $category->name }}</option>
								@endforeach
							</select>
						</div>
						
						<div class="form-group">
							<label class="bmd-label-floating">Item Desctiption</label>
							<textarea name="description" class="form-control" rows="5"></textarea>
						</div>
						
						<div class="form-group">
							<label class="bmd-label-floating">Item Price</label>
							<input type="number" name="price" class="form-control">
						</div>
						
						<div class="container-fluid">
							<input type="file" name="image">
						</div>
						
						<div class="form-group">
							<button class="btn btn-primary" type="submit">ADD ITEM</button>
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
