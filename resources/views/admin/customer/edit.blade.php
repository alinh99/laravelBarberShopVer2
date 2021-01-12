@extends('admin.layout.index')
@section('content')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                @if (count($errors) > 0)
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $err)
                        {{ $err }}</br>
                    @endforeach
                </div>
            @endif
            @if (session()->has('suakhachthanhcong'))
                <div class="alert alert-success">{{ session()->get('suakhachthanhcong') }}</div>
            @endif
                <div class="col-lg-12">

                    <h1 class="page-header">Customer
                        <small>{{ $customer->name }}</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-7" style="padding-bottom:120px">
                    <form action="admin/customers/admin-edit-customer/{{ $customer->id }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Name</label>
                            <input class="form-control" name="name" placeholder="Please Enter Name"
                                value="{{ $customer->name }}" />
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Please Enter Email"
                                value="{{ $customer->email }}">
                        </div>
                        <div class="form-group">
                            <label>Gender</label>
                            <label class="radio-inline">
                                <input name="gender" value="Nam" checked="" type="radio" value="{{ $customer->gender }}">Male
                            </label>
                            <label class="radio-inline">
                                <input name="gender" value="Nữ" type="radio" value="{{ $customer->gender }}">Female
                            </label>
                        </div>
                        <div class=" form-group">
                                <label>Address</label>
                                <input type="text" name="address" class="form-control" placeholder="Please Enter Address"
                                    value="{{ $customer->address }}">
                        </div>
                        <div class="form-group">
                            <label>Phone number</label>
                            <input class="form-control" name="phone_number" placeholder="Please Enter Phone number" value="{{ $customer->phone_number }}"/>
                        </div>
                        <div class="form-group">
                            <label>Note</label>
                            <textarea class="form-control" name="note" >{{ $customer->note }}</textarea>
                        </div>
                        <button type=" submit" class="btn btn-default">Customer Edit</button>
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
