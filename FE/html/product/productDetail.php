
<?php
    $product = json_decode($_GET['data'], true);
?>

<div id="product-detail">
    <img src="../../../images/logo.png" alt="">
    <div id="infor">
        <h3 id="name-product"><?php echo $product['name']; ?></h3>
        <div>
            <span id="price">100.000</span>
            <span id="price-real">500.000</span>
        </div>
        <span>Trạng thái: còn hàng</span>
        <span>Giới tính: none</span>
        <textarea name="" id="" cols="30" rows="10">Chất lượng đỉnh cao</textarea>
    </div>
    <link rel="stylesheet" href="../../css/productStyle/productDetail.css">
</div>
<script src="../../controller/product/productDetail.js"></script>