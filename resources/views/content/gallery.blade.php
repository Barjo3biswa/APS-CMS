@extends('layout.app')
@section('css')
    <style>
        .section-header {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 10px;
            background: #2B3044;
        }

        .section-header h1 {
            /* font: 400 32px "Montserrat", sans-serif; */
            font: 400 32px;
            text-transform: uppercase;
            color: #fff;
        }

        .video-gallery {
            display: grid;
            /* grid-template-columns: repeat(auto-fit, minmax(370px, 1fr)); */
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            grid-gap: 15px;
            margin: 0 auto;
            box-sizing: border-box;
        }

        .video-gallery .gallery-item {
            position: relative;
            width: 100%;
            height: 300px;
            background: #000;
            cursor: pointer;
            overflow: hidden;
        }

        .video-gallery .gallery-item img {
            position: relative;
            display: block;
            width: 115%;
            height: 300px;
            object-fit: cover;
            /* opacity: .5; */
            /*transition: opacity .35s, transform .35s;*/
            transition: all 350ms ease-in-out;
            transform: translate3d(-23px, 0, 0);
            /*backface-visibility: hidden;*/
        }

        .north-cascades-img {
            object-position: 50% 30%;
        }

        .video-gallery .gallery-item .gallery-item-caption {
            padding: 32px;
            font-size: 1em;
            color: #fff;
            text-transform: uppercase;
        }

        .video-gallery .gallery-item .gallery-item-caption,
        .video-gallery .gallery-item .gallery-item-caption>a {
            position: absolute;
            /* top: 0; */
            bottom: 0;
            left: 0;
            width: 100%;
            /* height: 100%; */
        }

        .video-gallery .gallery-item h2 {
            font-weight: 300;
            overflow: hidden;
            padding: 12px 0;
            color: #cecece;
            font-size: 1.5rem;
        }

        .video-gallery .gallery-item h2,
        .video-gallery .gallery-item p {
            position: relative;
            margin: 0;
            z-index: 1;
            pointer-events: none;
        }

        .video-gallery .gallery-item p {
            letter-spacing: 1px;
            font-size: 12px;
            padding: 12px 0;
            opacity: 0;
            transition: opacity 0.35s, transform 0.35s;
            transform: translate3d(10%, 0, 0);
        }

        .video-gallery .gallery-item:hover img {
            opacity: 0.3;
            transform: translate3d(0, 0, 0);
        }

        .video-gallery .gallery-item .gallery-item-caption {
            text-align: left;
        }

        .video-gallery .gallery-item h2::after {
            content: "";
            position: absolute;
            bottom: 0;
            left: 0;
            width: 15%;
            height: 1px;
            background: #fff;
            transition: transform 0.3s;
            transform: translate3d(-100%, 0, 0);
        }

        .video-gallery .gallery-item:hover h2::after {
            transform: translate3d(0, 0, 0);
        }

        .video-gallery .gallery-item:hover p {
            opacity: 1;
            transform: translate3d(0, 0, 0);
        }
    /* </style>

<style>
    /* Style for previous pagination link */
    .relative.inline-flex.items-center.px-4.py-2.text-sm.font-medium.text-gray-500.bg-white.border.border-gray-300.cursor-default.leading-5.rounded-md {
        /* Add your styling here */
        color: #333;
        background-color: #fff;
        border-radius: 4px;
        transition: background-color 0.2s, color 0.2s;
    }

    .relative.inline-flex.items-center.px-4.py-2.ml-3.text-sm.font-medium.text-gray-700.bg-white.border.border-gray-300.leading-5.rounded-md.hover:text-gray-500.focus:outline-none.focus:ring.ring-gray-300.focus:border-blue-300.active:bg-gray-100.active:text-gray-700.transition.ease-in-out.duration-150 {
        /* Add your styling here */
        color: #333;
        background-color: #fff;
        border-radius: 4px;
        transition: background-color 0.2s, color 0.2s;
    }

    /* Hover and active states for links */
    .relative.inline-flex.items-center.px-4.py-2.text-sm.font-medium.text-gray-500.bg-white.border.border-gray-300.cursor-default.leading-5.rounded-md:hover,
    .relative.inline-flex.items-center.px-4.py-2.ml-3.text-sm.font-medium.text-gray-700.bg-white.border.border-gray-300.leading-5.rounded-md.hover:text-gray-500.focus:outline-none.focus:ring.ring-gray-300.focus:border-blue-300.active:bg-gray-100.active:text-gray-700.transition.ease-in-out.duration-150 {
        background-color: #007bff;
        color: #fff;
        border-color: #007bff;
    }
</style>

@endsection
@section('content')
    {{-- <div class="site-breadcrumb">
        <img src="{{asset('img/jist_1st.jpg')}}" alt="" width="100%" height="100%">
    </div> --}}

    {{-- <section class="service-section spad" style="position:relative;margin-bottom: 2rem;">
		<div class="container services">
            <div class="section-title2" style="margin-bottom: 45px;">
				<h3 style="color:#358b88">ARMY PUBLIC SCHOOL
                     PHOTO GALLERY</h3>
			</div>
            <div class="gallery-container">
                @forelse ($gallery as $data )
                    <div class="gallery-item">
                        <a href="" data-lightbox="roadtrip"><img src="{{asset($data->file)}}" width="30%" height="30%"></a>
                    </div>
                @empty
                    <div class="gallery-item">
                        <a href="#" data-lightbox="roadtrip" style="align-content: center; color:black">No Image Uploaded</a>
                    </div>
                @endforelse
            </div>
        </div>
	</section> --}}
    <div class="container-xxl py-5">
        <div class="container">
            <div class="title-heading-icon ps-0 mb-5">
                <span><img src="./icons/history.png" alt="" width="40"></span>
                <div>
                    <h1 class="display-6 mb-0">
                        Gallery Album
                    </h1>
                </div>
            </div>

            {{-- <div class="row g-5">
                <div class="col-md-12 col-sm-12">
                    <div class="content">

                        <div class="video-gallery">
                            @forelse ($gallery as $data)
                                <div class="gallery-item ">
                                    <img src="{{ asset($data->file) }}" alt="" />
                                    <div class="gallery-item-caption">
                                        <div>
                                        <h2>ALBUM 1</h2>
                                        <p>APS Narangi</p>

                                        <a class="vimeo-popup" href="#"></a>
                                    </div>
                                </div>
                            @empty
                                <div class="gallery-item">
                                    <a href="#" data-lightbox="roadtrip" style="align-content: center; color:black">No
                                        Image
                                        Uploaded</a>
                                </div>
                            @endforelse
                        </div>

                    </div>

                </div>
            </div> --}}

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
                                            {{-- <i class="fa fa-plus-circle" aria-hidden="true"></i> --}}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div><!-- End row -->
                    </div><!-- End image gallery -->
                </section>
                {{-- {{ $gallery->appends(request()->all())->links() }} --}}
        {{$gallery->links('pagination::bootstrap-4')}}
            </div>

        </div>
    </div>

    {{-- {{ $gallery->links() }} --}}
@endsection
