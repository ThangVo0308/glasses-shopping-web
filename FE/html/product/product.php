<?php
    $product = json_decode($_GET['data'], true);
?>

<div class="product">
    <img src="../../../images/glasses/<?php echo $product['image']; ?>" alt="" class="image">
    <h3 class="id"><?php echo $product['id']; ?></h3>
    <h3 class="name"><?php echo $product['name']; ?></h3>
    <i class="price"><?php echo number_format($product['price'],0,',','.') . ' VNĐ'?></i>
    <!-- <img class="icon" src="../../../icons/<?php echo $product['logo']; ?>" alt=""> -->

</div>
<link rel="stylesheet" href="../../css/productStyle/product.css">
<script src="../../controller/product/product.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    var productDetail = parent.document.getElementById('product-detail');
    $(document).ready(function() {
        $('.product').click(function() {
    
            productDetail.style.display = 'block';
            productDetail.src="./productDetail.php?data=<?php echo urlencode(json_encode($product)); ?>"
        });
    });
</script>