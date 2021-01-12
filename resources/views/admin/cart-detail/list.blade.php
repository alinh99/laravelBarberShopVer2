@extends('admin.layout.index')
@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            @if(session()->has('xoachitietthanhcong'))
            <div class="alert alert-success">{{session()->get('xoachitietthanhcong')}}</div>
            @endif
            <div class="col-lg-12">
                <h1 class="page-header">Bill Details
                    <small>List</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>ID Bill</th>
                        <th>ID Product</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($bill_details as $bill_detail)
                    <tr class="even gradeC" align="center">
                        <td>{{ $bill_detail->id }}</td>
                        <td>{{ $bill_detail->id_bill }}</td>
                        <td>{{ $bill_detail->id_product }}</td>
                        <td>{{ $bill_detail->quantity }}</td>
                        <td>{{ $bill_detail->price }}</td>
                        <td class="center">
                            <form action="{{url('admin/bill-details/delete-bill-details',$bill_detail->id)}}" method="post" role="form">
                                @csrf
                                <button name="delete">Delete</button>
                                <i class="fa fa-trash-o  fa-fw">    
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
