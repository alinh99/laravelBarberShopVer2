@extends('admin.layout.index')
@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            @if(session()->has('xoadonhangthanhcong'))
            <div class="alert alert-success">{{session()->get('xoadonhangthanhcong')}}</div>
            @endif
            <div class="col-lg-12">

                <h1 class="page-header">Bill
                    <small>List</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>ID Customer</th>
                        <th>Date Order</th>
                        <th>Total</th>
                        <th>Payment</th>
                        <th>Note</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($bills as $bill)
                    <tr class="even gradeC" align="center">
                        <td>{{ $bill->id }}</td>
                        <td>{{ $bill->id_customer }}</td>
                        <td>{{ $bill->date_order }}</td>
                        <td>{{ $bill->total }}</td>
                        <td>{{ $bill->payment }}</td>
                        <td>{{ $bill->note }}</td>
                        <td class="center">
                            <form action="{{url('admin/bill/delete-bill',$bill->id)}}" method="post" role="form">
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
