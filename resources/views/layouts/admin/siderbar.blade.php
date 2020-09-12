<nav id="sidebar" class="sidebar">
	<div class="sidebar-content js-simplebar">
		<a class="sidebar-brand text-center" href="{{url('admin/statistique')}}">
			<span class="align-middle animation">Covid-19</span>
		</a>
		<ul class="sidebar-nav">
			<li class="sidebar-header">
				Pages
			</li>
			<li class="sidebar-item @yield('active1')">
				<a class="sidebar-link" href="{{url('admin/statistique')}}">
					<i class="align-middle" data-feather="bar-chart-2"></i> <span class="align-middle">Statistique</span>
				</a>
			</li>
			<li class="sidebar-item @yield('active2')">
				<a class="sidebar-link" href="{{url('admin/info')}}">
					<i class="align-middle mr-2" data-feather="grid"></i> <span class="align-middle">Information</span>
				</a>
			</li>
			<li class="sidebar-item">
				<a href="#ui" data-toggle="collapse" class="sidebar-link collapsed">
					<i class="align-middle" data-feather="list"></i> <span class="align-middle">Idée</span>
				</a>
				<ul id="ui" class="sidebar-dropdown list-unstyled collapse " data-parent="#sidebar">
					<li class="sidebar-item @yield('active8')"><a class="sidebar-link" href="{{url('admin/categories')}}">Catégorie</a></li>
					<li class="sidebar-item @yield('active3')"><a class="sidebar-link" href="{{url('admin/idées')}}">Idée</a></li>
				</ul>
			</li>
			<li class="sidebar-item @yield('active4')">
				<a class="sidebar-link" href="{{url('admin/signals')}}">
					<i class="align-middle mr-2" data-feather="grid"></i> <span class="align-middle">Signal</span>
				</a>
			</li>
			<li class="sidebar-item @yield('active5')">
				<a class="sidebar-link" href="{{url('admin/chiffres')}}">
					<i class="align-middle mr-2" data-feather="grid"></i> <span class="align-middle">Chiffre</span>
				</a>
			</li>
			<li class="sidebar-item @yield('active10')">
				<a class="sidebar-link" href="{{url('admin/Admins')}}">
					<i class="align-middle mr-2" data-feather="grid"></i> <span class="align-middle">Administrateur</span>
				</a>
			</li>
			<li class="sidebar-item @yield('active7')">
				<a class="sidebar-link" href="{{url('admin/utilisateurs')}}">
					<i class="align-middle mr-2" data-feather="grid"></i> <span class="align-middle">Utilisateur</span>
				</a>
			</li>
			<li class="sidebar-item">
				<a href="#forms" data-toggle="collapse" class="sidebar-link collapsed">
					<i class="align-middle" data-feather="list"></i><span class="align-middle">Autre Page</span>
				</a>
				<ul id="forms" class="sidebar-dropdown list-unstyled collapse " data-parent="#sidebar">
					<li class="sidebar-item @yield('active6')"><a class="sidebar-link" href="{{url('admin/wilayas')}}">Wilaya</a></li>
					<li class="sidebar-item @yield('active9')"><a class="sidebar-link" href="{{url('admin/communes')}}">Commune</a></li>
					<li class="sidebar-item"><a class="sidebar-link" href="forms-basic-inputs.html">Maladie</a></li>
					<li class="sidebar-item"><a class="sidebar-link" href="forms-basic-inputs.html">Profession</a></li>
					<li class="sidebar-item"><a class="sidebar-link" href="forms-basic-inputs.html">Source</a></li>
				</ul>
			</li>
		</ul>
	</div>
</nav>



