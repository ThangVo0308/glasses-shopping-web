<?php
// Nhận dữ liệu từ URL
$product = json_decode($_GET['data'], true);
?>
<div class="product">
    <img src="../../../images/<?php echo $product['image']; ?>" alt="" class="image">
    <h3 class="id"><?php echo $product['id']; ?></h3>
    <h3 class="name"><?php echo $product['name']; ?></h3>
    <i class="price"><?php echo $product['price']; ?></i>
    <img class="icon" src="../../../icons/<?php echo $product['logo']; ?>" alt="">
</div>

<link rel="stylesheet" href="../../css/productStyle/product.css">
<script src="../../controller/product/product.js"></script>