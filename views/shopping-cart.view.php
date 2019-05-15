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
              <?php if($data['cart']->totalQty==0):?>
                <p class="text-center">Giỏ hàng rỗng, vui lòng mua hàng</p>
                <div class="cart_navigation" style="text-align: center;"> <a class="continue-btn" href="#"><i class="fa fa-arrow-left"> </i>&nbsp; Tiếp tục mua hàng</a>

              <?php else:  ?>
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
                      foreach($data['cart']->items as $idProduct => $product):?>
                      <tr 
                      class="product-info-<?=$idProduct?>">
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

                        <td class="action">
                          <a data-id="<?=$idProduct?>">
                            <i class="icon-close"></i>
                          </a>
                        </td>
                      </tr>
                      <?php endforeach?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <td colspan="2" rowspan="3"></td>
                        <td colspan="3">Tổng tiền</td>
                        <td colspan="2" class="totalPrice" ><?=number_format($data['cart']->totalPrice)?></td>
                      </tr>
                      <tr>
                        <td colspan="3">Giảm giá</td>
                        <td colspan="2" class="selloff"><?=number_format($data['cart']->promtPrice-$data['cart']->totalPrice)?></td>
                      </tr>
                      <tr>
                        <td colspan="3"><strong>Tổng tiền thanh toán</strong></td>
                        <td colspan="2" class="promtPrice"><strong><?=number_format($data['cart']->promtPrice)?></strong></td>
                      </tr>
                    </tfoot>
                  </table>
                </div>
              
                <div class="cart_navigation"> <a class="continue-btn" href="#"><i class="fa fa-arrow-left"> </i>&nbsp; Tiếp tục mua sắm</a> 
                <a class="checkout-btn" href="#"><i class="fa fa-check"></i> Thanh toán</a> 
              <?php endif?>
            </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <script>
    $('.action a').click(function(){
        var idProduct = $(this).attr('data-id')
        $.ajax({
          url: 'cart.php',
          type: 'POST',
          data: {
            id: idProduct,
            action: 'delete'
          },
          dataType: 'JSON',
          success: function(res){
            if(res.error==1) alert(res.message)
            else{
              // console.log(res)
              $('.totalPrice').text(res.data.totalPrice)
              $('.selloff').text(res.data.sellOff)
              $('.promtPrice').html("<b style='color:#ff6e1f'>"+res.data.promtPrice+"</b>")
              $('.product-info-'+idProduct).hide(500)
            }
          }
        })
    })
  </script>