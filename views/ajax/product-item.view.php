<?php foreach($data as $p):?>
<li class="item col-lg-4 col-md-4 col-sm-6 col-xs-6 ">
    <div class="product-item">
        <div class="item-inner">
            <div class="product-thumbnail">
                <div class="pr-img-area">
                    <a title="<?=$p->name?>" href="<?=$p->url?>-<?=$p->id?>.html">
                        <figure>
                            <img height="200px" class="first-img" src="public/products/<?=$p->image?>" alt="<?=$p->name?>">
                            <img height="200px" class="hover-img" src="public/products/<?=$p->image?>" alt="<?=$p->name?>">
                        </figure>
                    </a>
                    <button type="button" class="add-to-cart-mt">
                        <i class="fa fa-shopping-cart"></i>
                        <span> Chọn Mua</span>
                    </button>
                </div>
            </div>
            <div class="item-info">
                <div class="info-inner">
                    <div class="item-title">
                        <a title="<?=$p->name?>" href="<?=$p->url?>-<?=$p->id?>.html"><?=$p->name?> </a>
                    </div>
                    <div class="item-content">
                        <div class="item-price">
                            <div class="price-box">
                                <p class="special-price">
                                    <span class="price">
                                    <?=number_format($p->price)?> vnd
                                    </span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</li>
<?php endforeach?>
