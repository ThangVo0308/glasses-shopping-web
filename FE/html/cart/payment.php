<?php
$productList = json_decode($_GET['data'], true);

$total = 0;

foreach ($productList as $product) {
    $total += intval(str_replace('.', '', $product['discountPrice'])) * $product['quantity'];
}
?>
<div id="paymentForm">
    <h3>Xác nhận thanh toán</h3>
    <div class="section" id="header">
        <div class="name-product">
            <span>Tên sản phẩm</span>
        </div>
        <div class="item">
            <span>Số lượng</span>
            <span>Giá tiền</span>
            <span>Tổng</span>
        </div>
    </div>
    <div id="products">
        <?php foreach ($productList as $product) : ?>
            <div class="product section">
                <div class="name-product">
                    <span id="name"><?php echo $product['name']; ?></span>
                </div>
                <div class="item">
                    <span id="quantity"><?php echo $product['quantity']; ?></span>
                    <div>
                        <span id="price"><?php echo $product['currentPrice'] ?></span>
                        <span id="price-real"><?php echo $product['discountPrice']; ?> đ</span>
                    </div>
                    <span id="total"><?php echo number_format(intval(str_replace('.', '', $product['discountPrice'])) * $product['quantity']); ?> đ</span>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <div class="total">
        <span>Tổng thanh toán:</span>
        <div>
            <span><?php echo number_format($total); ?> đ</span>
            <span id="valueReal"><?php echo number_format($total); ?> đ</span>
        </div>
    </div>
    <div class="buttons">
        <button id="btnExit">Hủy</button>
        <button id="btnPay">Thanh toán</button>
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

    var exitBtn = document.getElementById('btnExit');
    exitBtn.addEventListener('click',() => {

    })
</script>