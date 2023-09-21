@extends('layout.app')
@section('content')
    <!-- Carousel Start -->
    <div class="container-fluid p-0 mb-0 wow fadeIn" data-wow-delay="0.1s">
        <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    @php
                        $slider = App\Models\SliderImage::where('status', 1)->first();
                    @endphp
                    <img class="w-100" src="{{ asset($slider->file) }}" alt="Image"
                        style="object-fit: cover; object-position: 100%;" />
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row justify-content-start">
                                <div class="col-10 col-lg-8"
                                    style="background: rgba(0, 0, 0, .3); padding: 20px;margin-left: 12px;">
                                    <h5 class="text-uppercase mb-2 animated slideInDown" style="color:#fd940c;">
                                        Welcome to APS Narangi, Guwahati
                                    </h5>
                                    <h4 class="text-light text-uppercase mb-0 animated slideInDown">Striving for
                                        excellence in all spheres of learning</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="container-xxl py-0 mb-5">
        <div class="container">
            <div class="important-update">
                <button class="impt-btn">Important Updates <i class="fa fa-arrow-right ms-1"></i> </button>
                @php
                    $imp_updates = App\Models\Event::where('news_type_id', 'LIKE', '%1%')
                        ->where('status', 1)
                        ->get();
                @endphp
                <div class="bar">
                    <span class="bar_content">
                    @foreach ($imp_updates as $im_up)
                        @if ($im_up->news_type==1)
                        <a href="{{asset($im_up->pdf_file)}}" target="_blank" onmouseover="this.stop();" onmouseout="this.start();">
                            <span class="impt-update-span">{{ $im_up->title }}</span> {{ $im_up->description }}
                        </a>
                        @elseif ($im_up->news_type==2)
                        <a href="{{asset($im_up->url)}}" target="_blank" onmouseover="this.stop();" onmouseout="this.start();">
                            <span class="impt-update-span">{{ $im_up->title }}</span> {{ $im_up->description }}
                        </a>
                        @elseif ($im_up->news_type==3)
                        <a href="#" onmouseover="this.stop();" onmouseout="this.start();">
                            <span class="impt-update-span">{{ $im_up->title }}</span> {{ $im_up->description }}
                        </a>
                        @endif
                    @endforeach
                   </span>
                </div>
            </div>
        </div>
    </div>

    <!-- Carousel End -->


    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="position-relative overflow-hidden ps-5 pt-5 h-100" style="min-height: 400px">
                        <img class="position-absolute w-100 h-100" src="./new-images/school_pic.jpg" alt="" style="object-fit: cover" />
                        <div class="position-absolute top-0 start-0 bg-white pe-3 pb-3" style="width: 200px; height: 200px">
                            <div class="d-flex flex-column justify-content-center text-center bg-primary h-100 p-3">
                                <h1 class="text-white">25</h1>
                                <h2 class="text-white">Years</h2>
                                <h5 class="text-white mb-0">Experience</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="h-100">
                        <div class="border-start-none border-5-none border-primary-none ps-0 mb-5">
                            <div class="heading-with-line">
                                <h6 class="text-body text-uppercase mb-2">About Us</h6>
                            </div>
                            <h1 class="display-6 mb-0">
                                Welcome to Army Public School, Narangi
                            </h1>
                        </div>

                        <p style="text-align:justify;">
                            On 15th January 1980 (Army Day), the Chief of the Army Staff made an announcement regarding
                            the establishment of Army Schools throughout the country to impart adequate educational
                            facilities upto 10+2 level for the children of Army personnel..
                        </p>
                        <p class="mb-4">
                            Close on the heels of this announcement came the setting up of four Army Schools in 1980, at
                            Udhampur, Bangalore, Dehradun and Ambala. More and more such schools are being raised to the
                            status of Army Schools every year.
                        </p>
                        <a class="small" href="">READ MORE<i class="fa fa-arrow-right ms-3"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

    <!-- Features Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="row gy-5 gx-4">
                        {{-- <h6 class="text-body display-7 text-uppercase mb-4">Message from the Chairman's Desk</h6>
                        <div class="msg-principal mt-0">
                            <div class="msg-para">
                                <p style="text-align: justify;">Lorem ipsum, dolor sit amet consectetur adipisicing
                                    elit. Alias soluta eveniet optio assumenda architecto adipisci corrupti provident
                                    voluptatum? Recusandae quaerat laboriosam aut est esse harum culpa excepturi
                                    voluptatibus laborum ex!</p>
                                <a class="small" href="">READ MORE<i class="fa fa-arrow-right ms-3"></i></a>
                            </div>
                            <div class="principal-img">
                                <img src="{{asset('new-images/default-img.png')}}" alt="">
                            </div>
                        </div> --}}
                        <div class="mb-5">
                            <h6 class="text-body display-7 text-uppercase mb-4">Message from the Principal's Desk</h6>
                            <div class="msg-principal">
                                <div class="msg-para">
                                    <p style="text-align: justify;">Lorem ipsum, dolor sit amet consectetur adipisicing
                                        elit. Alias soluta eveniet optio assumenda architecto adipisci corrupti
                                        provident voluptatum? Recusandae quaerat laboriosam aut est esse harum culpa
                                        excepturi voluptatibus laborum ex!</p>
                                    <a class="small" href="">READ MORE<i class="fa fa-arrow-right ms-3"></i></a>
                                </div>
                                <div class="principal-name" style="display: flex;flex-direction: column;align-items: center;">
                                    <div class="principal-img" style="height: 170px;">
                                        <img src="{{asset('new-images/Principal_Photo_New.jpg')}}" alt="">
                                    </div>
                                    <h6 class="mt-2" style="white-space:nowrap;">Dr Bandana Baruah</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="service-item overflow-hidden h-100">
                        <!-- <img class="img-fluid" src="img/service-1.jpg" alt=""> -->
                        <div class="thumbnails">
                            <img class="img-fluid"
                                src="https://m.economictimes.com/thumb/msid-77391367,width-1200,height-900,resizemode-4,imgsize-677864/to-reduce-risk-experts-say-schools-should-make-adjustments-when-resuming-in-person-classes-.jpg"
                                alt="">
                            <div class="black"></div>
                            <div class="title">
                                <h6 class="display-6 mb-3 border-start border-5 border-primary">Notice Board</h6>
                                @php
                                    $news_updates = App\Models\Event::where('news_type_id', 'LIKE', '%4%')
                                        ->where('status', 1)
                                        ->get();
                                @endphp
                                <ul>
                                    @foreach ($news_updates as $evn)
                                        <li>
                                            <span>
                                                <i class="fa fa-calendar"></i>
                                                {{ date('d-m-Y', strtotime($evn->date)) }}
                                            </span>
                                            @if ($evn->news_type==1)
                                            <a href="{{asset($evn->pdf_file)}}" target="_blank">
                                                <h6 class="mb-3">{{ $evn->description}}</h6>
                                            </a>
                                            @elseif ($evn->news_type==2)
                                            <a href="{{asset($evn->url)}}" target="_blank">
                                                <h6 class="mb-3">{{ $evn->description}}</h6>
                                            </a>
                                            @elseif ($evn->news_type==3)
                                            <a href="#">
                                                <h6 class="mb-3">{{ $evn->description}}</h6>
                                            </a>
                                            @endif

                                        </li>
                                    @endforeach
                                </ul>
                                <a class="small"
                                    href="{{ route('menu.load-more', Crypt::encrypt(['field' => 'news_type_id', 'args' => '4'])) }}">READ
                                    MORE<i class="fa fa-arrow-right ms-3"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Features End -->

    <!-- Features Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-12 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="ps-0 mb-5">
                        <div class="heading-with-line">
                            <h6 class="text-body text-uppercase mb-2">Primary Links</h6>
                        </div>
                        <h1 class="display-6 mb-0">Important Links</h1>
                    </div>
                    @php
                        $important_links = App\Models\Event::where('news_type_id', 'LIKE', '%3%')
                            ->where('status', 1)
                            ->get();
                    @endphp
                    <div class="row gy-5 gx-4 important_links">
                        @foreach ($important_links as $link)
                            <div class="col-sm-3 wow fadeIn" data-wow-delay="0.1s">
                                <div class="d-flex align-items-center mb-0 impt-div">

                                    <img src="{{asset('icons/calendar.png')}}" alt="" class="flex-shrink-0 me-3">

                                    @if ($link->news_type==1)
                                    <a href="{{asset($link->pdf_file)}}" target="_blank">
                                    @elseif ($link->news_type==2)
                                    <a href="{{asset($link->url)}}" target="_blank">
                                    @elseif ($link->news_type==3)
                                    <a href="{{ route('menu.event-sub-load', Crypt::encrypt($link->id)) }}">
                                    @endif

                                    {{-- <a href="{{ route('menu.event-sub-load', Crypt::encrypt($link->id)) }}"> --}}
                                    <h6 class="mb-0">{{ $link->description }}</h6>
                                    </a>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Features End -->

    <!-- Facts Start -->
    <div class="container-fluid my-5 p-0">
        <div class="row g-0">
            <div class="col-xl-3 col-sm-6 wow fadeIn" data-wow-delay="0.1s">
                <div class="position-relative">
                    <img class="img-fluid w-100" src="{{asset('new-images/co-curricular/DSC_0010.JPG')}}" alt="" />
                    <div class="facts-overlay">
                        <h6 class="text-white mb-3">Co-curricular Activities </h6>
                        <a class="text-white small" href="">READ MORE
                            <i class="fas fa-arrow-circle-right ms-3"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 wow fadeIn" data-wow-delay="0.3s">
                <div class="position-relative">
                    <img class="img-fluid w-100" src="{{asset('new-images/co-curricular/DSC_0016.JPG')}}" alt="" />
                    <div class="facts-overlay">
                        <h6 class="text-white mb-3">Name of the activity</h6>
                        <a class="text-white small" href="">READ MORE<i
                                class="fas fa-arrow-circle-right ms-3"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 wow fadeIn" data-wow-delay="0.5s">
                <div class="position-relative">
                    <img class="img-fluid w-100" src="{{asset('new-images/co-curricular/DSC_0025.JPG')}}" alt="" />
                    <div class="facts-overlay">
                        <h6 class="text-white mb-3">Name of the activity</h6>
                        <a class="text-white small" href="">READ MORE
                            <i class="fas fa-arrow-circle-right ms-3"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 wow fadeIn" data-wow-delay="0.7s">
                <div class="position-relative">
                    <img class="img-fluid w-100" src="{{asset('new-images/co-curricular/DSC_0341.JPG')}}" alt="" />
                    <div class="facts-overlay">
                        <h6 class="text-white mb-3">Name of the activity</h6>
                        <a class="text-white small" href="">READ MORE<i
                                class="fas fa-arrow-circle-right ms-3"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Facts End -->

    <!-- Testimonial Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-5 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="border-start-none ps-0 mb-5">
                        <div class="heading-with-line">
                            <h6 class="text-body text-uppercase mb-2">Our Toppers</h6>
                        </div>
                        <h1 class="display-6 mb-0">Academic Achievers</h1>
                    </div>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis, enim. Lorem ipsum dolor sit amet
                        consectetur adipisicing elit. Omnis, mollitia!</p>
                </div>
                @php
                    $aca_arch = App\Models\AcademicArchieve::where('status', 1)->get();
                @endphp
                {{-- {{dd($aca_arch)}} --}}
                <div class="col-lg-7 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="owl-carousel testimonial-carousel">
                        @foreach ($aca_arch as $arch)
                            <div class="testimonial-item">
                                <img class="img-fluid mb-4" src="{{ asset($arch->file) }}"alt="" />
                                <h7>{{ $arch->name }} <br>{{ $arch->class }}</h7><br>
                                <span>{{ $arch->percentage }}%</span>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- Testimonial End -->

    <!-- Service Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5 align-items-end mb-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="ps-0">
                        <div class="heading-with-line">
                            <h6 class="text-body text-uppercase mb-2">Events</h6>
                        </div>
                        <h1 class="display-6 mb-0">
                            Our Latest Events
                        </h1>
                    </div>
                </div>
                <div class="col-lg-6 text-lg-end wow fadeInUp" data-wow-delay="0.3s">
                    <a class="btn btn-primary py-3 px-3"
                        href="{{ route('menu.load-more', Crypt::encrypt(['field' => 'news_type_id', 'args' => '3'])) }}"
                        style="border-radius: 50px;padding: 6px 10px !important;">View All Events</a>
                </div>
            </div>
            @php
                $latest_events = App\Models\Event::where('news_type_id', 'LIKE', '%2%')
                    ->where('status', 1)
                    ->get();
            @endphp
            <div class="row g-4 justify-content-center aps-events">
                <div class="content-column">
                    <div class="events-listings">
                        <ul class="events-list">
                            @foreach ($latest_events as $evn)
                                <li class="event-item1 clearfix1">
                                    <a class="event-item clearfix" href="#">
                                        <div class="day-column">
                                            <h5 class="month-name">{{ date('M-d-Y', strtotime($evn->date)) }}</h5>
                                            <p class="day-name">{{ date('DD', strtotime($evn->date)) }}</p>
                                            <img src="./icons/event-calendar.png" alt="" width="40">
                                        </div>
                                        <div class="title-column">
                                            <div class="event-title">
                                                <h6 class="title-name">{{ $evn->description }}</h6>
                                            </div>
                                            <div class="event-details">
                                                <ul class="event-details-list">
                                                    <li class="event-details-item">
                                                        <div>APS, Narangi</div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="event-category">
                                                <div>
                                                    <span class="event-category-title">Category:</span> <span
                                                        class="event-category-name" href="#">Cultural Event</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="event-img">
                                            <img src="./new-images/gallery/DSC_0008.JPG" alt="">
                                        </div>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Service End -->

    <!-- Team Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5 align-items-end mb-5">
                <div class="col-lg-12 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="ps-0">
                        <div class="heading-with-line">
                            <h6 class="text-body text-uppercase mb-2">Student stories</h6>
                        </div>
                        <!-- <h6 class="text-body text-uppercase mb-2">Student stories</h6> -->
                        <h1 class="display-6 mb-0">Moments of Student Activities</h1>
                    </div>
                </div>
            </div>
            @php
                $gallery = App\Models\Gallery::where('status', 1)->where('display_in_home',1)->orderby('id','desc')->get()->take(20);
            @endphp
            <div class="row g-4">
                <section id="gallery">
                    <div id="image-gallery">
                        <div class="row">
                            @foreach ($gallery as $gal)
                                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 image">
                                    <div class="img-wrapper">
                                        <a href="{{ asset($gal->file) }}"><img src="{{ asset($gal->file) }}"
                                                class="img-responsive"></a>
                                        <div class="img-overlay">
                                            <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div><!-- End row -->
                    </div><!-- End image gallery -->
                </section>

            </div>
        </div>
    </div>
@endsection
@section('js')
<script>
    const barContent = document.querySelector('.bar_content');
    barContent.addEventListener('mouseover', () => {
        barContent.classList.add('paused');
    });

    barContent.addEventListener('mouseout', () => {
        barContent.classList.remove('paused');
    });

</script>
@endsection


