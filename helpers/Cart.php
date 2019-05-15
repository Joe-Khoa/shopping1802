<?php
class Cart{

	public $items = []; // all products in cart
	public $totalQty = 0;	 // tong so luong
	public $totalPrice = 0; // 200 => 0 
	public $promtPrice = 0;	// 200

	public function __construct($oldCart=null){
		if($oldCart!=null){
			$this->items = $oldCart->items;
			$this->totalQty = $oldCart->totalQty;
			$this->totalPrice = $oldCart->totalPrice;
			$this->promtPrice = $oldCart->promtPrice;
		}
	}

	public function add($product, $qty=1){
		if($product->promotion_price == 0){
			$product->promotion_price = $product->price;
		}
		$giohang = [
			'qty'=> 0, 
			'price' => 0, 
			'promotionPrice'=>0, 
			'item' => $product
		]; 
		if($this->items){
			if(array_key_exists($product->id, $this->items)){
				$giohang = $this->items[$product->id];
			}
    }
        
		$giohang['qty'] =  $giohang['qty'] + $qty;
		$giohang['price'] = $product->price * $giohang['qty'];
		$giohang['promotionPrice'] = $product->promotion_price * $giohang['qty'];
		$this->items[$product->id] = $giohang;
		
		$this->totalQty = $this->totalQty + $qty;
		$this->totalPrice = $this->totalPrice + $qty*$giohang['item']->price;
		$this->promtPrice = $this->promtPrice + $qty*$giohang['item']->promotion_price;
	}
	
	//update
	public function update($item, $qty=1){
		if($item->promotion_price == 0){
			$item->promotion_price = $item->price;
		}
		$giohang = [
			'qty'=>$qty, 
			'price' => $item->price*$qty, 
			'promotionPrice'=>$item->promotion_price * $qty, 
			'item' => $item
		];
		$id = $item->id;
		if($this->items){
			if(array_key_exists($id, $this->items)){
				$this->totalPrice -= $this->items[$id]['price'];
				$this->promtPrice -= $this->items[$id]['promotionPrice'];
				$this->totalQty -= $this->items[$id]['qty'];
			}
		}
		$giohang['price'] = $item->price * $giohang['qty'];
		$giohang['promotionPrice'] = $item->promotion_price * $giohang['qty'];
		$this->items[$id] = $giohang;
		$this->totalQty = $this->totalQty + $qty;
		$this->totalPrice = $this->totalPrice + $giohang['price'];
		$this->promtPrice = $this->promtPrice + $giohang['promotionPrice'];
  }
		
		
	//giam so luong mua di 1
	public function reduceByOne($id){ 
		$this->items[$id]['qty']--;
		$this->items[$id]['price'] -= $this->items[$id]['item']->price;
		$this->items[$id]['promotionPrice'] -= $this->items[$id]['item']->promotion_price;
		$this->totalQty--;
		$this->totalPrice = ($this->totalPrice - $this->items[$id]['item']->price);
		$this->promtPrice = ($this->promtPrice - $this->items[$id]['item']->promotion_price);
		
		if($this->items[$id]['qty']<=0){
			unset($this->items[$id]);
		}
	}
	
	//xóa sản phẩm khỏi cart
	public function removeItem($id){
		$this->totalQty -= $this->items[$id]['qty'];
		$this->totalPrice -= $this->items[$id]['price'];
		$this->promtPrice -= $this->items[$id]['promotionPrice'];		
		unset($this->items[$id]);
	}
	
	
}
?>