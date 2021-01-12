@if(session()->has("Cart"))
<ul class="list-group mb-3 sticky-top">
    @if (session()->has('Cart'))
    @foreach(session()->get("Cart")->items as $item)
    <li class="list-group-item d-flex justify-content-between lh-condensed">
        <div>
            <h6>Product {{$item['productInfo']->id}}</h6>
            <small class="my-3">{{$item['productInfo']->title}}</small>
        </div>
        <span class="text-muted" ><img src="assets/img/{{$item['productInfo']->image}}" style="width:70px;" ></span>
        <span class="text-muted">{{number_format($item['productInfo']->price)}}₫ x {{$item['quanty']}}</span>
    </li>
    @endforeach
    @endif
    <li class="list-group-item d-flex justify-content-between">
        <span>Total (₫)</span>
        <strong>{{number_format(session()->get("Cart")->totalPrice)}} ₫</strong>
    </li>
    <li class="list-group-item d-flex justify-content-between">
        <span>Total(₫)</span>
        @if (session()->has('Cart'))
        <strong>{{number_format(session()->get("Cart")->totalPrice)}} ₫</strong>
        @else
        <p>Chưa có sản phẩm để thanh toán</p>
        <strong>0₫</strong>
        @endif
    </li>
</ul>
@endif
