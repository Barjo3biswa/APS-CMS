{{-- <nav class="navbar navbar-expand-lg nav-section topheaderBelowNav">
    <div class="container mobile-toggle-btn">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"><i class="fa fa-bars"></i></span>

        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mb-2 mb-lg-0 navbar_ul">
                @php
                    $menus = App\Models\Menu::where('status',1)->get();
                @endphp
                <li class="nav-item active">
                    <a class="nav-link active" aria-current="page" href="{{url('/')}}">Home</a>
                </li>
                @foreach ($menus as $menu)
                @if ($menu->sublink == 1)
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            {{$menu->name}}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            @php
                                $submenus = App\Models\SubMenu::where('menu_id',$menu->id)->get();
                            @endphp
                            @foreach ($submenus as $submenu)
                                @if ($menu->id == '2')
                                    <li><a class="dropdown-item"
                                            href="{{route('menu.subcategory',[Crypt::encrypt($menu->id),Crypt::encrypt($submenu->id)])}}">{{$submenu->name}}</a>
                                    </li>
                                @else
                                    <li><a class="dropdown-item"
                                            href="{{route('menu.content',[Crypt::encrypt($menu->id),Crypt::encrypt($submenu->id)])}}">{{$submenu->name}}</a>
                                    </li>
                                @endif

                            @endforeach
                        </ul>
                    </li>
                @else
                    <li class="nav-item">

                    </li>
                @endif
                @endforeach
            </ul>
        </div>
    </div>
</nav> --}}

@php
    $menus = App\Models\Menu::where('status', 1)->get();
@endphp
{{-- {{dd($menus)}} --}}
<a href="{{route('index')}}" class="navbar-brand d-flex align-items-center" style="gap: 24px;">
    <img src="./new-images/logo.png" alt="" width="50">
    <div class="aps-title">
        <h5 class="mb-0">ARMY PUBLIC SCHOOL</h5>
        <h6 style="color:#ff9e0e;">Narangi, Guwahati</h6>
    </div>
</a>
<button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
    <span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="navbarCollapse">
    <div class="navbar-nav ms-auto py-3 py-lg-0">
        <a href="{{route('index')}}" class="nav-item nav-link active">Home</a>
        <!-- <a href="about.html" class="nav-item nav-link">About Us</a> -->
        @foreach ($menus as $menues)
            <div class="nav-item dropdown">
                @if ($menues->sublink == 0)
                    <a class="nav-link" href="#" id="navbarDropdown" role="button">{{$menues->name}}</a>
                @else
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">{{$menues->name}}</a>
                @endif
                <div class="dropdown-menu bg-light1 m-0">
                    @foreach ($menues->sub_menu as $sub_men)
                        <a href="{{route('menu.content',[Crypt::encrypt($menues->id),Crypt::encrypt($sub_men->id)])}}" class="dropdown-item">{{$sub_men->name}}</a>
                    @endforeach
                </div>
            </div>
        @endforeach

        {{-- <div class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Administration</a>
            <div class="dropdown-menu bg-light1 m-0">
                <a href="#" class="dropdown-item">School Administration & Management Committee</a>
                <a href="#" class="dropdown-item">Teaching Fraternity</a>
            </div>
        </div> --}}

        <a href="{{route('gallery')}}" class="nav-item nav-link">Gallery</a>
    </div>
</div>
</nav>
<!-- Navbar End -->

