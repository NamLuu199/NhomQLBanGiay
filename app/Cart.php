<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    public $products; // danh sản phẩm
    public $totalPrice = 0; // Tổng tiền
    public $totalQuanty = 0; // tổng sô SP
    public $discount = 0; // giá giảm
    public $coupon; // Mã giảm giá
    public $coupon_id;
    public $message = false;
    public function __construct($cart)
    {
        parent::__construct();
        if($cart){
            $this->products = $cart->products;
            $this->totalPrice = $cart->totalPrice;
            $this->totalQuanty = $cart->totalQuanty;
            $this->discount = $cart->discount;
            $this->coupon = $cart->coupon;
            $this->coupon_id = $cart->coupon_id;
            $this->message = false;
        }
    }

     // Thêm sản phẩm vào giỏ hàng
    public function AddCart($product,$id,$qty){
        $newProduct = [
            'quanty' => 0,
            'price' => empty($product->sale) ? $product->price : $product->sale,
            'productInfo' => $product,
        ];

        if ($this->products){
            if (array_key_exists($id, $this->products)) { // kiểm tra key có trong mảng
                $newProduct = $this->products[$id];
            }
        }

        $newProduct['quanty'] += $qty;
        if($newProduct['quanty'] <= $product->stock)
        {
            $newProduct['price'] = $newProduct['quanty'] * (empty($product->sale) ? $product->price : $product->sale);
            $this->products[$id] = $newProduct;
            $this->totalQuanty +=  $qty;
            $this->totalPrice +=  (empty($product->sale) ? $product->price : $product->sale) * $qty; // tong gia
            $this->message = false;
        }else{
            $this->message = true;
        }


    }
    // xóa giỏ hàng
    public function DeleteItemCart($id){
        $this->totalQuanty -= $this->products[$id]['quanty'];
        $this->totalPrice -= $this->products[$id]['price'];
        unset($this->products[$id]);
    }

    // Cập nhật giỏ hàng
    public function UpdateItemCart($id , $quanty)
    {
        if($quanty == 0)
        {
            $this->totalQuanty -= $this->products[$id]['quanty'];
            $this->totalPrice -= $this->products[$id]['price'];
            unset($this->products[$id]);
        }else
        {
            if($quanty <= $this->products[$id]['productInfo']->stock)
            {
                // Xóa số lượng + giá của thằng hiện tại để cập nhật lại
                $this->totalQuanty -= $this->products[$id]['quanty'];
                $this->totalPrice -= $this->products[$id]['price'];

                // Cập nhật số lượng && giá của sẩn phẩm
                $this->products[$id]['quanty'] = $quanty;
                $this->products[$id]['price'] = $quanty * (empty($this->products[$id]['productInfo']->sale) ? $this->products[$id]['productInfo']->price : $this->products[$id]['productInfo']->sale);

                // cập nhật lại giỏ hàng
                $this->totalQuanty +=  $this->products[$id]['quanty'];
                $this->totalPrice += $this->products[$id]['price'];
            }
        }



    }


}
