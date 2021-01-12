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
            @if(session()->has('themslidethanhcong'))
            <div class="alert alert-success">{{session()->get('themslidethanhcong')}}</div>
            @endif
            <div class="col-lg-12">
                <h1 class="page-header">Slides
                    <small>Add</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                <form action="{{ url('admin/slides/post-admin-add-slide') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Name</label>
                        <input class="form-control" name="name" placeholder="Please Enter Name of Slide" />
                    </div>
                    <div class="form-group">
                        <label for="image">Images</label>
                        <input type="file" name="image" id="image">
                    </div>
                    <div class="form-group">
                        <label>Link</label>
                        <input class="form-control" name="link" placeholder="Please Enter Link of Slide" />
                    </div>

                    <div class="form-group">
                        <label>Slide Status</label>
                        <label class="radio-inline">
                            <input name="status" value="1" checked="" type="radio">Visible
                        </label>
                        <label class="radio-inline">
                            <input name="status" value="0" type="radio">Invisible
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