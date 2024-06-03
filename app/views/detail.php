<?php
    extract($data['spct']);
?>
<div class="main-wrapper">
    <div class="new-arrivals">
        <div class="new-arrivals__listproduct">
            <div class="new-arrivals__listproduct-product">
                <div class="product-img">
                    <img src="../public/img/product_<?php echo $image ?>" alt="">
                </div>
                <div class="product-name">
                    <p><?php echo $name ?></p>
                </div>
                <div class="product-purchases">
                    <p>Purchases: <?php echo $purchases ?></p>
                </div>
                <div class="product-price">
                    <span>$<?php echo $price ?></span>
                </div>
            </div>
        </div>
    </div>
</div>