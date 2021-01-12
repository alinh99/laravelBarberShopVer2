<?php
namespace App;
class Cart
{
    public $items = null;
	public $totalQuanty = 0;
	public $totalPrice = 0;

    // hàm dựng
	public function __construct($cart){
		if($cart){
			$this->items = $cart->items;
			$this->totalQuanty = $cart->totalQuanty;
			$this->totalPrice = $cart->totalPrice;
		}
	}

	//Them phan tu vao gio hang
	public function AddCart($product, $id){
        $newProduct = ['quanty' => 0, 'price' => $product->price, 'productInfo' => $product];
        if ($this->items) {
            if (array_key_exists($id, $this->items)) {
                $newProduct = $this->items[$id];
            }
        }
        $newProduct['quanty']++;
        $newProduct['price'] = $newProduct['quanty'] * $product->price;
        $this->items[$id] = $newProduct;
        $this->totalPrice += $product->price;
        $this->totalQuanty ++;
    }

    public function DeleteItemCart($id){
        $this->totalQuanty -= $this->items[$id]['quanty'];
        $this->totalPrice -= $this->items[$id]['price'];

        // hàm của laravel
        unset($this->items[$id]);
    }

    public function UpdateItemCart($id, $quanty){
        $this->totalQuanty -= $this->items[$id]['quanty']; // cập nhật số lượng
        $this->totalPrice -= $this->items[$id]['price']; // cập nhật lại tổng tiền

        // sau khi cập nhật thì
        $this->items[$id]['quanty'] = $quanty; // quanty = chính số lượng được truyền vào
        $this->items[$id]['price'] = $quanty * $this->items[$id]['productInfo']->price; // giá bằng = số lượng nhân thông tin giá

        // cập nhật lại giỏ hàng
        $this->totalQuanty += $this->items[$id]['quanty']; // tổng số lượng = tổng số lượng hiện tại +  tổng số lượng đã cập nhật
        $this->totalPrice += $this->items[$id]['price']; // tổng tiền = tổng tiền hiện tại +  tổng tiền đã cập nhật
    }
}
?>
