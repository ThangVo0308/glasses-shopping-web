<?php
$data = json_decode($_GET['data'], true);
session_start();
if (!isset($_SESSION['currentUser'])) {
    $_SESSION['currentUser'] = array();
}

$productList = $data['productList'];
$pointUsed = $data['pointUsed'];
$pointEarned = $data['pointEarned'];
$address = $data['address'];
$discount = $data['discount'];
$total = $data['total'];

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
        <?php foreach ($productList as $product) :  ?>
            <?php $discountPrice = isset($product['discout']) ? number_format(intval($product['discout'])) : 0 ?>
            <div class="product section">
                <div class="name-product">
                    <span id="name"><?php echo $product['product']['name']; ?></span>
                </div>
                <div class="item">
                    <span id="quantity"><?php echo $product['quantity']; ?></span>
                    <div>
                        <span id="price"><?php echo $discountPrice > 0 ? number_format($product['product']['price'] - $discountPrice ) : number_format($product['product']['price']) ?> đ</span>
                        <span id="price-real"><?php echo $discountPrice > 0 ? number_format($product['product']['price']).' đ' : '' ?></span>
                    </div>
                    <span id="total"><?php echo number_format($product['quantity'] * $product['product']['price']); ?> đ</span>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <div class="total">
        <span>Tổng thanh toán:</span>
        <div>
            <span><?php echo number_format($total) ?></span>
            <span id="valueReal"><?php echo $discount > 0 ? number_format($total + $discount) : '' ?></span>
        </div>
    </div>
    <div class="buttons">
        <button id="btnExit">Hủy</button>
        <button id="btnPay">Thanh toán</button>
    </div>
</div>
<link rel="stylesheet" href="../../css/cart/payment.css">
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script>
    var paymentIframe = parent.document.getElementById('payment');
    var paymentForm = document.getElementById('paymentForm');
    var exitBtn = document.getElementById('btnExit');
    var payBtn = document.getElementById('btnPay');
    var alert = parent.document.getElementById('alert');


    var currentUser = <?php echo json_encode($_SESSION['currentUser']); ?>;


    window.onclick = function(e) {
        if (e.target == paymentForm.parentElement) {
            paymentIframe.style.display = 'none';
        }
    }

    exitBtn.onclick = function() {
        paymentIframe.style.display = 'none';
    }

    var data = <?php echo json_encode($data); ?>;

    payBtn.addEventListener('click', () => {
        console.log(data);
        cartHandle('../../../main/handler/cartHandle.php', 'POST', {
            data: data,
        });
    });

    function cartHandle(url, method, data) {
        $.ajax({
            type: method,
            url: url,
            data: data,
            dataType: 'json',
            success: function(res) {
                if (res.success == true) {

                    

                } else {
                    

                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(jqXHR.responseText);
                console.error("AJAX request failed:", textStatus, errorThrown);
            }
        })
    }
</script>