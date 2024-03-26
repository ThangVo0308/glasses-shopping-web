<?php
require_once("../../../BE/BUS/orderItemBUS.php");
require_once("../../../BE/BUS/productBUS.php");
if (isset($_GET['data'])) {
    $id = $_GET['data'];
}
$orderItemList = orderItemBUS::getInstance()->getorderItemByOrderId($id);
?>


<div class="modalPlus" id="modalPlus">
    <div class="modalContainer">

        <div class="wc-box">
            <div class="close" id="closeButton"></div>
        </div>

        <header class="modal-header">
            <div class="modal-param">
                Chi tiết hóa đơn
            </div>
        </header>

        <div class="header section-history">
            <div class="item">
                <span>Mã sản phẩm</span>
                <span>Mã hóa đơn</span>
                <span>Sản phẩm</span>
                <span>Hình ảnh</span>
                <span>Số lượng</span>
                <span>Số tiền</span>
            </div>
        </div>
        <div id="products">
            <div id="products">
                <?php foreach ($orderItemList as $orderItem) : ?>
                    <div class="product section">
                        <div class="item">
                            <span><?php echo $orderItem['product_id']; ?></span>
                            <span class="order"><?php echo $orderItem['order_id']; ?></span>
                            <span id="product"><?php echo productBUS::getInstance()->getProductById($orderItem['product_id'])['name'] ?></span>
                            <?php
                            echo "<img src='../../../../images/" . productBUS::getInstance()->getProductById($orderItem['product_id'])['image'] . "' alt='' class='image'>";
                            ?>
                            <span class="quantity"><?php echo $orderItem['quantity']; ?></span>
                            <span class="price"><?php echo number_format($orderItem['price']); ?></span>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <link rel="stylesheet" href="../../css/detailsHistory.css">

    <script>
        var detailsIframe = parent.document.getElementById('details-history');
        var detailsForm = document.getElementById('modalPlus');
        window.onclick = function(e) {
            if (e.target == detailsForm.parentElement) {
                detailsIframe.style.display = 'none';
            }
        }
        var closeButton = document.getElementById('closeButton');

        closeButton.onclick = function(e) {
            if (e.target == closeButton) {
                detailsIframe.style.display = 'none';
            }
        }
    </script>

    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>