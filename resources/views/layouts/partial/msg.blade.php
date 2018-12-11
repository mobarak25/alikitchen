@if (Session('successfully'))
	<div class="alert alert-success">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<i class="material-icons">close</i>
		</button>
		<span>{{Session::get('successfully')}}</span>
	</div>
@endif

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

@if ($errors->any())
    <div class="alert alert-danger">
        <ul style="padding:0; margin:0; list-style: none;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif