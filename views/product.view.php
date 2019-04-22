<!-- Main Container -->
<div class="main-container col1-layout">
      <div class="container">
        <div class="row">
          <div class="col-main">
            <div class="product-view-area">
              <div class="product-big-image col-xs-12 col-sm-5 col-lg-5 col-md-5">
                <div class="icon-sale-label sale-left">Sale</div>
                <div class="large-image">
                  <a href="public/products/<?=$data['product']->image?>" class="cloud-zoom" id="zoom1" rel="useWrapper: false, adjustY:0, adjustX:20">
                    <img width="100%" class="zoom-img" src="public/products/<?=$data['product']->image?>" alt="products"> </a>
                </div>
              </div>
              <div class="col-xs-12 col-sm-7 col-lg-7 col-md-7 product-details-area">

                <div class="product-name">
                  <h1><?=$data['product']->name?></h1>
                </div>
                <div class="price-box">
                  <?php
                  if($data['product']->promotion_price!=0):
                  ?>
                  <p class="special-price">
                    <span class="price-label">Special Price</span>
                    <span class="price"> <?=number_format($data['product']->promotion_price)?> VND</span>
                  </p>
                  <p class="old-price">
                    <span class="price-label">Regular Price:</span>
                    <span class="price"> <?=number_format($data['product']->price)?> VND </span>
                  </p>
                  <?php else:?>
                    <p class="special-price">
                      <span class="price-label">Special Price</span>
                      <span class="price"> <?=number_format($data['product']->price)?> VND </span>
                    </p>
                  <? endif?>
                </div>

                <div class="short-description">
                  <h2>Chi tiết sản phẩm</h2>
                  <div>
                    <?=$data['product']->detail;?>
                  </div>
                </div>

                <div class="product-variation">
                  <form action="#" method="post">
                    <div class="cart-plus-minus">
                      <label for="qty">Số lượng:</label>
                      <div class="numbers-row">
                        <div   class="dec qtybutton">
                          <i class="fa fa-minus">&nbsp;</i>
                        </div>
                        <input type="text" class="qty" title="Qty" value="1" maxlength="12" id="qty" name="qty">
                        <div onClick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty )) result.value++;return false;"
                          class="inc qtybutton">
                          <i class="fa fa-plus">&nbsp;</i>
                        </div>
                      </div>
                    </div>
                    <button class="button pro-add-to-cart" title="Add to Cart" type="button">
                      <span>
                        <i class="fa fa-shopping-cart"></i> Add to Cart</span>
                    </button>
                  </form>
                </div>

              </div>
            </div>
          </div>

        </div>
      </div>
    </div>

    <!-- Main Container End -->
    <!-- Related Product Slider -->
    <section class="upsell-product-area">
      <div class="container">
        <div class="row">
          <div class="col-xs-12">

            <div class="page-header">
              <h2>Related Products</h2>
            </div>
            <div class="slider-items-products">
              <div id="upsell-product-slider" class="product-flexslider hidden-buttons">
                <div class="slider-items slider-width-col4">
                  <div class="product-item">
                    <div class="item-inner fadeInUp">
                      <div class="product-thumbnail">
                        <div class="icon-sale-label sale-left">Sale</div>
                        <div class="icon-new-label new-right">New</div>
                        <div class="pr-img-area">
                          <img class="first-img" src="public/images/products/img01.jpg" alt="">
                          <img class="hover-img" src="public/images/products/img01.jpg" alt="">
                          <button type="button" class="add-to-cart-mt">
                            <i class="fa fa-shopping-cart"></i>
                            <span> Add to Cart</span>
                          </button>
                        </div>

                      </div>
                      <div class="item-info">
                        <div class="info-inner">
                          <div class="item-title">
                            <a title="Ipsums Dolors Untra" href="single_product.html">Ipsums Dolors Untra </a>
                          </div>
                          <div class="item-content">

                            <div class="item-price">
                              <div class="price-box">
                                <span class="regular-price">
                                  <span class="price">$125.00</span>
                                </span>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="product-item">
                    <div class="item-inner fadeInUp">
                      <div class="product-thumbnail">
                        <div class="pr-img-area">
                          <img class="first-img" src="public/images/products/img02.jpg" alt="">
                          <img class="hover-img" src="public/images/products/img02.jpg" alt="">
                          <button type="button" class="add-to-cart-mt">
                            <i class="fa fa-shopping-cart"></i>
                            <span> Add to Cart</span>
                          </button>
                        </div>

                      </div>
                      <div class="item-info">
                        <div class="info-inner">
                          <div class="item-title">
                            <a title="Ipsums Dolors Untra" href="single_product.html">Ipsums Dolors Untra </a>
                          </div>
                          <div class="item-content">

                            <div class="item-price">
                              <div class="price-box">
                                <p class="special-price">
                                  <span class="price-label">Special Price</span>
                                  <span class="price"> $456.00 </span>
                                </p>
                                <p class="old-price">
                                  <span class="price-label">Regular Price:</span>
                                  <span class="price"> $567.00 </span>
                                </p>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="product-item">
                    <div class="item-inner fadeInUp">
                      <div class="product-thumbnail">
                        <div class="pr-img-area">
                          <img class="first-img" src="public/images/products/img03.jpg" alt="">
                          <img class="hover-img" src="public/images/products/img03.jpg" alt="">
                          <button type="button" class="add-to-cart-mt">
                            <i class="fa fa-shopping-cart"></i>
                            <span> Add to Cart</span>
                          </button>
                        </div>
                      </div>
                      <div class="item-info">
                        <div class="info-inner">
                          <div class="item-title">
                            <a title="Ipsums Dolors Untra" href="single_product.html">Ipsums Dolors Untra </a>
                          </div>
                          <div class="item-content">

                            <div class="item-price">
                              <div class="price-box">
                                <p class="special-price">
                                  <span class="price-label">Special Price</span>
                                  <span class="price"> $456.00 </span>
                                </p>
                                <p class="old-price">
                                  <span class="price-label">Regular Price:</span>
                                  <span class="price"> $567.00 </span>
                                </p>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="product-item">
                    <div class="item-inner fadeInUp">
                      <div class="icon-sale-label sale-left">Sale</div>
                      <div class="icon-new-label new-right">New</div>
                      <div class="product-thumbnail">
                        <div class="pr-img-area">
                          <img class="first-img" src="public/images/products/img04.jpg" alt="">
                          <img class="hover-img" src="public/images/products/img04.jpg" alt="">
                          <button type="button" class="add-to-cart-mt">
                            <i class="fa fa-shopping-cart"></i>
                            <span> Add to Cart</span>
                          </button>
                        </div>

                      </div>
                      <div class="item-info">
                        <div class="info-inner">
                          <div class="item-title">
                            <a title="Ipsums Dolors Untra" href="single_product.html">Ipsums Dolors Untra </a>
                          </div>
                          <div class="item-content">

                            <div class="item-price">
                              <div class="price-box">
                                <span class="regular-price">
                                  <span class="price">$125.00</span>
                                </span>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="product-item">
                    <div class="item-inner fadeInUp">
                      <div class="product-thumbnail">
                        <div class="icon-new-label new-left">New</div>
                        <div class="pr-img-area">
                          <img class="first-img" src="public/images/products/img05.jpg" alt="">
                          <img class="hover-img" src="public/images/products/img05.jpg" alt="">
                          <button type="button" class="add-to-cart-mt">
                            <i class="fa fa-shopping-cart"></i>
                            <span> Add to Cart</span>
                          </button>
                        </div>

                      </div>
                      <div class="item-info">
                        <div class="info-inner">
                          <div class="item-title">
                            <a title="Ipsums Dolors Untra" href="single_product.html">Ipsums Dolors Untra </a>
                          </div>
                          <div class="item-content">

                            <div class="item-price">
                              <div class="price-box">
                                <p class="special-price">
                                  <span class="price-label">Special Price</span>
                                  <span class="price"> $456.00 </span>
                                </p>
                                <p class="old-price">
                                  <span class="price-label">Regular Price:</span>
                                  <span class="price"> $567.00 </span>
                                </p>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="product-item">
                    <div class="item-inner fadeInUp">
                      <div class="product-thumbnail">
                        <div class="pr-img-area">
                          <img class="first-img" src="public/images/products/img06.jpg" alt="">
                          <img class="hover-img" src="public/images/products/img06.jpg" alt="">
                          <button type="button" class="add-to-cart-mt">
                            <i class="fa fa-shopping-cart"></i>
                            <span> Add to Cart</span>
                          </button>
                        </div>

                      </div>
                      <div class="item-info">
                        <div class="info-inner">
                          <div class="item-title">
                            <a title="Ipsums Dolors Untra" href="single_product.html">Ipsums Dolors Untra </a>
                          </div>
                          <div class="item-content">

                            <div class="item-price">
                              <div class="price-box">
                                <span class="regular-price">
                                  <span class="price">$125.00</span>
                                </span>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </section>
    <!-- Related Product Slider End -->
