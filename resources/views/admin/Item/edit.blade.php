@extends('layouts.app')
@section('content')
<div class="content">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header card-header-primary">
						<h4 class="card-title ">Edit Item</h4>
					</div>
					<div class="card-body">
						<form action="{{route('item.update',$item->id)}}" enctype="multipart/form-data"  method="POST">
							 @csrf
							 @method('PUT')
							 
							<div class="form-group">
								<label class="bmd-label-floating">Edit Name</label>
								<input type="text" name="name" class="form-control" value="{{$item->name}}">
							</div>
							 
							<div class="form-group">
								<label class="bmd-label-floating">Edit Category</label>
								<select name="category" class="form-control">
									@foreach ($categories as $category)
										<option value="{{$category->id}}" {{($category->id == $item->category_id)?'selected':''}}>{{ $category->name }}</option>
									@endforeach
								</select>
							</div>
							 
							<div class="form-group">
								<label class="bmd-label-floating">Edit Description</label>
								<textarea name="description" rows="5" class="form-control">{{$item->description}}</textarea>
							</div>
							 
							<div class="form-group">
								<label class="bmd-label-floating">Edit Price</label>
								<input type="text" name="price" class="form-control" value="{{$item->price}}">
							</div>
							 
							<div class="container-fluid">
								<div class="row">
									<div class="col-md-6">
										<input type="file" name="image">
									</div>
									<div class="col-md-6">
										<img src="{{ url($item->image) }}"alt="" width="70" style="border:2px solid #ddd; padding: 2px">
									</div>
								</div>
								
							</div>

							
														
							<div class="form-group">
								<input type="submit" value="UPDATE ITEM" class="btn btn-primary">
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection


