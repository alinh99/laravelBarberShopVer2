@extends('admin.layout.index')
@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                @if(session()->has('xoakhachthanhcong'))
                <div class="alert alert-success">{{session()->get('xoakhachthanhcong')}}</div>
                @endif
                <h1 class="page-header">Customer
                    <small>List</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Name</th>
                        <th>Gender</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Phone Number</th>
                        <th>Note</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($customers as $customer)
                    <tr class="even gradeC" align="center">
                        <td>{{ $customer->id }}</td>
                        <td>{{ $customer->name }}</td>
                        <td>{{ $customer->gender }}</td>
                        <td>{{ $customer->email }}</td>
                        <td>{{ $customer->address }}</td>
                        <td>{{ $customer->phone_number }}</td>
                        <td>{{ $customer->note }}</td>
                        <td class="center">
                            <form action="{{url('admin/customers/delete-customer',$customer->id)}}" method="post" role="form">
                                @csrf
                                <button name="delete">Delete</button>
                                <i class="fa fa-trash-o  fa-fw">    
                            </form>    
                        </i></td>
                        <td class="center">
                            <form action="{{url('admin/customers/edit-customer',$customer->id)}}" method="get" role="form">
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
