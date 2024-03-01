<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ Hàng</title>
</head>

<?php
$productList = [
    ['id' => '01', 'name' => 'Sản phẩm 1', 'price' => '1000000', 'image' => 'productDemo.png', 'quantity' => '4'],
    ['id' => '02', 'name' => 'Sản phẩm 1', 'price' => '200000', 'image' => 'productDemo.png', 'quantity' => '4'],
    ['id' => '02', 'name' => 'Sản phẩm 1', 'price' => '200000', 'image' => 'productDemo.png', 'quantity' => '4'],
    ['id' => '02', 'name' => 'Sản phẩm 1', 'price' => '200000', 'image' => 'productDemo.png', 'quantity' => '4'],
    ['id' => '02', 'name' => 'Sản phẩm 1', 'price' => '200000', 'image' => 'productDemo.png', 'quantity' => '4'],
    ['id' => '02', 'name' => 'Sản phẩm 1', 'price' => '200000', 'image' => 'productDemo.png', 'quantity' => '4'],
    ['id' => '02', 'name' => 'Sản phẩm 1', 'price' => '200000', 'image' => 'productDemo.png', 'quantity' => '4'],
];
?>

<body>
    <iframe src="../path.php" frameborder="0" id="pathCart"></iframe>
    <div id="cart">
        <div class="title section">
            <img src="https://deo.shopeemobile.com/shopee/shopee-pcmall-live-sg/cart/d9e992985b18d96aab90.png" alt="">
            <span>Sản phẩm chất lượng, giao hàng cấp tốc đó là những gì cửa hàng này không có</span>
        </div>
        <div class="header section">
            <div>
                <input type="checkbox" name="allChecked" id="allChecked">
                <span>Tên sản phẩm</span>
            </div>
            <div class="item">
                <span>Đơn giá</span>
                <span>Số lượng</span>
                <span>Số tiền</span>
                <span>Thao tác</span>
            </div>
        </div>
        <div id="products">
            <?php foreach ($productList as $product) : ?>
                <div class="product section">
                    <div>
                        <input type="checkbox" name="checked" id="">
                        <span><?php echo $product['name']; ?></span>
                        <img src="../../../images/products/<?php echo $product['image']; ?>" alt="">
                    </div>
                    <div class="item">
                        <span><?php echo number_format(intval($product['price'])); ?></span>
                        <div>
                            <button id="decrease">-</button>
                            <input id="quantity" type="text" value="<?php echo $product['quantity']; ?>">
                            <button id="increase">+</button>
                        </div>
                        <?php
                        $totalPrice = intval(str_replace('.', '', $product['price'])) * intval($product['quantity']);
                        ?>
                        <span id="totalPrice"><?php echo number_format($totalPrice); ?></span>
                        <span id="deleteBtn">Xóa</span>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>
    </div>
    <div id="statistical" >
        <img class="pinImage" src="../../../icons/pin.png" alt="">
        <div id="voucherForm" >
            <img src="../../../icons/coupon.png" alt="">
            <span id="selectStatus" >Bạn chưa chọn sản phẩm</span>
            <span id="valueVoucher" >0đ</span>
        </div>
        <div id="payForm" >
            <div class="pay">
                <span>Tổng thanh toán</span>
                <h3 id="valuePay" >0</h3>
                <button id="payBtn" >Thanh Toán</button>
            </div>
        </div>
    </div>
</body>
<link rel="stylesheet" href="../../css/cart/cart.css">

</html>
