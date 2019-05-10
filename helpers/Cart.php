<?php
class Cart{
	public $items = []; 
	public $totalQty = 0;	 
	public $totalPrice = 0;
	public $promtPrice = 0; 
	public function __construct($oldCart=null){
		if($oldCart){
			$this->items = $oldCart->items;
			$this->totalQty = $oldCart->totalQty;
			$this->totalPrice = $oldCart->totalPrice;
			$this->promtPrice = $oldCart->promtPrice;
		}
	}
	
	public function add($item, $qty=1){ 
		if($item->promotion_price == 0){
			$item->promotion_price = $item->price;
		}
		$giohang = [
			'qty'=> 0, 
			'price' => $item->price, 
			'promotionPrice'=>$item->promotion_price, 
			'item' => $item
		]; 
		
		if($this->items){
			if(array_key_exists($item->id, $this->items)){
				$giohang = $this->items[$item->id];
			}
        }
        
		$giohang['qty'] =  $giohang['qty'] + $qty;
		$giohang['price'] = $item->price * $giohang['qty'];
		$giohang['promotionPrice'] = $item->promotion_price * $giohang['qty'];
		$this->items[$item->id] = $giohang;
		
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
    
	//xóa 1 so luong
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