@extends('layout.app')
@section('content')
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-12 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="h-100">
                        <div class="title-heading-icon ps-0 mb-5">
                            <span><img src="{{asset('icons/history.png')}}" alt="" width="40"></span>
                            <div>
                                <h1 class="display-6 mb-0">
                                    Army Public School, Narangi
                                </h1>
                            </div>
                        </div>
                        @if ($important_links->details != null)
                            <p style="text-align:justify;">
                                {!!$important_links->details!!}
                            </p>

                        @else
                            <p class="mb-4" style="text-align:justify;">
                                PAGE UNDER CONSTRUCTION </p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
