<nav class="navbar navbar-expand navbar-light navbar-bg">
	<a class="sidebar-toggle d-flex">
        <i class="hamburger align-self-center"></i>
	</a>
	<div class="navbar-collapse collapse">
		<ul class="navbar-nav navbar-align">
			<li class="nav-item dropdown">
				<a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-toggle="dropdown">
					<i class="align-middle" data-feather="settings"></i>
				</a>
				<a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-toggle="dropdown">
				@if(Auth::user()->image)
					<img src="{{'/'.Auth::user()->image}}" class="avatar img-fluid rounded mr-1" alt="Charles Hall" /> 
				@else 
                    <img src="{{asset('frontend/images/avatar.jpeg')}}" class="avatar img-fluid rounded mr-1" alt="Charles Hall" >
                @endif
					<span class="text-dark">{{Auth::user()->nom}} {{Auth::user()->prenom}}</span>
				</a>
				<div class="dropdown-menu dropdown-menu-right animate slideIn" >
					<a class="dropdown-item" href="{{url('admin/'.Auth::user()->id.'/profile')}}"><i class="align-middle mr-1" data-feather="user"></i> Profile</a>
					<a class="dropdown-item" href="{{url('admin/statistique')}}"><i class="align-middle mr-1" data-feather="pie-chart"></i> Analytics</a>
					<div class="dropdown-divider"></div>
					<a class="dropdown-item" href="{{url('admin/'.Auth::user()->id.'/edit')}}"><i class="align-middle mr-1" data-feather="settings"></i> Settings & Privacy</a>
					<a class="dropdown-item" href="#"><i class="align-middle mr-1" data-feather="help-circle"></i> Help Center</a>
					<div class="dropdown-divider"></div>
					<a class="dropdown-item" href="{{url('admin/logout')}}">Log out</a>
				</div>
			</li>
		</ul>
	</div>
</nav>