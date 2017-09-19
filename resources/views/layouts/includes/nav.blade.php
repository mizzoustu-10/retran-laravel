<nav class="navbar navbar-toggleable-md navbar-inverse bg-inverse">
	<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	<a class="navbar-brand" href="/">RETRAN 2.0</a>
	@if(Auth::check())
		<div class="collapse navbar-collapse" id="navbarsExampleDefault">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item {{Request::is('/') ? 'active' : ''}}">
					<a class="nav-link" href="/">Fetch-It</a>
				</li>
				<li class="nav-item {{Request::is('batch') ? 'active' : ''}}">
					<a class="nav-link" href="/batch">Batch Search</a>
				</li>
				<li class="nav-item {{Request::is('newestRecords') ? 'active' : ''}}">
					<a class="nav-link" href="#">Newest Records</a>
				</li>
			</ul>
			<a class="nav-link" href="/account/{{Auth::id()}}">My Account</a>
			<a class="nav-link" href="/logout">Logout</a>
		</div>
	@endif
	@if(!Auth::check())
		<div class="collapse navbar-collapse" id="navbarsExampleDefault">
			<a class="nav-link ml-auto" href="/">Login</a>
		</div>
	@endif
</nav>