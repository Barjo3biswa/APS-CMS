@extends('dept-layout.app')
@section('content')
    <section class="service-section spad">
        @dd($content);
        {!!$content->content!!}
    </section>
@endsection
