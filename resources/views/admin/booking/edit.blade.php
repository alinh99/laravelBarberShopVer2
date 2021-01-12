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
            @if(session()->has('sualichthanhcong'))
            <div class="alert alert-success">{{session()->get('sualichthanhcong')}}</div>
            @endif
            <div class="col-lg-12">
                <h1 class="page-header">Edit
                    <small>{{ $booking->name }}</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="colp-lg-7" style="padding-bottom:120px">
                <form action="admin/booking/admin-edit-booking/{{ $booking->id }}" method="POST" >
                    @csrf
                    <div class="form-group">
                        <label>Name</label>
                        <input class="form-control" name="name" placeholder="Please Enter Title" value="{{ $booking->name }}"/>
                    </div>

                    <div class="form-group">
                        <label >Email</label>
                        <input type="email" name="email" class="form-control" placeholder="Please Enter Email" value="{{ $booking->email }}">
                    </div>

                    <div class="form-group">
                        <label>Phone</label>
                        <input class="form-control" name="phone" placeholder="Please Enter Phone" value="{{ $booking->phone }}" />
                    </div>

                    <div class="form-group">
                        <label>Date</label>
                        <input class="form-control" type="date" name="date" placeholder="Please Enter Date" value="{{ $booking->date }}" />
                    </div>

                    <div class="form-group">
                        <label>Time</label>
                        <input class="form-control" type="time" name="time" placeholder="Please Enter Time" value="{{ $booking->time }}" />
                    </div>

                    <button type="submit" class="btn btn-default">Booking Edit</button>
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