@extends('layout.app')
@section('content')
    @php
        $gallery = App\Models\Gallery::whereRaw('FIND_IN_SET(?, display_in)', [$submenu_id])->orderby('id','DESC')->get();
    @endphp
    <div class="page-header1 py-0 mb-0 wow fadeIn" data-wow-delay="0.1s"
        style="visibility: visible; animation-delay: 0.1s; animation-name: fadeIn; position: relative;">
        <div class="page-header-text position-relative text-center py-0">
            <div class="image-container" style="position: relative;">
                <div class="image-layer"
                    style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.4);">
                </div>
                <div class="text-content"
                    style="position: absolute; top: 50%; left: 7.6%; transform: translateY(-50%); color: white; text-align: left;">
                    <h4 class="display-6 text-white slideInDown mb-2">{{ $content->sub_menu->name ?? null }}</h4>
                    <nav aria-label="breadcrumb animated slideInDown">
                        <ol class="breadcrumb justify-content-start mb-0">
                            <li class="breadcrumb-item">
                                <a class="text-white" href="#">Home</a>
                            </li>
                            <li class="breadcrumb-item text-primary active" aria-current="page">
                                {{ $content->menu->name ?? null }}
                            </li>
                            <li class="breadcrumb-item text-primary active" aria-current="page">
                                {{ $content->sub_menu->name ?? null }}
                            </li>
                            <li class="breadcrumb-item text-primary active" aria-current="page">
                                {{ $content->sub_category->name ?? null }}
                            </li>
                        </ol>
                    </nav>
                </div>
                <img src="{{ asset($content->banner_image ?? 'new-images/slider4.jpg') }}" alt="Banner Image">
            </div>
        </div>
    </div>


    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                @if ($content != null)
                    <div class="col-lg-{{ $content->is_full_page == 0 ? 9 : 12 }} wow fadeInUp" data-wow-delay="0.5s">
                    @else
                        <div class="col-lg-12 wow fadeInUp" data-wow-delay="0.5s">
                @endif
                <div class="h-100">
                    <div class="title-heading-icon ps-0 mb-5">
                        <span><img src="{{ asset('icons/history.png') }}" alt="" width="40"></span>
                        <div>
                            <h1 class="display-6 mb-0">
                                Army Public School, Narangi
                            </h1>
                        </div>
                    </div>
                    @if ($content != null)
                        <p style="text-align:justify;">
                            {!! $content->content !!}
                        </p>
                    @else
                        @if ($gallery == null)
                            <p class="mb-4" style="text-align:justify;">
                                PAGE UNDER CONSTRUCTION </p>
                        @endif
                    @endif
                    <div class="col-md-12">
                        @foreach ($gallery as $gal)
                            <div class="col-md-3">
                                <img src="{{ asset($gal->file) }}" alt="" width="100%" height="100%">
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            @if ($content = null && $content->is_full_page == 0)
                <div class="col-md-3 col-sm-12">
                    <div class="right-sidebar">
                        <div class="title-sidebar" style="display: flex;gap:1px;align-items: center;margin-bottom: 1rem;">
                            <span><img src="./icons/history.png" alt="" width="30"></span>
                            <h5 class="mb-0">Quick Links</h5>
                        </div>
                        <ul class="sidebar-ul">
                            @foreach ($menu->sub_menu as $sub)
                                <li><a href="{{ route('menu.content', [Crypt::encrypt($menu->id), Crypt::encrypt($sub->id)]) }}"
                                        {{-- class="active" --}}>{{ $sub->name }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="emagazine">
                        <h5 class="sub-heading display-7 mt-4 mb-4">Our Magazine <span
                                style="color:#fd940c;">"TRIVENI"</span></h5>
                        <img src="https://image.isu.pub/201202023927-f9ea96f35612bd78d27c48ce309371c3/jpg/page_1.jpg"
                            alt="" style="width:100%;">
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
