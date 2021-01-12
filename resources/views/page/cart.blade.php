@if(session()->has("Cart"))
<div class="select-items">
    <table>
        <tbody>
            @if (session()->has('Cart'))
            @foreach(session()->get("Cart")->items as $item)
            <tr>
                <td class="si-pic"><img src="assets/img/{{$item['productInfo']->image}}" alt=""></td>
                <td class="si-text">
                    <div class="product-selected">
                        <p>{{number_format($item['productInfo']->price)}}₫ x {{$item['quanty']}}</p>
                        <h6>{{$item['productInfo']->title}}</h6>
                    </div>
                </td>
                <td class="si-close">
                    <i class="fas fa-times" data-id="{{$item['productInfo']->id}}"></i>
                </td>
            </tr>
            @endforeach
            @endif
        </tbody>
    </table>
</div>
<div class="select-total">
    <span>total:</span>
    <h5>{{number_format(session()->get("Cart")->totalPrice)}} ₫</h5>
    <input hidden type="number" value="{{session()->get("Cart")->totalQuanty}}" id="total-quanty-cart">
</div>
@endif
