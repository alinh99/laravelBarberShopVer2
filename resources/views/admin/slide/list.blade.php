@extends('admin.layout.index')
@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                @if(session()->has('xoaslidethanhcong'))
                <div class="alert alert-success">{{session()->get('xoaslidethanhcong')}}</div>
                @endif
                <h1 class="page-header">Product
                    <small>List</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Name</th>
                        <th>Link</th>
                        <th>Image</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th>Delete</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($slides as $slide)
                    <tr class="odd gradeX" align="center">
                        <td>{{ $slide->id }}</td>
                        <td>{{ $slide->name }}</td>
                        <td>{{ $slide->link }}</td>
                        <td>{{ $slide->image }}</td>
                        <td>
                            @if($slide->status == 0)
                            <p>Invisible</p>
                            @else
                            <p>Visible</p>
                            @endif
                        </td>
                        <td>{{ $slide->created_at }}</td>
                        <td class="center">
                            <form action="{{url('admin/slides/delete-slide',$slide->id)}}" method="post" role="form">
                                @csrf
                                <button name="delete">Delete</button>
                                <i class="fa fa-trash-o  fa-fw">    
                            </form>    
                        </i></td>
                        <td class="center">
                            <form action="{{url('admin/slides/edit-slide',$slide->id)}}" method="get" role="form">
                                @csrf
                                <button name="edit">Edit</button> 
                                <i class="fa fa-pencil fa-fw">   
                            </form>  
                        </i></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
@endsection
