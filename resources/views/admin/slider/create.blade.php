@extends('layouts.app')
@push('css')

@endpush
@section('content')
<div class="content">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header card-header-primary">
						<h4 class="card-title ">Simple Table</h4>
						<p class="card-category"> Here is a subtitle for this table</p>
					</div>
					<div class="card-body">
						<form action="{{route('slider.store')}}" method="POST" enctype= multipart/form-data>
							@csrf
						
						<div class="form-group">
							<label class="bmd-label-floating">Title</label>
							<input type="text" name="title" class="form-control">
						</div>
						<div class="form-group">
							<label class="bmd-label-floating">subtitle</label>
							<input type="text" name="subtitle" class="form-control">
						</div>
						<input type="file" name="image">
						<div class="form-group">
							<button class="btn btn-primary" type="submit">ADD SLIDER</button>
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
