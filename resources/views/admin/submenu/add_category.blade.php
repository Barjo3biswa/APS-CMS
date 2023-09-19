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
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<div class="container">
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Add </h3>
                    </div>
                    <form action="{{route('admin.submenu.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Name</label>
                                <input type="text" class="form-control" name="name">
                                <input type="hidden" class="form-control" name="menu_id" value="{{$menu->id??""}}">
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
                        <div class="table-responsive">
                            <table class=" table table-bordered">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Name</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($menu)
                                    @forelse ($menu->sub_menu as $key => $submenu )
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$submenu->name}}</td>
                                            <td>
                                                @if ($submenu->status == 1)
                                                    <span class="badge badge-success">Active</span>
                                                @else
                                                    <span class="badge badge-danger">Deactive</span>
                                                @endif
                                                <span></span>
                                            </td>
                                            <td>
                                                @if ($submenu->status == 1)
                                                    <a href="" class="btn btn-danger btn-xs">Deactivate</a>
                                                @else
                                                    <a href="" class="btn btn-success btn-xs">Activate</a>
                                                @endif
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4"> No record</td>
                                        </tr>
                                    @endforelse
                                    @endif

                                </tbody>
                            </table>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
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

    }, 2000);}

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
