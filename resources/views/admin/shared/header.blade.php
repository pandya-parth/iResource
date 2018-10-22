	<div class="pre-loader"></div>
	<div class="header clearfix">
		<div class="header-right">
			<div class="brand-logo">
				<a href="/admin"><img src="{!! asset('/images/iresource.png') !!}"></a>
			</div>
			<div class="menu-icon">
				<span></span>
				<span></span>
				<span></span>
				<span></span>
			</div>
			<div class="user-info-dropdown">
				<div class="dropdown">
					<a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
						<span class="user-icon"><i class="fa fa-user-o"></i></span>
						<span class="user-name">{!! Auth::user()->name !!}</span>
					</a>
					<div class="dropdown-menu dropdown-menu-right">
						<a class="dropdown-item" href="{!! route('get-change-pass') !!}"><i class="fa fa-key" aria-hidden="true"></i> Change Password</a>
						<a class="dropdown-item" href="{!! route('change-profile') !!}"><i class="fa fa-user" aria-hidden="true"></i> Change Profile</a>
						@if(Auth::user()->role == 'admin')
						<a class="dropdown-item" href="{!! route('site-settings-get') !!}"><i class="fa fa-cog" aria-hidden="true"></i> Site Settings</a>
						@endif
						<a class="dropdown-item" href="{!! route('logout') !!}" data-confirm="Are you sure want to logout?"><i class="fa fa-sign-out" aria-hidden="true"></i> Log Out</a>
					</div>
				</div>
			</div>
		</div>
	</div>