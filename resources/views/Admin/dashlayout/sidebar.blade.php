<div id="sidebar-menu">
    <ul>
        <li class="menu-title">Main</li>

        <li>
            <a href="{{ route('dashboard.index') }}" class="waves-effect">
                <i class="dripicons-home"></i>
                <span> Dashboard </span>
                {{-- <span class="badge badge-success badge-pill float-right">3</span> --}}
            </a>
        </li>
        <li>
            <a href="{{ route('user.index') }}" class="waves-effect"><i class="fa fa-user"></i><span> Users by yagra</span></a>
        </li>
        <li>
            <a href="{{ route('user2.index') }}" class="waves-effect"><i class="fa fa-user"></i><span> Users crud</span></a>
        </li>

        <li class="has_sub">
            <a href="javascript:void(0);" class="waves-effect"><i class="dripicons-briefcase"></i> <span> Elements </span> <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span></a>
            <ul class="list-unstyled">
                <li><a href="ui-alerts.html">Alerts</a></li>

            </ul>
        </li>

    </ul>
</div>
