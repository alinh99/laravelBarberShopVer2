@extends('admin.layout.index')
@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            @if(count($errors)>0)
            <div class="alert alert-danger">
                @foreach($errors->all() as $err)
                    {{$err}}</br>
                @endforeach
            </div>
            @endif
            @if(session()->has('themuserthanhcong'))
            <div class="alert alert-success">{{session()->get('themuserthanhcong')}}</div>
            @endif
            <div class="col-lg-12">
                <h1 class="page-header">User
                    <small>Add</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                <form action="{{ url('admin/users/post-admin-add-user') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Name</label>
                        <input class="form-control" name="name" placeholder="Please Enter Name" />
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input class="form-control" name="email" type="email" placeholder="Please Enter Email" />
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input class="form-control" name="password" type="password" placeholder="Please Enter Password"></input>
                    </div>
                    <div class="form-group">
                        <label>Phone Number</label>
                        <input class="form-control"  name="phone" placeholder="Please Enter Phone Number"></input>
                    </div>

                    <div class="form-group">
                        <label>User Level</label>
                        <label class="radio-inline">
                            <input name="quyen" value="0" checked="" type="radio">Khách
                        </label>
                        <label class="radio-inline">
                            <input name="quyen" value="1" type="radio">Admin
                        </label>
                    </div>
                    <button type="submit" class="btn btn-default">Product Add</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
@endsection