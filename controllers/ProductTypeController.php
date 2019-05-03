<?php
require_once 'Controller.php';
require_once 'models/ProductTypeModel.php';

class ProductTypeController extends Controller{
    function loadProductType(){
        if(!isset($_GET['url'])){
            header('Location:home'); // home ~ index.php
            return;
        }
        $model = new ProductTypeModel;
        $url = $_GET['url'];
        $type = $model->getProductTypeByUrl($url);
        if($type){
            $title = $type->name;
            $leftCategories = $model->getCategoriesWithProductCount();

            // $page = 1;
            // if(isset($_GET['page'])){
            //     $page = $_GET['page'];
            // }
            $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
            $quantity = 9;
            $position = ($page-1)*$quantity;
            $productByType = $model->getProductByType($type->id,$position,$quantity); 
            // print_r($productByType);die;
            
            $data = [
                'leftCategories'=>$leftCategories,
                'productByType'=>$productByType,
                'title'=>$title
            ];
            return parent::loadView('product-type',$title,$data);
        }
        else{
            header('Location:404.html');
            return;
        }

        
        
    }
}


/**
 * tongsp      = 350
 * sp/trang    = 10
 * => tong so trang = ceil(35/10) = 35
 * 
 * tranghientai      = 14 = x
 * sotranghienthi    = 11 = y
 * 
 * 
 * trang dau tien       = 9 = 14 - (11-1)/2 = x - (y-1)/2
 * trang cuoi           = 19 = x + (y-1)/2 = 9 + 11-1
 */


// 14 = (9+19)/2
// 14 = (9+9+11-1)/2
// => 14.2 = 2.9 + (11-1)
// => 9 = (14.2-(11-1))/2 = 14 - (11-1)/2
// 19 = 14 + (11-1)/2
?>