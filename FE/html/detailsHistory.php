<?php
// $productListTest = json_encode($_GET['data'],true);
$productList1 = [
    ['id' => '01', 'name' => 'Sản phẩm 1', 'price' => '10000000', 'image' => 'productDemo.png', 'quantity' => '4'],
    ['id' => '02', 'name' => 'Sản phẩm 1', 'price' => '200000', 'image' => 'productDemo.png', 'quantity' => '4'],
    ['id' => '03', 'name' => 'Sản phẩm 1', 'price' => '200000', 'image' => 'productDemo.png', 'quantity' => '4'],
    ['id' => '04', 'name' => 'Sản phẩm 1', 'price' => '200000', 'image' => 'productDemo.png', 'quantity' => '4'],
];
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
            <div>
                <input type="checkbox" name="allChecked" id="allChecked">
                <span>Tên sản phẩm</span>
            </div>
            <div class="item">
                <span>Đơn giá</span>
                <span>Số lượng</span>
                <span>Số tiền</span>
            </div>
        </div>
        <div id="products">
            <?php foreach ($productList1 as $product) : ?>
                <div class="product section-history">
                    <div>
                        <input type="checkbox" name="checked" id="">
                        <span><?php echo $product['name']; ?></span>
                        <img src="../../../images/products/<?php echo $product['image']; ?>" alt="">
                    </div>
                    <div class="item">
                        <span><?php echo number_format(intval($product['price'])); ?> đ</span>
                        <div>
                            <input id="quantity" type="text" value="<?php echo $product['quantity']; ?>">
                        </div>
                        <?php
                        $totalPrice = intval(str_replace('.', '', $product['price'])) * intval($product['quantity']);
                        ?>
                        <span id="totalPrice"><?php echo number_format($totalPrice); ?> đ</span>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<link rel="stylesheet" href="../css/detailsHistory.css">

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
        if (e.target == closeButton.parentElement) {
            detailsIframe.style.display = 'none';
        }
    }
</script>