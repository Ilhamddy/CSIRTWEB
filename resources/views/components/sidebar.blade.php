<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">Diskominfo</a>
        </div>r
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">DK</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            {{-- <li class="nav-item dropdown ">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Dashboard</span></a>
                <ul class="dropdown-menu">
                    <li class='{{ Request::is('dashboard-general-dashboard') ? 'active' : '' }}'>
                        <a class="nav-link" href="{{ route('home') }}">General Dashboard</a>
                    </li>
                </ul>
            </li> --}}
            <li class="{{ Request::is('admin/home*') ? 'active' : '' }}">
                <a class="#" href="{{ route('home') }}"><i class="fas fa-fire"></i> <span>Dashboard</span></a>
            </li>
            <li class="menu-header ">Posts</li>
            {{-- <li class="nav-item dropdown ">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-list"></i><span>Categories</span></a>
                <ul class="dropdown-menu">
                    <li>
                        <a class="nav-link" href="{{ route('category.index') }}">All Categories</a>
                    </li>
                </ul>
            </li> --}}
            <li class="{{ Request::is('admin/category*') ? 'active' : '' }}">
                <a href="{{ route('category.index') }}"><i class="fas fa-list"></i>
                    <span>Categories</span></a>
            </li>
            <li class="{{ Request::is('admin/posts*') ? 'active' : '' }}">
                <a href="{{ route('posts.index') }}"><i class="fas fa-check"></i>
                    <span>Posts</span></a>
            </li>
            <li class="nav-item dropdown {{ Request::is('admin/gallery/*') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown"><i
                        class="fas fa-photo-film"></i><span>Gallery</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('admin/gallery/foto*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('foto.index') }}">Foto</a>
                    </li>
                    <li class="{{ Request::is('admin/gallery/video*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('video.index') }}">Video</a>
                    </li>
                </ul>
            </li>
            <li class="{{ Request::is('admin/layanan*') ? 'active' : '' }}">
                <a href="{{ route('layanan.index') }}"><i class="fab fa-wpforms"></i>
                    <span>Layanan</span></a>
            </li>
            <li class="nav-item dropdown {{ Request::is('admin/project/*') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown"><i
                        class="fas fa-photo-film"></i><span>Project</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('admin/project/foto/*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('foto.index') }}">Menara Telekomunikasi</a>
                    </li>
                    <li class="{{ Request::is('admin/project/video/*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('video.index') }}">CCTV</a>
                    </li>
                    <li class="{{ Request::is('admin/project/video/*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('video.index') }}">Blankspot</a>
                    </li>
                </ul>
            </li>
            <li class="{{ Request::is('admin/slider*') ? 'active' : '' }}">
                <a class="#" href="{{ route('slider.index') }}"><i class="fas fa-sliders"></i>
                    <span>Slider</span></a>
            </li>
            <li class="{{ Request::is('admin/agenda*') ? 'active' : '' }}">
                <a class="#" href="{{ route('agenda.index') }}"><i class="fas fa-calendar"></i>
                    <span>Agenda</span></a>
            </li>
            <li class="menu-header">Master</li>
            <li class="nav-item dropdown {{ Request::is('admin/pengaturan*') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown "><i
                        class="fas fa-photo-film"></i><span>Pengaturan</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('admin/pengaturan/profile*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('profile.index') }}">Profile</a>
                    </li>
                    <li class="{{ Request::is('admin/pengaturan/contact*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('contact.index') }}">Kontak</a>
                    </li>
                    {{-- <li>
                        <a class="nav-link" href="{{ route('video.index') }}">Tentang Kami</a>
                    </li> --}}
                </ul>
            </li>
            <li class="nav-item dropdown ">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-user"></i><span>Users</span></a>
                <ul class="dropdown-menu">
                    <li>
                        <a class="nav-link" href="{{ route('user.index') }}">All Users</a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{ route('user.index') }}">Roles</a>
                    </li>
                </ul>
            </li>
            <li class="{{ Request::is('admin/monitor*') ? 'active' : '' }}">
                <a class="" href="{{ route('monitor.index') }}"><i class="fas fa-computer"></i>
                    <span>Monitor</span></a>
            </li>
            {{-- <li class="nav-item dropdown ">
                <a href="#" class="nav-link has-dropdown"><i
                        class="fa fa-cart-shopping"></i><span>Orders</span></a>
                <ul class="dropdown-menu">
                    <li>
                        <a class="nav-link" href="{{ route('order.index') }}">All Orders</a>
                    </li>
                </ul>
            </li> --}}
        </ul>
    </aside>
</div>
