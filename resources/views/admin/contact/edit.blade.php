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
            @if(session()->has('sualienhethanhcong'))
            <div class="alert alert-success">{{session()->get('sualienhethanhcong')}}</div>
            @endif
            <div class="col-lg-12">

                <h1 class="page-header">Contact
                    <small>{{ $contact->name }}</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                <form action="admin/booking/admin-edit-contact/{{ $contact->id }}" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Name</label>
                        <input class="form-control" name="name" placeholder="Please Enter Name" value="{{$contact->name}}" />
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input class="form-control" name="email" type="email" placeholder="Please Enter Email" value="{{ $contact->email }}" />
                    </div>

                    <div class="form-group">
                        <label>Phone Number</label>
                        <input class="form-control" name="phone_number" placeholder="Please Enter Phone Number" value="{{ $contact->phone_number }}"/>
                    </div>

                    <div class="form-group">
                        <label>Note</label>
                        <textarea class="form-control" rows="3" name="note" placeholder="Please Enter Note">{{ $contact->note }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-default">Contact Edit</button>
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