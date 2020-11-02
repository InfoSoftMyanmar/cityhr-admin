<div id="left-sidebar" class="sidebar ">
	<h5 class="brand-name text-center">
		<img src="{{ asset('assets/images/icons/cityhr_logo_bg.png') }}" alt="City HR" width="50%">
		<a href="javascript:void(0)" class="menu_option float-right">
			<i class="icon-grid font-16" data-toggle="tooltip" data-placement="left" title="Grid & List Toggle"></i>
		</a>
	</h5>

	<nav id="left-sidebar-nav" class="sidebar-nav">
		<ul class="metismenu">
			<li class="g_heading">Menu</li>

			<li class="{{ request()->is('dashboard') ? 'active' : '' }}">
				<a href="{{ route('main.dashboard') }}">
					<i class="fa fa-dashboard"></i><span>Dashboard</span>
				</a>
			</li>

			<li class="{{ (request()->is('company') || request()->is('company/*')) ? 'active' : '' }}">
				<a href="{{ route('company.index') }}">
					<i class="fa fa-building"></i><span>Company Setup</span>
				</a>
			</li>

			<li class="{{ request()->is('user_setup') ? 'active' : '' }}">
				<a href="{{ route('main.dashboard') }}">
					<i class="fa fa-group"></i><span>User Setup</span>
				</a>
			</li>

			<li class="{{ request()->is('constants') ? 'active' : '' }}">
				<a href="{{ route('constants.index') }}">
					<i class="fa fa-gear"></i><span>Constants Data</span>
				</a>
			</li>

			<li class="{{ request()->is('company_setup') ? 'active' : '' }}">
				<a href="{{ route('main.dashboard') }}">
					<i class="fa fa-gear"></i><span>Company Setup</span>
				</a>
			</li>
		</ul>
	</nav>
</div>