@extends('master') @section('content')
@include('page\modal-booking')
<div class="container">
    <div class="py-5 text-center">

        <h2>Checkout</h2>

    </div>
    <div class="row">
        <div class="col-md-4 order-md-2 mb-4">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-muted">Your order</span>

                    @if (session()->has('Cart'))
                    <span id="total-quanty-show" class="badge badge-secondary badge-pill">{{ session()->get('Cart')->totalQuanty }}</span>
                @else
                    <span id="total-quanty-show" class="badge badge-secondary badge-pill">0</span>
                @endif

            </h4>
            <ul class="list-group mb-3 sticky-top">
                @if (session()->has('Cart'))
                @foreach(session()->get("Cart")->items as $item)
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <h6>Product {{$item['productInfo']->id}}</h6>
                        <small class="my-3">{{$item['productInfo']->title}}</small>
                    </div>
                    <span class="text-muted"><img src="assets/img/{{$item['productInfo']->image}}" style="width:70px" alt=""></span>
                    <span class="text-muted">{{number_format($item['productInfo']->price)}}₫ x {{$item['quanty']}}</span>
                </li>
                @endforeach
                @endif
                <li class="list-group-item d-flex justify-content-between">

                    <span>Total(₫)</span>
                    @if (session()->has('Cart'))
                    <strong>{{number_format(session()->get("Cart")->totalPrice)}} ₫</strong>
                    @else
                    <p>Chưa có sản phẩm để thanh toán</p>
                    <strong>0₫</strong>
                    @endif
                </li>
                <a class="btn btn-primary btn-lg btn-block" href="{{route('trang-chu')}}">Tiếp tục mua hàng</a>
            </ul>
        </div>
        <div class="col-md-8 order-md-1">
            <h4 class="mb-3">Billing address</h4>
            @if(session()->has('check-success'))
                <div class="alert alert-success">{{session()->get('check-success')}}</div>
            @endif
            <form class="needs-validation" method="POST" action="{{route('checkout')}}">
                    <input name="_token" value="{{csrf_token()}}" type="hidden">
                    <div class="mb-3">
                        <label for="firstName">Full name</label>
                        <input type="text" class="form-control" id="name" placeholder="Full name" value="" required="" name="full_name">
                        <div class="invalid-feedback"> Valid first name is required. </div>
                    </div>
                    <div class="mb-3">
                        <label for="gender">Gender</label>
                        <div class="custom-radio">
                            <input type="radio" class="custom-control-input" id="male" checked="" required="" name="gender" value="Nam">
                            <label class="custom-control-label" for="male" >Nam</label>
                        </div>
                        <div class="custom-radio">
                            <input type="radio" class="custom-control-input" id="female" name="gender" value="Nữ">
                            <label class="custom-control-label" for="female">Nữ</label>
                        </div>
                    </div>

                <div class="mb-3">
                    <label for="email">Email <span class="text-muted">(Optional)</span></label>
                    <input type="email" class="form-control" id="email" placeholder="you@example.com" name="email" required="">
                    <div class="invalid-feedback"> Please enter a valid email address for shipping updates. </div>
                </div>
                <div class="mb-3">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" id="address" placeholder="1234 Main St" required="" name="address">
                    <div class="invalid-feedback"> Please enter your shipping address. </div>
                </div>

                <div class="mb-3">
                    <label for="address">Phone number</label>
                    <input type="text" class="form-control" id="phone_number" placeholder="Your phone number" required="" name="phone">
                    <div class="invalid-feedback"> Please enter your phone number. </div>
                </div>

                <div class="mb-3">
                    <label for="notes">Notes</label>
                    <input type="textarea"  class="form-control" id="phone_number" placeholder="Your Notes" required="" name="notes">
                    <div class="invalid-feedback"> Please enter your Notes. </div>
                </div>

                <hr class="mb-4">

                <h4 class="mb-3">Hình thức thanh toán</h4>
                <div class="d-block my-3">
                    <div class="custom-radio">
                        <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked="" required="" value="COD">
                        <label class="custom-control-label" for="credit">Thanh toán trực tiếp</label>
                    </div>
                    <div class="custom-radio">
                        <input id="debit" name="paymentMethod" type="radio" class="custom-control-input" required="" value="ATM">
                        <label class="custom-control-label" for="debit">Chuyển khoản ngân hàng</label>
                    </div>
                </div>

                <hr class="mb-4">
                <button class="btn btn-primary btn-lg btn-block" type="submit">Thanh toán</button>
            </form>
        </div>
    </div>
</div>

@endsection

<script>
    (function () {
        'use strict'

        window.addEventListener('load', function () {
          // Fetch all the forms we want to apply custom Bootstrap validation styles to
          var forms = document.getElementsByClassName('needs-validation')

          // Loop over them and prevent submission
          Array.prototype.filter.call(forms, function (form) {
            form.addEventListener('submit', function (event) {
              if (form.checkValidity() === false) {
                event.preventDefault()
                event.stopPropagation()
              }
              form.classList.add('was-validated')
            }, false)
          })
        }, false)
      }())
</script>



  <style>
    .container {
        max-width: 960px;
      }

      .lh-condensed { line-height: 1.25; }
  </style>

