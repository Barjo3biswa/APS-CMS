@extends('admin.layouts.master')


@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Add Tender</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Add Content</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<div class="container">
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        {{-- <h3 class="card-title">Add Tender</h3> --}}
                    </div>
                    <form action="{{route('admin.tender.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Title</label>
                                <input type="text" class="form-control" name="title" placeholder="Enter Title">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Date</label>
                                <input type="date" class="form-control date_input" name="date">
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
                               </div>
                            </div>

                            <div class="form-group" id = "file_div">
                                <label for="exampleInputPassword1">File</label>
                                <input type="file" class="form-control" id="" name="file">
                            </div>
                            <div class="form-group" id = "url_div">
                                <label for="exampleInputPassword1">Add URL</label>
                                <input type="text" class="form-control" id="" name="file">
                            </div>

                        </div>
                        <div class="card-footer">
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary btn-xs">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
        </div>


    </div><!-- /.container-fluid -->
</div>

@endsection
@section('js')
    <script>
        $( document ).ready(function() {
            console.log( "ready!" );
            $("#file_div").hide();
            $("#url_div").hide();

           $('input[type="radio"]').click(function(){
                var inputValue = $(this).attr("value");
                // alert(inputValue);
                if (inputValue == 1) {
                    $("#file_div").show();
                    $("#url_div").hide();
                }else{
                    $("#file_div").hide();
                    $("#url_div").show();
                }
            });

        });
    </script>
@endsection
