<?php
    $productList = json_decode($_GET['data'], true);
?>
<div id="paymentForm">
    <h3>Xác nhận thanh toán</h3>
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
    <div id="products">
        <?php foreach ($productList as $product) : ?>
            <div class="product section" >
                <div class="name-product" >
                    <!-- <img src="../../../images/products/productDemo.png" alt=""> -->
                    <span id="name" ><?php echo $product['name']; ?></span>
                </div>
                <div class="item" >
                    <span id="quantity" ><?php echo $product['quantity']; ?></span>
                    <div>
                        <span id="price" >777.7555 đ</span>
                        <span id="price-real" ><?php echo $product['price']; ?></span>
                    </div>
                    <span id="total" >45.555 đ</span>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <div class="total" >
        <span>Tổng thanh toán:</span>
        <span>3.000.000 đ</span>
    </div>
    <div class="buttons" >
        <button>Hủy</button>
        <button>Thanh toán</button>
    </div>
</div>
<link rel="stylesheet" href="../../css/cart/payment.css">
<script>
    var paymentIframe = parent.document.getElementById('payment');
    var paymentForm = document.getElementById('paymentForm');
    window.onclick = function(e) {
        if (e.target == paymentForm.parentElement) {
            paymentIframe.style.display = 'none';
        }
    }
</script>