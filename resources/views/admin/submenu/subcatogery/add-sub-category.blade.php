@extends('admin.layouts.master')

@section('css')
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
@endsection

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Submenu</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item "><a href="#">{{$submenu->name}}</a></li>
                    <li class="breadcrumb-item active">Add Category</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<div class="container">
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Add {{$submenu->name}} Category</h3>
                    </div>
                    <form action="{{route('admin.store.subcategory',Crypt::encrypt($submenu->id))}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1"> Category Name</label>
                                <input type="text" class="form-control" name="title">
                                <input type="hidden" class="form-control" name="submenu_id" value="{{$submenu->id}}">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Description</label>
                                <textarea name="description" class="form-control" id="" cols="10" rows="5"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Add Picture</label>
                                <input type="file" name="file"  id="">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Display in frontpage</label>
                                <input type="checkbox" style="margin-left:2rem;" name="frontpage_display" value="1">
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">List</h3>
                    </div>
                    <div class="card-body">

                        <div id="list">

                            <div id="response"> </div>
                            <ul style="list-style:none">
                                @foreach($subcategory as $sub)
                                <li style="padding:8px; background-color: #D1D1D1; list-style:none; margin-bottom:10px;"
                                    id="arrayorder_">
                                    <i class="fas fa-bars"></i> | {{$sub->title}} |

                                    <a href="" class='btn btn-primary btn-xs'>
                                        Edit</a> | <a href="javascript:void(0)" data-id=""
                                        class="del btn btn-danger btn-xs">
                                        Delete</a>
                                </li>
                                @endforeach
                            </ul>

                        </div>
                    </div>

                </div>
                <!-- /.card -->
            </div>
        </div>


    </div><!-- /.container-fluid -->
</div>

@endsection

@section('js')

<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"
    integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>
<script type="text/javascript">
    $(document).ready(function(){
    	function slideout(){
            setTimeout(function(){
                $("#response").slideUp("slow", function () {
                });
            }, 2000);
        }

        $("#response").hide();
    	$(function() {
    	// $("#list ul").sortable({ opacity: 0.8, cursor: 'move', update: function() {

        //     var order = $(this).sortable("serialize") + '&update=update';
        //     console.log(order);
        //     $.post("updateCategoryList.php", order, function(theResponse){
        //         $("#response").addClass("alert alert-success");
        //         $("#response").html(theResponse);
        //         $("#response").slideDown('slow');
        //         slideout();
        //     });
        // }
    	// 	});
    	});

    });
</script>
@endsection
