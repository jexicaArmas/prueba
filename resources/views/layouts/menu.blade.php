<!-- MENU SIDEBAR-->
<aside class="menu-sidebar d-none d-lg-block">
    <div class="logo">
        <a href="{{route('home')}}">
            <img src="{{asset('CoolAdmin/images/icon/logo.png')}}"/>
        </a>
    </div>
    <div class="menu-sidebar__content js-scrollbar1">
        <nav class="navbar-sidebar">
            <ul class="list-unstyled navbar__list">
                <li>
                    <a href="{{route('home')}}">
                        <i class="fa fa-home"></i>Dashboard</a>
                </li>
                <li class="has-sub">
                    <a href="{{route('companies.index')}}">
                        <i class="fa fa-list"></i>{{ __('Companies') }}</a>
                </li>
                <li>
                    <a href="{{route('employees.index')}}">
                        <i class="fa fa-users"></i>{{ __('Employees') }}</a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
<!-- END MENU SIDEBAR-->
