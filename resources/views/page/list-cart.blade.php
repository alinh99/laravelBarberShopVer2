@if (session()->has('Cart'))
<div class="cart-table">
    <table>
        <thead>
            <tr>
                <th>Image</th>
                <th class="p-name">Product Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
                <th>Save</th>
                <th>Delete</th>
            </tr>
            <tr>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th class="close-td first-row edit-all"><i class="far fa-save"></i></th>
                <th class="close-td first-row del-all"><i class="fas fa-times"></i></th>
            </tr>
        </thead>
        <tbody>

            @foreach (session()->get('Cart')->items as $item)
                <tr>
                    <td class="cart-pic first-row"><img src="assets/img/{{$item['productInfo']->image}}" alt=""></td>
                    <td class="cart-title first-row">
                        <h5>{{$item['productInfo']->title}}</h5>
                    </td>
                    <td class="p-price first-row">{{number_format($item['productInfo']->price)}}₫</td>
                    <td class="qua-col first-row">
                        <div class="quantity">
                            <div class="pro-qty">
                                <input data-id="{{ $item['productInfo']->id }}" id="quanty-item{{ $item['productInfo']->id }}" type="text" value="{{ $item['quanty'] }}">
                            </div>
                        </div>
                    </td>
                    <td class="total-price first-row">{{number_format($item['price'])}} ₫</td>
                    <td class="close-td first-row"><i onclick="SaveListItemCart({{ $item['productInfo']->id }});"  class="far fa-save"></i></td>
                    <td class="close-td first-row"><i class="fas fa-times" onclick="DeleteListItemCart({{$item['productInfo']->id}});"></i></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="row">
    <div class="col-lg-4 offset-lg-8">
        <div class="proceed-checkout">
            <ul>
                <li class="subtotal">Total Quanty <span>{{session()->get("Cart")->totalQuanty}}</span></li>
                <li class="cart-total">Total Price <span>{{number_format(session()->get("Cart")->totalPrice)}} ₫</span></li>
            </ul>
            <a href="{{route('checkout')}}" class="proceed-btn">PROCEED TO CHECK OUT</a>
        </div>
    </div>
</div>
@endif
