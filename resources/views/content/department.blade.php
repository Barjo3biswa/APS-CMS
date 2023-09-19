@extends('layout.app')
@section('content')
    <div class="site-breadcrumb">
        <img src="{{asset('images/demo_banner.jpg')}}" alt="" width="100%" height="100%">
    </div>
    <section class="service-section spad" style="position:relative">
        <div class="container">
            <div class="section-title2" style="margin-bottom: 45px;">
                <h3 style="color:#358b88">BACHELOR OF SCIENCE</h3>
            </div>
            <div class="dept_card_container">
            @foreach($category as $cat)
                <div class="card">
                    <div class="card-header">
                        <img src="{{$cat->picture}}" alt="physics"/>
                    </div>
                    <div class="card-body">
                        <h6>{{$cat->title}}</h6>
                        <p>{{$cat->description}}</p>
                        <div class="user">
                            <a href="{{route('menu.get-department',[$menu->slug,$submenu->slug,$cat->slug])}}">Go to Dept.</a>
                        </div>
                    </div>
                </div>
            @endforeach

                {{-- <div class="card">
                    <div class="card-header">
                        <img src="https://www.thoughtco.com/thmb/6MsMmUK27akFhb8i89kj95J5iko=/1500x0/filters:no_upscale():max_bytes(150000):strip_icc()/GettyImages-545286316-433dd345105e4c6ebe4cdd8d2317fdaa.jpg"
                            alt="chemistry" />
                    </div>
                    <div class="card-body">
                        <h6>Chemistry Department</h6>
                        <p>The Chemistry department is established in the year 1971 offering B.Sc. Honours...</p>
                        <div class="user">
                            <a href="chemistry-dept.html">Got to Dept.</a>
                        </div>
                    </div>
                </div> --}}
                {{-- <div class="card">
                    <div class="card-header">
                        <img src="https://d2gg9evh47fn9z.cloudfront.net/800px_COLOURBOX30229644.jpg" alt="Mathematics" />
                    </div>
                    <div class="card-body">
                        <h6>Mathematics Department</h6>
                        <p>The Mathematics Department started its functioning since the inception of the...</p>
                        <div class="user">
                            <a href="math-dept.html">Go to Dept.</a>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </section>


@endsection
