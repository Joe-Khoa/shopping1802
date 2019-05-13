<?php
require_once 'Controller.php';
require_once 'models/ShoppingCartModel.php';
require_once 'helpers/Cart.php';
// session_start();

class ShoppingCartController extends Controller{
    function getShoppingCartView(){
        return parent::loadView('shopping-cart');
    }
    function getCheckoutView(){
        return parent::loadView('checkout');
    }
    function addToCart($id){
        $model = new ShoppingCartModel;
        $product = $model->findProductById($id);
        if(!$product){
            $r = [
                'error'=> 1,
                'data'=> null,
                'message'=>'Cannot find product!'
            ];
            echo json_encode($r);
            return false;
        }
        //add to cart
        $oldCart = isset($_SESSION['cart']) ? $_SESSION['cart'] : null;
        $cart = new Cart($oldCart);
        $qty = isset($_POST['qty']) ? (int)$_POST['qty'] : 1;
        $cart->add($product,$qty);
        $_SESSION['cart'] = $cart;
        $r = [
            'error'=> 0,
            'data'=> [
                'cart'=>$cart,
                'product_name'=>$product->name
            ],
            'message'=>'Add to cart successfully!'
        ];
        echo json_encode($r);
        return true;
    }
    function deleteCart(){

    }
}
/**
 * Cart Object
(
    [items] => Array
        (
            [105] => Array
                (
                    [qty] => 2
                    [price] => 59800000
                    [promotionPrice] => 58000000
                    [item] => stdClass Object
                        (
                            [id] => 105
                            [name] => iPhone X 64GB Gray
                            [image] => d1OlStyng8-img_2425_copy_master.JPG
                            [price] => 29900000
                            [promotion_price] => 29000000
                        )

                )

            [100] => Array
                (
                    [qty] => 1
                    [price] => 39500000
                    [promotionPrice] => 39500000
                    [item] => stdClass Object
                        (
                            [id] => 100
                            [name] => MPXV2 -Macbook Pro Retina 2017 13 inch 256GB TouchBar ( Gray Space )
                            [image] => mpxv2--macbook-pro-retina-2017-13-inch-256gb-touchbar-(-gray-space-).png
                            [price] => 39500000
                            [promotion_price] => 39500000
                        )

                )

        )

    [totalQty] => 3
    [totalPrice] => 99300000
    [promtPrice] => 97500000
)

 */


?>