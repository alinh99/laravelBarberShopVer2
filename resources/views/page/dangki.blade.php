@extends('master') @section('content')
@include('page\modal-booking')
<div class="container sign-up">
    @if(count($errors)>0)
    <div class="alert alert-danger">
        @foreach($errors->all() as $err)
            {{$err}}</br>
        @endforeach
    </div>
    @endif
    @if(session()->has('dangkithanhcong'))
        <div class="alert alert-success">{{session()->get('dangkithanhcong')}}</div>
    @endif
    <form action="{{route('dangki')}}" method="POST">
        @csrf
        <div class="form-row text-center">
            <div class="col-6 sign">
                <a class="btn mt-3 btn-dark" href="{{route('dangnhap')}}">ĐĂNG NHẬP</a>
            </div>
            <div class="col-6 sign">
                <a class="btn mt-3 btn-dark" href="">ĐĂNG KÍ</a>
            </div>
            <div class="mt-4 form-group center">
                <input class="email mt-3 form-control" type="email" id="emaild" placeholder="Email" name="email" />
                <input class="email mt-3 form-control" type="password" id="passwordd" placeholder="Mật Khẩu" name="password" />
                <input class="email form-control" type="text" id="hotend" placeholder="Họ tên"  name="name"/>
                <input class="email mt-3 form-control" type="text" id="sdtd" placeholder="Số điện thoại" name="phone" />
                <button type="submit" class="btn btn-dark mt-3">ĐĂNG KÍ</button>
            </div>
        </div>
    </form>
</div>
@endsection
