<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="javascript:;">Stisla</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="javascript:;">St</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Starter</li>
            <li class="{{setSidebarActive(['admin.dashboard.index'])}}">
                <a class="nav-link" href="{{ route('admin.dashboard.index') }}"><i class="far fa-square"></i> <span>Dashboard</span>
                </a>
            </li>

            <li class="dropdown {{setSidebarActive(['admin.categories.*'])}}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Listings</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('admin.categories.index') }}">Categories</a></li>
                </ul>
            </li>

            <li class="dropdown {{setSidebarActive(['admin.hero.*'])}}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Sections</span></a>
                <ul class="dropdown-menu">
                    <li class="{{setSidebarActive(['admin.hero.index'])}}"><a class="nav-link" href="{{ route('admin.hero.index') }}">Hero</a></li>
                </ul>
            </li>
        </ul>
    </aside>
</div>
