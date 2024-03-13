<?php
$productList = json_decode($_GET['data'], true);
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
            <?php
            if (isset($product['total'])) {
                echo '<span>' . number_format($product['total']) . ' đ</span>';
                echo '<span id="valueReal">' . number_format($product['total']) . ' đ</span>';
            } else {
                echo '<span>0 đ</span>';
                echo '<span id="valueReal">0 đ</span>';
            }
            ?>
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

    window.onclick = function(e) {
        if (e.target == paymentForm.parentElement) {
            paymentIframe.style.display = 'none';
        }
    }

    var productList = <?php echo json_encode($productList); ?>;

    payBtn.addEventListener('click', () => {
        var list = [];
        productList.forEach(product => {
            let hihi = {
                id: parseInt(product.id),
                name: "<?php echo isset($product['name']) ? addslashes($product['name']) : ''; ?>",
                quantity: parseInt(product.quantity),
                price: parseInt(product.discountPrice),
                totalProduct: parseInt(parseInt(product.discountPrice) * parseInt(product.quantity)),
                allTotal: parseInt(product.total),
                pointEarned: parseInt(product.pointEarned),
                pointUsed: parseInt(product.pointUsed),
                userID: parseInt(product.userID),
                address: product.address,
                name_received: product.name_received,
                phone_received: product.phone_received,
                discountID: <?php echo isset($product['discountID']) && is_numeric($product['discountID']) ? $product['discountID'] : 'null'; ?>,
            };
            list.push(JSON.stringify(hihi));
        });

        cartHandle('../../../main/handler/cartHandle.php', 'POST', {
            productList: list
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
                    alert("Thanh toán thành công");
                    window.location.replace('../../../main/index.php');
                } else {
                    alert("Thanh toán thất bại");
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(jqXHR.responseText);
                console.error("AJAX request failed:", textStatus, errorThrown);
            }
        })
    }

</script>