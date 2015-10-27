@extends('templates.default') 

@section('content')
	<div class="row">
		<div class="col-lg-6">
			<h3>Your Friends</h3>

			@if(!$friends->count())
				<p>There are no friend's to display.</p>
			@else
				@foreach ($friends as $user)
					@include('user/partials/userblock')
				@endforeach
			@endif	
		</div>
		<div class="col-lg-6">
			<h3>Friend Request</h3>

			@if (!$requests->count())
				<p>There are no friend requests pending.</p>
			@else
				@foreach ($requests as $user)
					@include('user.partials.userblock')
				@endforeach	
			@endif	
		</div>
	</div>
@stop