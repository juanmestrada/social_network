<nav class="navbar navbar-default" role="navigation">
	<div class="nav-container">
		<div class="navbar-header">
			<a class="navbar-brand" href="{{ route('home') }}">Social</a>
		</div>
		<div class="collapse navbar-collapse">
			<!-- @if (Auth::check()) -->
				<ul class="nav navbar-nav">
					<li><a href="{{ route('home') }}" class="nav-link">Timeline</a></li>
					<li><a href="{{ route('friend.index') }}" class="nav-link">Friends</a></li>
				</ul>
				<form class="navbar-form navbar-left" role="search" action="{{ route('search.results') }}">
					<div class="form-group">
						<input type="text" name="query" class="form-control" placeholder="Find People">
					</div>
					<button type="submit" class="btn btn-default">Search</button>
				</form>
			<!--@endif -->
			<ul class="nav navbar-nav navbar-right">
				@if (Auth::check())
					<li><a href="{{ route('profile.index', ['username' => Auth::user()->username]) }}">{{ Auth::user()->getNameOrUsername() }}</a></li>
					<li><a href="{{ route('profile.edit') }}" class="nav-link">Update Profile</a></li>
					<li><a href="{{ route('auth.signout') }}" class="nav-link">Sign Out</a></li>
				@else
					<li><a href="{{ route('auth.signup') }}" class="nav-link">Sign Up</a></li>
					<li><a href="{{ route('auth.signin') }}" class="nav-link">Sign In</a></li>
				@endif	
			</ul>	
		</div>	
	</div>
</nav>	