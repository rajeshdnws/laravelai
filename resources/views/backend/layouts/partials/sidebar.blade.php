 <!-- sidebar menu area start -->
 @php
     $usr = Auth::guard('admin')->user();
 @endphp
 <div class="sidebar-menu">
    <div class="sidebar-header">
        <div class="logo">
            <a href="{{ route('admin.dashboard') }}">
                <h3 class="text-white">{{ config('app.name', 'Laravel') }}</h3> 
            </a>
        </div>
    </div>
    <div class="main-menu">
        <div class="menu-inner">
            <nav>
                <ul class="metismenu" id="menu">

                    @if ($usr->can('dashboard.view'))
                    <li class="active">
                        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-dashboard"></i><span>dashboard</span></a>
                        <ul class="collapse">
                            <li class="{{ Route::is('admin.dashboard') ? 'active' : '' }}"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        </ul>
                    </li>
                    @endif

                    @if ($usr->can('role.create') || $usr->can('role.view') ||  $usr->can('role.edit') ||  $usr->can('role.delete'))
                    <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-tasks"></i><span>
                            Roles & Permissions
                        </span></a>
                        <ul class="collapse {{ Route::is('admin.roles.create') || Route::is('admin.roles.index') || Route::is('admin.roles.edit') || Route::is('admin.roles.show') ? 'in' : '' }}">
                            @if ($usr->can('role.view'))
                                <li class="{{ Route::is('admin.roles.index')  || Route::is('admin.roles.edit') ? 'active' : '' }}"><a href="{{ route('admin.roles.index') }}">All Roles</a></li>
                            @endif
                            @if ($usr->can('role.create'))
                                <li class="{{ Route::is('admin.roles.create')  ? 'active' : '' }}"><a href="{{ route('admin.roles.create') }}">Create Role</a></li>
                            @endif
                        </ul>
                    </li>
                    @endif

                    
                    @if ($usr->can('admin.create') || $usr->can('admin.view') ||  $usr->can('admin.edit') ||  $usr->can('admin.delete'))
                    <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-user"></i><span>
                            Admins
                        </span></a>
                        <ul class="collapse {{ Route::is('admin.admins.create') || Route::is('admin.admins.index') || Route::is('admin.admins.edit') || Route::is('admin.admins.show') ? 'in' : '' }}">
                            
                            @if ($usr->can('admin.view'))
                                <li class="{{ Route::is('admin.admins.index')  || Route::is('admin.admins.edit') ? 'active' : '' }}"><a href="{{ route('admin.admins.index') }}">All Admins</a></li>
                            @endif

                            @if ($usr->can('admin.create'))
                                <li class="{{ Route::is('admin.admins.create')  ? 'active' : '' }}"><a href="{{ route('admin.admins.create') }}">Create Admin</a></li>
                            @endif
                        </ul>
                    </li>
                    @endif					
								
					
					 @if ($usr->can('company.create') || $usr->can('company.view') ||  $usr->can('company.edit') ||  $usr->can('company.delete'))
                    <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-user"></i><span>
                            Company
                        </span></a>
                        <ul class="collapse {{ Route::is('admin.company.create') || Route::is('admin.company.index') || Route::is('admin.company.edit') || Route::is('admin.company.show') ? 'in' : '' }}">
                            
                            @if ($usr->can('company.view'))
                                <li class="{{ Route::is('admin.company.index')  || Route::is('admin.company.edit') ? 'active' : '' }}"><a href="{{ route('admin.company.index') }}">All Company</a></li>
                            @endif

                            @if ($usr->can('company.create'))
                                <li class="{{ Route::is('admin.company.create')  ? 'active' : '' }}"><a href="{{ route('admin.company.create') }}">Create company</a></li>
                            @endif
                        </ul>
                    </li>
                    @endif
					
					 @if ($usr->can('employee.create') || $usr->can('employee.view') ||  $usr->can('employee.edit') ||  $usr->can('employee.delete'))
                    <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-user"></i><span>
                            employee
                        </span></a>
                        <ul class="collapse {{ Route::is('admin.employee.create') || Route::is('admin.employee.index') || Route::is('admin.employee.edit') || Route::is('admin.employee.show') ? 'in' : '' }}">
                            
                            @if ($usr->can('employee.view'))
                                <li class="{{ Route::is('admin.employee.index')  || Route::is('admin.employee.edit') ? 'active' : '' }}"><a href="{{ route('admin.employee.index') }}">All employee</a></li>
                            @endif

                            @if ($usr->can('company.create'))
                                <li class="{{ Route::is('admin.employee.create')  ? 'active' : '' }}"><a href="{{ route('admin.employee.create') }}">Create company</a></li>
                            @endif
                        </ul>
                    </li>
                    @endif

                </ul>
            </nav>
        </div>
    </div>
</div>
<!-- sidebar menu area end -->