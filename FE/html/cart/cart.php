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
    ['id' => '03', 'name' => 'Sản phẩm 1', 'price' => '300000', 'image' => 'productDemo.png', 'quantity' => '4'],
    ['id' => '04', 'name' => 'Sản phẩm 1', 'price' => '400000', 'image' => 'productDemo.png', 'quantity' => '4'],
    ['id' => '05', 'name' => 'Sản phẩm 1', 'price' => '500000', 'image' => 'productDemo.png', 'quantity' => '4'],
    ['id' => '06', 'name' => 'Sản phẩm 1', 'price' => '600000', 'image' => 'productDemo.png', 'quantity' => '4'],
    ['id' => '07', 'name' => 'Sản phẩm 1', 'price' => '700000', 'image' => 'productDemo.png', 'quantity' => '4'],
    ['id' => '08', 'name' => 'Sản phẩm 1', 'price' => '800000000', 'image' => 'productDemo.png', 'quantity' => '4'],
];
?>

<body>
    <iframe src="../path.php" frameborder="0" id="path"></iframe>
    <div id="cart">
        <div class="title section">
            <img src="https://deo.shopeemobile.com/shopee/shopee-pcmall-live-sg/cart/d9e992985b18d96aab90.png" alt="">
            <span>Sản phẩm chất lượng, giao hàng cấp tốc đó là những gì cửa hàng này không có</span>
        </div>
        <div class="header section">
            <div>
                <input type="checkbox" name="" id="allChecked">
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
        <div>

        </div>
        <div>

        </div>
    </div>
</body>
<link rel="stylesheet" href="../../css/cart/cart.css">

</html>
