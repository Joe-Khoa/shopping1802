<?php
require_once 'Controller.php';
require_once 'models/ShoppingCartModel.php';
require_once 'helpers/Cart.php';
require_once 'models/CheckoutModel.php';
require_once 'helpers/Helpers.php';
require_once 'helpers/PHPMailer/mailer.php';

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

    function postCheckout(){
        // check all input must have value
        // validators input
        $name = $_POST['txtName'];
        $email = $_POST['txtEmail'];
        $gender = $_POST['gender'];
        $address = $_POST['txtAddress'];
        $phone = $_POST['txtPhone'];
        $paymentMethod = $_POST['payment_method'];
        $note = $_POST['txtNote'];
        $model = new CheckoutModel();
        $idCustomer = $model->insertCustomer($name, $gender, $email, $phone, $address);
        if(!$idCustomer) {
            $_SESSION['error_checkout'] = "Vui lòng thử lại";
            header('Location: thanh-toan.html');
        }
        else{
            $cart = $_SESSION['cart'];
            $total = $cart->totalPrice; 
            $promtPrice = $cart->promtPrice;
            $dateOrder = date('Y-m-d',time());
            
            $token = Helpers::createTokenString();
            $tokenDate = date('Y-m-d H:i:s',time());
            $idBill = $model->insertBill($idCustomer, $dateOrder, $total, $promtPrice, $paymentMethod, $note, $token, $tokenDate);
            if(!$idBill ) {
                $_SESSION['error_checkout'] = "Vui lòng thử lại";
                header('Location: thanh-toan.html');
            }
            else{
                foreach($cart->items 
                as $idProduct => $product){
                    // insert bill detail
                    $quantity = $product['qty'];
                    $price = $product['price'];
                    $discountPrice = $product['promotionPrice'];

                    $model->insertBillDetail($idBill, $idProduct, $quantity, $price, $discountPrice);
                }
                // gui mail xac nhan don hang
                $contentMail = "<p>Dear $name,</p>
                <p>Cảm ơn bạn đã đătj hàng trên hệ thống của chúng tôi....</p>
                <p>Vui lòng nhấp vào <a href='https://www.thegioididong.com/'>liên kết sau</a> để xác nhận đơn hàng. </p>
                <p>Thank you!</p>";
                $subjectMail = "XÁC NHẬN ĐƠN HÀNG DH000$idBill";
                $mailcheck = sendMail($email, $name,$contentMail,$subjectMail);
                if($mailcheck){
                    $_SESSION['success_checkout'] = "Đặt hàng thành công, chúng tôi sẽ liên hệ với bạn sau ít phút...";
                    unset($_SESSION['cart']);
                    header('Location: thanh-toan.html');
                }
                else{
                    $_SESSION['error_checkout'] = "Vui lòng thử lại";
                    header('Location: thanh-toan.html');
                }
            }
        }
    }
}

?>