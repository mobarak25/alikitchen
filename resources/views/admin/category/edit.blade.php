@extends('layouts.app')
@section('content')
<div class="content">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header card-header-primary">
						<h4 class="card-title ">Edit Category</h4>
					</div>
					<div class="card-body">
						<form action="{{route('category.update',$category->id)}}" enctype="multipart/form-data"  method="POST">
							 @csrf
							 @method('PUT')
							<div class="form-group">
								<label class="bmd-label-floating">Edit Name</label>
								<input type="text" name="name" class="form-control" value="{{$category->name}}">
							</div>
														
							<div class="form-group">
								<input type="submit" value="UPDATE CATEGORY" class="btn btn-primary">
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection


