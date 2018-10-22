<div class="left-side-bar">
	<div class="menu-block customscroll">
		<div class="sidebar-menu">
			<ul id="accordion-menu">
				<li>
					<a href="{!! route('admin-dashboard') !!}" class="dropdown-toggle no-arrow">
						<span class="fa fa-home"></span><span class="mtext">Dashboard</span>
					</a>
				</li>
				@if(Auth::user()->role == 'interviewer')
					<li>
						<a href="{!! route('users.edit', Auth::user()->id) !!}" class="dropdown-toggle no-arrow"><span class="fa fa-user"></span><span class="mtext">Personal Detail</span></a>
					</li>
					<!-- <li>
						<a href="{!! route('user.qualifications.index', Auth::user()->id) !!}" class="dropdown-toggle no-arrow"><span class="fa fa-graduation-cap"></span><span class="mtext">Qualification Detail</span></a>
					</li>
					<li>
						<a href="{!! route('user.experiences.index', Auth::user()->id) !!}" class="dropdown-toggle no-arrow"><span class="fa fa-star"></span><span class="mtext">Experience Detail</span></a>
					</li>
					<li>
						<a href="{!! route('user.references.index', Auth::user()->id) !!}" class="dropdown-toggle no-arrow"><span class="fa fa-clone"></span><span class="mtext">Reference Detail</span></a>
					</li> -->
				@elseif(Auth::user()->role == 'employee')
					<li>
						<a href="{!! route('questions.index') !!}" class="dropdown-toggle no-arrow"><span class="fa fa-question"></span><span class="mtext">Questions</span></a>
					</li>
					<li>
						<a href="{!! route('users.index') !!}" class="dropdown-toggle no-arrow"><span class="fa fa-users"></span><span class="mtext">Candidates</span></a>
					</li>
				@else
					<li>
						<a href="{!! route('departments.index') !!}" class="dropdown-toggle no-arrow"><span class="fa fa-building"></span><span class="mtext">Departments</span></a>
					</li>
					<li>
						<a href="{!! route('questions.index') !!}" class="dropdown-toggle no-arrow"><span class="fa fa-question"></span><span class="mtext">Questions</span></a>
					</li>
					<li>
						<a href="{!! route('users.index') !!}" class="dropdown-toggle no-arrow"><span class="fa fa-users"></span><span class="mtext">Candidates</span></a>
					</li>				
					<li>
						<a href="{!! route('employees.index') !!}" class="dropdown-toggle no-arrow"><span class="fa fa-user"></span><span class="mtext">Team Leads</span></a>
					</li>				
					<li>
						<a href="{!! route('generate') !!}" class="dropdown-toggle no-arrow"><span class="fa fa-users"></span><span class="mtext">Generate Ids</span></a>
					</li>
				@endif
			</ul>
		</div>
	</div>
</div>