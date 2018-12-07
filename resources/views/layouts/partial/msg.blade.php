

@if (Session('successMsg'))
	<div class="alert alert-success">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<i class="material-icons">close</i>
		</button>
		<span>{{Session::get('successMsg')}}</span>
	</div>
@endif

@if (Session('deleteMsg'))
	<div class="alert alert-success">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<i class="material-icons">close</i>
		</button>
		<span>{{Session::get('deleteMsg')}}</span>
	</div>
@endif