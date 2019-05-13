<?php //print_r($data['cart']->items);die;?>
<!-- Main Container -->
 <section class="main-container col1-layout">
    <div class="main container">
      <div class="col-main">
        <div class="cart">
          
          <div class="page-content page-order"><div class="page-title">
            <h2>Shopping Cart</h2>
          </div>
            
            
            <div class="order-detail-content">
              <div class="table-responsive">
                <table class="table table-bordered cart_summary">
                  <thead>
                    <tr>
                      <th class="cart_product">Product</th>
                      <th>Name</th>
                      <th>Unit price</th>
                      <th>Qty</th>
                      <th>Total</th>
                      <th  class="action"><i class="fa fa-trash-o"></i></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                    foreach($data['cart']->items as $product):?>
                    <tr>
                      <td class="cart_product"><a href="#"><img src="public/products/<?=$product['item']->image?>" alt="Product"></a></td>
                      <td class="cart_description"><p class="product-name"><a href="#">
                        <?=$product['item']->name?>
                      </a></p>
                      <td class="price"><span>
                        <?php
                          if($product['item']->price == $product['item']->promotion_price)
                          echo number_format($product['item']->price);
                          else 
                          {
                            echo '<del style="color:#000" >'.number_format($product['item']->price).'</del>';
                            echo '<br>';
                            echo number_format($product['item']->promotion_price);
                          }
                        ?>
                      </span></td>
                      <td class="qty"><input class="form-control input-sm" type="text" value="<?=$product['qty']?>"></td>
                      <td class="price"><span>
                        <?=number_format($product['promotionPrice'])?>
                      </span></td>
                      <td class="action"><a href="#"><i class="icon-close"></i></a></td>
                    </tr>
                    <?php endforeach?>
                  </tbody>
                  <tfoot>
                    <tr>
                      <td colspan="2" rowspan="3"></td>
                      <td colspan="3">Price</td>
                      <td colspan="2"><?=number_format($data['cart']->totalPrice)?></td>
                    </tr>
                    <tr>
                      <td colspan="3">Off</td>
                      <td colspan="2">-<?=number_format($data['cart']->totalPrice-$data['cart']->promtPrice)?></td>
                    </tr>
                    <tr>
                      <td colspan="3"><strong>Promotion price</strong></td>
                      <td colspan="2"><strong><?=number_format($data['cart']->promtPrice)?></strong></td>
                    </tr>
                  </tfoot>
                </table>
              </div>
              <div class="cart_navigation"> <a class="continue-btn" href="#"><i class="fa fa-arrow-left"> </i>&nbsp; Continue shopping</a> <a class="checkout-btn" href="#"><i class="fa fa-check"></i> Proceed to checkout</a> </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>