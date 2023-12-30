<!--Start sidebar-wrapper-->
<div id="sidebar-wrapper" data-simplebar="" data-simplebar-auto-hide="true">
    <div class="brand-logo">
        <a href="{{ route('admin.dashboard') }}">
            <img src="{{ asset('assets/images') }}/favicon2.png" class="logo-icon" alt="logo icon">
            <h5 class="logo-text">Jannatul Faria</h5>
        </a>
    </div>
    <ul class="sidebar-menu do-nicescrol">
        <li class="sidebar-header">MAIN NAVIGATION</li>


        <li>
            <a href="{{ route('admin.dashboard') }}">
                <i class="zmdi zmdi-view-dashboard"></i> <span>Dashboard</span>
            </a>
        </li>
        {{-- <li>
            <a href="{{ route('admin.imageUplode') }}">
                <i class="zmdi zmdi-image"></i><span>images-uplode</span>
            </a>
        </li>
        <li>
            <a href="{{ route('admin.gallary') }}">
                <i class="zmdi zmdi-collection-folder-image"></i><span>Gallary</span>
            </a>
        </li> --}}

        <li>
            <a href="{{ route('admin.tasks') }}">
                <i class="zmdi zmdi-assignment-check"></i> <span>tasks</span>
            </a>
        </li>





        <li>
            <a href="{{ route('admin.forms') }}">
                <i class="zmdi zmdi-format-list-bulleted"></i> <span>Forms</span>
            </a>
        </li>

        <li>
            <a href="{{ route('admin.tables') }}">
                <i class="zmdi zmdi-grid"></i> <span>Tables</span>
            </a>
        </li>

        {{-- <li>
            <a href="{{ route('admin.calender') }}">
                <i class="zmdi zmdi-calendar"></i> <span>Calendar</span>
                <small class="badge float-right badge-light">New</small>
            </a>
        </li> --}}

        <li>
            <a href="{{ route('admin.profile') }}">
                <i class="zmdi zmdi-face"></i> <span>Profile</span>
            </a>
        </li>

        <li>
            <a href="{{ route('admin.login') }}" target="_blank">
                <i class="zmdi zmdi-lock"></i> <span>Login</span>
            </a>
        </li>

        <li>
            <a href="{{ route('admin.register') }}" target="_blank">
                <i class="zmdi zmdi-account-circle"></i> <span>Registration</span>
            </a>
        </li>

        <li class="sidebar-header">LABELS</li>
        <li><a href="javaScript:void();"><i class="zmdi zmdi-coffee text-danger"></i> <span>Important</span></a></li>
        <li><a href="javaScript:void();"><i class="zmdi zmdi-chart-donut text-success"></i> <span>Warning</span></a>
        </li>
        <li><a href="javaScript:void();"><i class="zmdi zmdi-share text-info"></i> <span>Information</span></a></li>

    </ul>

</div>
<!--End sidebar-wrapper-->
