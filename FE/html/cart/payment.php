<?php
$productList = [
    ['id' => '01', 'name' => 'Sản phẩm 12', 'price' => '100000', 'image' => 'productDemo.png', 'logo' => 'new.gif'],
    ['id' => '02', 'name' => 'Sản phẩm 2', 'price' => '150000', 'image' => 'productDemo.png', 'logo' => 'new.gif'],
    ['id' => '03', 'name' => 'Sản phẩm 3', 'price' => '120000', 'image' => 'productDemo.png', 'logo' => 'star.gif']
];
?>
<div id="paymentForm">
    <h3>Xác nhận thanh toán</h3>
    <div id="products">
        <div class="section" id="header" >
            <div class="name-product" >
                <span>Tên sản phẩm</span>
            </div>
            <div class="item" >
                <span>Số lượng</span>
                <span>Giá tiền</span>
                <span>Tổng</span>
            </div>
        </div>
        <?php foreach ($productList as $product) : ?>
            <div class="product section" >
                <div class="name-product" >
                    <img src="../../../images/products/productDemo.png" alt="">
                    <span><?php echo $product['name']; ?></span>
                </div>
                <div class="item" >
                    <span>2</span>
                    <div>
                        <span id="price" >777775</span>
                        <span id="price-real" >7777777</span>
                    </div>
                    <span id="total" >45555</span>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<link rel="stylesheet" href="../../css/cart/payment.css">