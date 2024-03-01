
<?php
    $product = json_decode($_GET['data'], true);
?>

<div id="product-detail" >
    <img src="../../../images/products/productDemo.png" alt="">
    <div id="infor">
        <h3 id="name-product"><?php echo $product['name']; ?></h3>
        <span id="id-product" >Mã sản phẩm: NBA-2001</span>
        <div>
            <span id="price">100.000 đ</span>
            <span id="price-real">500.000 đ</span>
        </div>
        <span id="discout-time" >Giá tiền được áp dụng từ ngày 20/2 đến 22/2</span>
        <textarea name="" id="" cols="30" rows="10">Chất lượng đỉnh cao</textarea>
        <div class="quantity-form" >
            <button id="decrease">-</button>
            <input id="quantity" type="text" value="5">
            <button id="increase">+</button>
            <img src="../../../icons/tick.png" alt="">
            <span class="status" >Còn 5 sản phẩm</span>
        </div>
        <div>
            <button>Hủy</button>
            <button>Thêm vào giỏ hàng</button>
        </div>
    </div>
    <link rel="stylesheet" href="../../css/productStyle/productDetail.css">
</div>
<script>
    var productDetailIframe = parent.document.getElementById('product-detail');
    var productDetailForm =document.getElementById('product-detail');
    window.onclick =function(e) {
        if(e.target==productDetailForm.parentElement){
            productDetailIframe.style.display='none';
        }
    }
</script>
<script src="../../controller/product/productDetail.js"></script>