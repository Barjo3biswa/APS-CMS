@extends('admin.layouts.master')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Notification</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Add </li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Add </h3>
                    </div>
                    <form action="{{route('admin.notification.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Title</label>
                                <input type="text" class="form-control" name="title" placeholder="Enter Title">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Description</label>
                                <input type="text" class="form-control" name="description" placeholder="Enter Description">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Date</label>
                                <input type="date" class="form-control" id="date" name="date">
                            </div>

                            <div class="form-group">
                                <label for="">Select Section</label>
                                <div class="row">
                                    @foreach ($news_sections as $section )
                                        <div class="col-md-3">
                                            <input type="checkbox" id="type" name="news_section_id[]" value="{{$section->id}}"> {{$section->name}}
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="">Choose</label>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="radio" id="type" name="type" value="1"> Upload File
                                    </div>

                                    <div class="col-md-3">
                                        <input type="radio" id="type" name="type" value="2"> Enter Url
                                    </div>
                                    <div class="col-md-3">
                                        <input type="radio" id="type" name="type" value="3"> Add Details
                                    </div>
                                </div>
                            </div>
                            <div class="form-group" id="file_div">
                                <div class="col-md-12">
                                    <label for="exampleInputPassword1">File</label>
                                    <input type="file" class="form-control" id="" name="file">
                                </div>
                            </div>
                            <div class="form-group" id="url_div">
                                <div class="col-md-12">
                                    <label for="exampleInputPassword1">Add URL</label>
                                    <input type="text" class="form-control" id="" name="url">
                                </div>
                            </div>

                            <div class="form-group" id="details_div">
                                <div class="col-md-12">
                                    <label for="exampleInputPassword1">Details</label>
                                    <textarea class="form-control" id="description" name="details"></textarea>
                                    <!-- <textarea name="details" id="" class="form-control"></textarea> -->
                                </div>
                            </div>
                        </div>

                        <div class="card-footer">
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary btn-xs">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
    <script>
        $( document ).ready(function() {
            $("#file_div").hide();
            $("#url_div").hide();
            $("#details_div").hide();
            $('input[type="radio"]').click(function(){
                var inputValue = $(this).attr("value");
                // alert(inputValue);
                if (inputValue == 1) {
                    $("#file_div").show();
                    $("#url_div").hide();
                    $("#details_div").hide();
                }else if(inputValue == 2){
                    $("#file_div").hide();
                    $("#details_div").hide();
                    $("#url_div").show();
                }else{
                    $("#details_div").show();
                    $("#file_div").hide();
                    $("#url_div").hide();
                }
            });
        });
    </script>
    <script>
        CKEDITOR.replace('description', {
        filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token() ])}}",
            customConfig : "{{asset('ckeditor/config.js')}}",
            filebrowserUploadMethod: 'form',
            allowedContent:true,
            height: '300px',
            width: '100%',
            // removePlugins: 'sourcearea'
    })
    </script>
@endsection
