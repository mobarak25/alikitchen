@extends('layouts.app')
@section('content')
<div class="content">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header card-header-primary">
						<h4 class="card-title ">Edit Slider</h4>
					</div>
					<div class="card-body">
						<form action="{{url('sliders.update',$slider->id)}}" @method('PUT')>
							 @csrf
							 
							<div class="form-group">
								<label class="bmd-label-floating">Title</label>
								<input type="text" name="title" class="form-control" value="{{$slider->title}}">
							</div>
							<div class="form-group">
								<label class="bmd-label-floating">subtitle</label>
								<input type="text" name="subtitle" class="form-control" value="{{$slider->subtitle}}">
							</div>
							<div>
								<input type="file" name="image">
							</div>							
							<div class="form-group">
								<input type="submit" value="Edit SLIDER">
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection


