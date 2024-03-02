<?php
$product = json_decode($_GET['data'], true);
?>

<div id="product-detail">
    <img src="../../../images/glasses/<?php echo $product['image']; ?>" alt="">
    <div id="infor">
        <h3 id="name-product"><?php echo $product['name']; ?></h3>
        <span id="id-product">Mã sản phẩm: <?php echo $product['id']; ?></span>
        <div>
            <?php
            require_once("../../../BE/BUS/productBUS.php");
            require_once("../../../BE/BUS/discountItemBUS.php");
            require_once("../../../BE/BUS/discountBUS.php");

            $tong = 0;
            $productList = productBUS::getInstance()->getAllProduct();
            $discountItemList = discountItemBUS::getInstance()->getAlldiscountItem();
            $discountList = discountBUS::getInstance()->getAlldiscount();
            $currentDate = date('Y-m-d');

            $discountedPrice = null;

            foreach ($discountItemList as $discountItem) {
                foreach ($discountList as $discount) {
                    if ($product['category_id'] == $discountItem['category_id'] && $discountItem['discount_id'] == $discount['id']
                        && $currentDate >= $discount['start_day'] && $currentDate <= $discount['end_day']) {

                        $discountedPrice = $product['price'] - ($discount['discount_percent'] / 100) * $product['price'];
                        break 2;
                    }
                }
            }

            if ($discountedPrice !== null) {
                echo '<span id="price">' . number_format($discountedPrice, 0, ',', '.') . ' VNĐ</span>';
                echo '<span id="price-real">' . number_format($product['price'], 0, ',', '.') . ' VNĐ</span>';
            } else {
                echo '<span id="price-real-2">' . number_format($product['price'], 0, ',', '.') . ' VNĐ</span>';
            }
            ?>
        </div>

        <span id="discout-time">
            <?php
                require_once("../../../BE/BUS/productBUS.php");
                require_once("../../../BE/BUS/discountItemBUS.php");
                require_once("../../../BE/BUS/discountBUS.php");

                foreach ($discountItemList as $discountItem) {
                    foreach ($discountList as $discount) {
                        if ($product['category_id'] == $discountItem['category_id'] && $discountItem['discount_id'] == $discount['id']
                            && $currentDate >= $discount['start_day'] && $currentDate <= $discount['end_day']
                        ) {
                            $startDay = date_format(date_create($discount['start_day']), 'd-m-Y');
                            $endDay = date_format(date_create($discount['end_day']), 'd-m-Y');

                            echo 'Giá tiền được áp dụng giảm giá từ ngày ' . $startDay . " đến " . $endDay;
                            break 2;
                        }else {
                            echo 'Sản phẩm chưa được áp dụng giảm giá';
                            break 2;
                        }
                    }
                }
            ?>
        </span>
        <textarea name="" id="" cols="30" rows="10" disabled><?php echo $product['description']; ?></textarea>
        <div class="quantity-form">
            <button id="decrease">-</button>
            <input id="quantity" type="text" value="5">
            <button id="increase">+</button>
            <img src="../../../icons/tick.png" alt="">
            <span class="status">
                <?php
                    require_once("../../../BE/BUS/productBUS.php");
                    echo 'Còn ' . $product['quantity'] . ' sản phẩm';
                ?>
            </span>
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
    var productDetailForm = document.getElementById('product-detail');
    window.onclick = function(e) {
        if (e.target == productDetailForm.parentElement) {
            productDetailIframe.style.display = 'none';
        }
    }
</script>
<script src="../../controller/product/productDetail.js"></script>