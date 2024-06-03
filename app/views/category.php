<?php
    
    // echo '<pre>';
    // var_dump($data['category']);
    // echo '</pre>';
?>
<div class="main-wrapper">
    <div class="new-arrivals">
    <?php
    $category = $data['category'];
    foreach($category as $item){
        extract($item);
    
        echo '<div class="new-arrivals__title">';
        echo     '<p>'.$name.'</p>';
        echo '</div>';

        echo '<div class="new-arrivals__listproduct">';
            
                $product = $data['product'];
                $id_category = $id;
                foreach($product as $item){
                    extract($item);
                    if($id_category == $id_list){
                        echo '<a href="index.php?page=detail&id='.$id.'">
                                <div class="new-arrivals__listproduct-product">
                                    <div class="product-img">
                                        <img src="../public/img/product_'.$image.'" alt="">
                                    </div>
                                    <div class="product-name">
                                        <p>'.$name.'</p>
                                    </div>
                                    <div class="product-purchases">
                                        <p>Purchases: '.$purchases.'</p>
                                    </div>
                                    <div class="product-price">
                                        <span>$'.$price.'</span>
                                    </div>
                                </div>
                            </a>';
                    }                            
                }
                
            
        echo '</div>';
    }
    ?>
    </div>
    
    <div class="line-page"><hr></div>
</div>