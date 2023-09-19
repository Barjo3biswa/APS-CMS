<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{ asset('new-images/logo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <img src="." alt="">
        <span class="brand-text font-weight-light"><b>APS-Narengi</b></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ auth()->user()->name }}</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        {{-- <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div> --}}

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item menu-open">
                    <a href="{{ route('home') }}" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.menu.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Menu
                        </p>
                    </a>
                </li>

                @php
                    $menus = DB::table('menus')
                        ->where('status', 1)
                        ->get();
                @endphp
                @foreach ($menus as $menu)
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-circle"></i>
                            <p>
                                {{ $menu->name }}
                                <i class="right fas fa-angle-left"></i>

                            </p>
                        </a>
                        @if ($menu->slug == 'tenders')
                            <ul class="nav nav-treeview submenu">
                                <li class="nav-item">
                                    <a href="{{ route('admin.tender.create') }}" class="nav-link">
                                        <i class="fa fa-bars"></i>
                                        <p>Add Tenders</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.tender.index') }}" class="nav-link">
                                        <i class="fa fa-bars"></i>
                                        <p>View </p>
                                    </a>
                                </li>
                            </ul>
                        @endif
                        @if ($menu->sublink == 1)
                            <ul class="nav nav-treeview submenu">
                                <li class="nav-item">
                                    <a href="{{ route('admin.menu.addcontent', Crypt::encrypt($menu->id)) }}"
                                        class="nav-link">
                                        <i class="fa fa-bars"></i>
                                        <p>Add Content</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.submenu.addcategory', Crypt::encrypt($menu->id)) }}"
                                        class="nav-link">
                                        <i class="fa fa-bars"></i>
                                        <p>Add Category</p>
                                    </a>
                                </li>

                                @php
                                    $submenus = DB::table('sub_menus')
                                        ->where('menu_id', $menu->id)
                                        ->where('status', 1)
                                        ->get();
                                @endphp
                                @foreach ($submenus as $submenu)
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            <i class="fa fa-bars"></i>
                                            <p>
                                                {{ $submenu->name }}
                                                <i class="right fas fa-angle-left"></i>
                                            </p>
                                        </a>
                                        <ul class="nav nav-treeview submenu">
                                            <li class="nav-item">
                                                <a href="{{ route('admin.submenu-content', Crypt::encrypt($submenu->id)) }}"
                                                    class="nav-link">
                                                    <i class="fa fa-bars nav-icon"></i>
                                                    <p>Add Content</p>
                                                </a>
                                            </li>
                                            @if ($submenu->menu_id == 2)
                                                <li class="nav-item">
                                                    <a href="{{ route('admin.sub-category', Crypt::encrypt($submenu->id)) }}"
                                                        class="nav-link">
                                                        <i class="fa fa-bars nav-icon"></i>
                                                        <p>Add Departments</p>
                                                    </a>
                                                </li>
                                            @endif
                                            @php
                                                $sub_category = DB::table('sub_categories')
                                                    ->where('submenu_id', $submenu->id)
                                                    ->get();
                                            @endphp
                                            @foreach ($sub_category as $subcategory)
                                                <li class="nav-item">
                                                    <a href="#" class="nav-link">
                                                        <i class="fa fa-bars nav-icon"></i>
                                                        <p>{{ $subcategory->title }}
                                                            <i class="right fas fa-angle-left"></i>
                                                        </p>
                                                    </a>
                                                    <ul class="nav nav-treeview submenu">

                                                        <li class="nav-item">
                                                            <a href="{{ route('admin.add.subcategory.content', [Crypt::encrypt($subcategory->id), Crypt::encrypt($submenu->id)]) }}"
                                                                class="nav-link">
                                                                <i class="fa fa-bars nav-icon"></i>
                                                                <p>Add Content</p>
                                                            </a>
                                                        </li>
                                                        @php
                                                            $dept_menu = App\Models\DepartmentMenu::where('status', 1)->get();
                                                        @endphp

                                                        @foreach ($dept_menu as $menu)
                                                            <li class="nav-item">
                                                                <a href="{{ route('admin.view.subcategory.content', [Crypt::encrypt($submenu->id), Crypt::encrypt($subcategory->id), Crypt::encrypt($menu->id)]) }}"
                                                                    class="nav-link">
                                                                    <i class="fa fa-bars nav-icon"></i>
                                                                    <p>{{ $menu->name }}</p>
                                                                </a>
                                                            </li>
                                                        @endforeach

                                                    </ul>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                @endforeach
                            </ul>
                        @endif

                    </li>
                @endforeach

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>
                            Notifications
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.notification.create') }}" class="nav-link">
                                <i class="fa fa-bars nav-icon"></i>
                                <p>Add </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.notification.index') }}" class="nav-link">
                                <i class="fa fa-bars nav-icon"></i>
                                <p>View</p>
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>
                            Home Slider Images
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.slider.create') }}" class="nav-link">
                                <i class="fa fa-bars nav-icon"></i>
                                <p>Add / View</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>
                            Gallery Image
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.gallery.create') }}" class="nav-link">
                                <i class="fa fa-bars nav-icon"></i>
                                <p>Add / View</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>
                            Academic Achievers
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.academic.create') }}" class="nav-link">
                                <i class="fa fa-bars nav-icon"></i>
                                <p>Add / View</p>
                            </a>
                        </li>
                    </ul>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
