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
            @if(session()->has('themlichthanhcong'))
            <div class="alert alert-success">{{session()->get('themlichthanhcong')}}</div>
            @endif
            <div class="col-lg-12">
                <h1 class="page-header">Booking
                    <small>Add</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                <form action="{{ url('admin/booking/post-admin-add-booking') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Name</label>
                        <input class="form-control" name="name" placeholder="Please Enter Name" />
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input class="form-control" name="email" placeholder="Please Enter Email" />
                    </div>
                    <div class="form-group">
                        <label>Phone</label>
                        <input class="form-control" name="phone" placeholder="Please Enter Phone"></input>
                    </div>
                    <div class="form-group">
                        <label>Date</label>
                        <input type="date" class="form-control" name="date" placeholder="Please Enter Date"></input>
                    </div>
                    <div class="form-group">
                        <label>Time</label>
                        <input type="time"  name="time" class="form-control" placeholder="Please Enter Time">
                    </div>
                    <button type="submit" class="btn btn-default">Booking Add</button>
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