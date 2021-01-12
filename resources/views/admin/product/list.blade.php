@extends('admin.layout.index')
@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            @if(session()->has('xoasanphamthanhcong'))
            <div class="alert alert-success">{{session()->get('xoasanphamthanhcong')}}</div>
            @endif
            <div class="col-lg-12">

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
                        <th>Price</th>
                        <th>Image</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Delete</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                    <tr class="even gradeC" align="center">
                        <td>{{$product->id}}</td>
                        <td>{{$product->title}}</td>
                        <td>{{ number_format($product->price) }} đ</td>
                        <td><img src="assets/img/{{ $product->image }}" alt="" style="width: 70px"></td>
                        <td>{{ $product->created_at }}</td>
                        <td>
                            @if($product->status == 0)
                            <p>Invisible</p>
                            @else
                            <p>Visible</p>
                            @endif
                        </td>
                        <td class="center">
                            <form action="{{url('admin/product/delete-product',$product->id)}}" method="post" role="form">
                                @csrf
                                <button name="delete">Delete</button>
                                <i class="fa fa-trash-o  fa-fw">    
                            </form>    
                        </i></td>
                        <td class="center">
                            <form action="{{url('admin/product/edit-product',$product->id)}}" method="get" role="form">
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
