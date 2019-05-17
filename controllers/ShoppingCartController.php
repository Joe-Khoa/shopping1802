<?php
require_once 'Controller.php';
require_once 'models/ShoppingCartModel.php';
require_once 'helpers/Cart.php';
// session_start();

class ShoppingCartController extends Controller{
    function getShoppingCartView(){
        $oldCart = isset($_SESSION['cart']) ? $_SESSION['cart'] : null;
        $cart = new Cart($oldCart);
        $data = [ 'cart' => $cart ];
        return parent::loadView('shopping-cart', 'Giỏ hàng',$data);
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
    function deleteCart($id){
        if(isset($_SESSION['cart']) && $_SESSION['cart']->totalQty > 0){
            $oldCart = $_SESSION['cart'];
            //kiem tra id co exist trong cart
            if(array_key_exists($id, $oldCart->items)){
                $cart = new Cart($oldCart);
                $cart->removeItem($id);
                $_SESSION['cart'] = $cart;
                $r = [
                    'error'=> 0,
                    'data'=> [
                        'totalPrice'=> number_format($cart->totalPrice),
                        'promtPrice'=> number_format($cart->promtPrice),
                        'sellOff'=> number_format($cart->promtPrice-$cart->totalPrice),
                        'cart'=>$cart
                    ],
                    'message'=>'Deleted!'
                ];
                echo json_encode($r);
            }
            else{
                $r = [
                    'error'=> 1,
                    'data'=> null,
                    'message'=>'Cannot find id product'
                ];
                echo json_encode($r);
            }
        }
        else{
            $r = [
                'error'=> 1,
                'data'=> null,
                'message'=>'Cannot delete (Cart is empty)'
            ];
            echo json_encode($r);
        }
    }
    function updateCart($id, $qty){
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
        $oldCart = isset($_SESSION['cart']) ? $_SESSION['cart'] : null;
        $cart = new Cart($oldCart);
        $cart->update($product, $qty);
        $_SESSION['cart'] = $cart;
        $r = [
            'error'=> 0,
            'data'=> [
                'itemUpdate'=>number_format($cart->items[$id]['promotionPrice']),
                'totalPrice'=> number_format($cart->totalPrice),
                'promtPrice'=> number_format($cart->promtPrice),
                'sellOff'=> number_format($cart->promtPrice-$cart->totalPrice),
                'cart'=>$cart
            ],
            'message'=>'Success!'
        ];
        echo json_encode($r);
    }
}

?>