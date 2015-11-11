<div class="friends">
	@if (Auth::user()->hasFriendRequestPending($user))
		<p>Waiting for {{ $user->getNameOrUsername() }} to accept your request.</p>

	@elseif (Auth::user()->hasFriendRequestReceived($user))
		<a href="{{ route('friend.accept', ['username' =>$user->username]) }}" class="btn btn-primary">Accept Friend Request</a>
	@elseif (Auth::user()->isFriendsWith($user))
		<p>You and {{ $user->getNameOrUsername() }} are friends. </p>

		<form action="{{ route('friend.delete', ['username' => $user->username]) }}" method="post">
			<input type="submit" value="Delete friend" class="bt btn-primary">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
		</form>
	@elseif (Auth::user()->id !== $user->id)
		<a href="{{ route('friend.add', ['username' => $user->username]) }}" class="btn btn-primary">Add as Friend</a>		
	@endif	

	<h4>{{ $user->getFirstNameOrUsername() }}'s friends.</h4>

	@if(!$user->friends()->count())
		<p>{{ $user->getFirstNameOrUsername() }} has no friend's to display.</p>
	@else
		@foreach ($user->friends() as $user)
			@include('user/partials/userblock')
		@endforeach
	@endif			
</div>