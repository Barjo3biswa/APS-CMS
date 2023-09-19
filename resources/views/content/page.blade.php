@extends('layout.app')
@section('content')
    {{-- <div class="container-fluid page-header py-5 mb-0 wow fadeIn" data-wow-delay="0.1s"
        style="visibility: visible; animation-delay: 0.1s; animation-name: fadeIn;">
        <div class="container position-relative text-center py-4" style="padding-top:7rem!important">
            <div style="position: absolute; bottom: 0; left: 12px; text-align: left;">
                <h4 class="display-6 text-white slideInDown mb-2">{{$content->sub_category->name??$content->menu->name}}</h4>
                <nav aria-label="breadcrumb animated slideInDown">
                    <ol class="breadcrumb justify-content-start mb-0">
                        <li class="breadcrumb-item">
                            <a class="text-white" href="#">Home</a>
                        </li>
                        <li class="breadcrumb-item text-primary active" aria-current="page">
                            {{$content->menu->name??null}}
                        </li>
                        <li class="breadcrumb-item text-primary active" aria-current="page">
                            <!-- {{$content->sub_category->name??"oookkkk"}} -->fgdfgdfgfdgfg
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div> --}}
    <div class="page-header1 py-0 mb-0 wow fadeIn" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeIn; position: relative;">
        <!-- Add a container for the image -->
        <div class="page-header-text position-relative text-center py-0">
            <!-- Image container with a layer -->
            <div class="image-container" style="position: relative;">
                <!-- Add a layer with a semi-transparent background color -->
                <div class="image-layer" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.4);"></div>
                <!-- Center the text content vertically and horizontally -->
                <div class="text-content" style="position: absolute; top: 50%; left: 7.6%; transform: translateY(-50%); color: white; text-align: left;">
                    <h4 class="display-6 text-white slideInDown mb-2">{{$content->sub_menu->name??null}}</h4>
                    <nav aria-label="breadcrumb animated slideInDown">
                        <ol class="breadcrumb justify-content-start mb-0">
                            <li class="breadcrumb-item">
                                <a class="text-white" href="#">Home</a>
                            </li>
                            <li class="breadcrumb-item text-primary active" aria-current="page">
                                {{$content->menu->name??null}}
                            </li>
                            <li class="breadcrumb-item text-primary active" aria-current="page">
                            {{$content->sub_menu->name??null}}
                            </li>
                            <li class="breadcrumb-item text-primary active" aria-current="page">
                                {{$content->sub_category->name??null}}
                            </li>
                        </ol>
                    </nav>
                </div>
                <img src="{{asset($content->banner_image)}}" alt="Banner Image">
            </div>
        </div>
    </div>


    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-{{$content->is_full_page==0?9:12}} wow fadeInUp" data-wow-delay="0.5s">
                    <div class="h-100">
                        <div class="title-heading-icon ps-0 mb-5">
                            <span><img src="{{asset('icons/history.png')}}" alt="" width="40"></span>
                            <div>
                                <!-- <h6 class="text-body text-uppercase mb-1">{{$content->menu->name??null}}</h6> -->
                                <h1 class="display-6 mb-0">
                                    Army Public School, Narangi
                                </h1>
                            </div>
                            {{-- <br/> --}}
                        </div>
                        @if ($content != null)
                            <p style="text-align:justify;">
                                {!!$content->content!!}
                            </p>

                        @else
                            <p class="mb-4" style="text-align:justify;">
                                PAGE UNDER CONSTRUCTION </p>
                        @endif
                    </div>
                </div>
                @if($content->is_full_page==0)
                <div class="col-md-3 col-sm-12">
                    <div class="right-sidebar">
                        <div class="title-sidebar" style="display: flex;gap:1px;align-items: center;margin-bottom: 1rem;">
                            <span><img src="./icons/history.png" alt="" width="30"></span>
                            <h5 class="mb-0">Quick Links</h5>
                        </div>
                        <ul class="sidebar-ul">
                            @foreach ($menu->sub_menu as $sub)
                                <li><a href="{{route('menu.content',[Crypt::encrypt($menu->id),Crypt::encrypt($sub->id)])}}" {{-- class="active" --}}>{{$sub->name}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="emagazine">
                        <h5 class="sub-heading display-7 mt-4 mb-4">Our Magazine <span style="color:#fd940c;">"TRIVENI"</span></h5>
                        <img src="https://image.isu.pub/201202023927-f9ea96f35612bd78d27c48ce309371c3/jpg/page_1.jpg" alt="" style="width:100%;">
                        <div class="subscribe-btn" style="position: relative;">
                            <a href="#" class="btn-shine" target="_blank">Subscribe Now</a>
                        </div>
                      </div>
                </div>
                @endif
            </div>
        </div>
    </div>
@endsection
