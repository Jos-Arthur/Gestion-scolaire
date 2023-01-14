<!-- Sidebar -->
		<div class="sidebar">

			<div class="sidebar-background"></div>
			<div class="sidebar-wrapper scrollbar-inner">
				<div class="sidebar-content">
					<div class="user">
						<div class="avatar-sm float-left mr-2">
							<img src="{{asset('backend/img/profile.png')}}" alt="..." class="avatar-img rounded-circle">
						</div>						
					</div>

					<ul class="nav">
						<li class="nav-item active">
							<a href="{{route('dashboard.home')}}">
								<i class="fas fa-home"></i>
								<p>Dashboard</p>
								<!--span class="badge badge-count">5</span-->
							</a>
						</li>

						<li class="nav-section">
							<span class="sidebar-mini-icon">
								<i class="fa fa-ellipsis-h"></i>
							</span>
							<h4 class="text-section">Administration</h4>
						</li>
						<li class="nav-item">
							<a href="{{route('regions.index')}}">
								<i class="fas fa-layer-group"></i>
								<p>Regions</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{route('localites.index')}}">
								<i class="fas fa-layer-group"></i>
								<p>Localites</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{route('profils.index')}}">
								<i class="fas fa-layer-group"></i>
								<p>Profils</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{route('users.get')}}">
								<i class="fas fa-user"></i>
								<p>Utilisateurs</p>
							</a>
						</li>
						
						{{-- <li class="nav-item">
							<a href="{{route('papers.get')}}">
								<i class="fas fa-pen-square"></i>
								<p>Articles</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{route('conferences.get')}}">
								<i class="fas fa-link"></i>
								<p>Conferences</p>
							</a>
						</li> --}}
                    </ul>
				</div>
			</div>
		</div>
		<!-- End Sidebar -->
