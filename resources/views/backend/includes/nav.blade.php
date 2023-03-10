<div class="main-header" data-background-color="purple">
	<!-- Logo Header -->
	<div class="logo-header">

		<a href="index.html" class="logo">
			<img src="{{asset('admin/assets/img/logo.png')}}" alt="Administration" class="navbar-brand" width="100" height="60">
		</a>
		<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon">
				<i class="fa fa-bars"></i>
			</span>
		</button>
		<button class="topbar-toggler more"><i class="fa fa-ellipsis-v"></i></button>
		<div class="navbar-minimize">
			<button class="btn btn-minimize btn-rounded">
				<i class="fa fa-bars"></i>
			</button>
		</div>
	</div>
	<!-- End Logo Header -->

	<!-- Navbar Header -->
	<nav class="navbar navbar-header navbar-expand-lg">
		<div class="container-fluid">
			<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
				<li class="nav-item toggle-nav-search hidden-caret">
					<a class="nav-link" data-toggle="collapse" href="#search-nav" role="button" aria-expanded="false" aria-controls="search-nav">
						<i class="fa fa-search"></i>
					</a>
				</li>
			
				<li class="nav-item dropdown hidden-caret">
					<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
						<div class="avatar-sm">
							<img src="{{asset('admin/assets/img/profile.png')}}" alt="..." class="avatar-img rounded-circle">
						</div>
					</a>
					<ul class="dropdown-menu dropdown-user animated fadeIn">
						<li>
							<div class="user-box">
								<div class="avatar-lg"><img src="{{asset('admin/assets/img/profile.png')}}" alt="image profile" class="avatar-img rounded"></div>
								<div class="u-text">
									<h4>{{Auth::user()->nom}}</h4>
									<h5 class="text-muted">{{Auth::user()->prenom}}</h5><a href="#" class="btn btn-rounded btn-danger btn-sm">Mon profil</a>
								</div>
							</div>
						</li>
						<li>
							<div class="dropdown-divider"></div>				
							<div class="dropdown-divider"></div>
							<a onclick="deconnexion();" class="dropdown-item" href="#">Deconnexion</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
						</li>
					</ul>
				</li>

			</ul>
		</div>
	</nav>
	<!-- End Navbar -->
</div>
