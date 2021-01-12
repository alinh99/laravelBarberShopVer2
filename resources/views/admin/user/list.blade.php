@extends('admin.layout.index')
@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            @if(session()->has('xoauserthanhcong'))
            <div class="alert alert-success">{{session()->get('xoauserthanhcong')}}</div>
            @endif
            <div class="col-lg-12">
                <h1 class="page-header">User
                    <small>List</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Level</th>
                        <th>Delete</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr class="odd gradeX" align="center">
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->phone }}</td>
                        <td>@if( $user->quyen != 0)
                            <p>Admin</p>
                            @else
                            <p>Khách</p>
                            @endif
                        </td>
                        <td class="center">
                            <form action="{{url('admin/users/delete-user',$user->id)}}" method="post" role="form">
                                @csrf
                                <button name="delete">Delete</button>
                                <i class="fa fa-trash-o  fa-fw">    
                            </form>    
                        </i></td>
                        <td class="center">
                            <form action="{{url('admin/users/edit-user',$user->id)}}" method="get" role="form">
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
