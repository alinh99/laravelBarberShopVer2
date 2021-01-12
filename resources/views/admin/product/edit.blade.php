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
            @if(session()->has('suathanhcong'))
            <div class="alert alert-success">{{session()->get('suathanhcong')}}</div>
            @endif
            <div class="col-lg-12">
                <h1 class="page-header">Edit
                    <small>{{ $product->title }}</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="colp-lg-7" style="padding-bottom:120px">
                <form action="admin/product/admin-edit-product/{{ $product->id }}" method="POST" enctype="multipart/form-data" role="form">
                    @csrf
                    <div class="form-group">
                        <label>Name</label>
                        <input class="form-control" name="title" placeholder="Please Enter Title" value="{{ $product->title }}"/>
                    </div>

                    <div class="form-group">
                        <label for="image">Images</label>
                        <img src="assets/img/{{$product->image}}" width="100px"/>
                        <input type="file" name="image" id="image">
                    </div>

                    <div class="form-group">
                        <label>Price</label>
                        <input class="form-control" name="price" placeholder="Please Enter Price" value="{{ $product->price }}" />
                    </div>

                    <div class="form-group">
                        <label>Product Status</label>
                        <label class="radio-inline">
                            <input name="status" value="1" checked="" type="radio">Visible
                        </label>
                        <label class="radio-inline">
                            <input name="status" value="0" type="radio">Invisible
                        </label>
                    </div>
                    <button type="submit" class="btn btn-default">Product Edit</button>
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