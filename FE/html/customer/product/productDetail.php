<?php
require_once("../../../../BE/BUS/discountBUS.php");
require_once("../../../../BE/BUS/discountItemBUS.php");
require_once("../../../../BE/BUS/productBUS.php");

session_start();

if (isset($_GET['data'])) {
    $product = json_decode($_GET['data'], true);
} else {
    $product = array(); 
}

if (!isset($_SESSION['currentUser'])) {
    $_SESSION['currentUser'] = array();
}

require_once("../../../../BE/BUS/productBUS.php");
require_once("../../../../BE/BUS/discountItemBUS.php");
require_once("../../../../BE/BUS/discountBUS.php");

$discountModel = null;

$listDiscountItem = discountItemBUS::getInstance()->getdiscountItemByProductId($product['id']);
foreach ($listDiscountItem as $item) {
    $discount = discountBUS::getInstance()->getdiscountById($item['discount_id']);
    if(strtotime($discount['end_day']) <= Date('Y-m-d HH:mm:ss')) {
        $discountModel = discountBUS::getInstance()->getdiscountById($item['discount_id']);
    }
}
?>

<div id="product-detail">
    <?php 
        echo "<img src='../../../../images/" .$product['image']. "' alt=''>";
    ?>
    <div id="infor">
        <h3 id="name-product"><?php echo $product['name']; ?></h3>
        <span id="id-product">Mã sản phẩm: <?php echo $product['id']; ?></span>
        <div>
            <?php
            $tong = 0;
            $productList = productBUS::getInstance()->getAllProduct();
            $discountItemList = discountItemBUS::getInstance()->getAlldiscountItem();
            $discountList = discountBUS::getInstance()->getAlldiscount();
            $currentDate = date('Y-m-d');

            $discountedPrice = null;
            $discountAmount = null;
            $discountID = null;

            foreach ($discountItemList as $discountItem) {
                foreach ($discountList as $discount) {
                    if (
                        $product['id'] == $discountItem['product_id'] && $discountItem['discount_id'] == $discount['id']
                        && $currentDate >= $discount['start_day'] && $currentDate <= $discount['end_day']
                    ) {
                        $discountID = $discount['id'];
                        $discountAmount = ($discount['discount_percent'] / 100) * $product['price'];
                        $discountedPrice = $product['price'] - ($discount['discount_percent'] / 100) * $product['price'];
                        break 2;
                    }
                }
            }

            if ($discountedPrice !== null) {
                echo '<span id="price">' . number_format($discountedPrice, 0, ',', '.') . ' đ</span>';
                echo '<span id="price-real">' . number_format($product['price'], 0, ',', '.') . ' đ</span>';
            } else {
                echo '<span id="price-real-2">' . number_format($product['price'], 0, ',', '.') . ' đ</span>';
            }
            ?>
        </div>

        <span id="discout-time">
            <?php
            foreach ($discountItemList as $discountItem) {
                foreach ($discountList as $discount) {
                    if (
                        $product['id'] == $discountItem['product_id'] && $discountItem['discount_id'] == $discount['id']
                        && $currentDate >= $discount['start_day'] && $currentDate <= $discount['end_day']
                    ) {
                        $startDay = date_format(date_create($discount['start_day']), 'd-m-Y');
                        $endDay = date_format(date_create($discount['end_day']), 'd-m-Y');

                        echo 'Giá tiền được áp dụng giảm giá từ ngày ' . $startDay . " đến " . $endDay;
                        break 2;
                    } else {
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
            <input id="quantity" type="text" value="1">
            <button id="increase">+</button>
            <img src="../../../../icons/tick.png" alt="">
            <span class="status">
                <?php
                    if($product['quantity'] == 0) {
                        echo "Hết hàng";
                    }else {
                        echo 'Còn ' . $product['quantity'] . ' sản phẩm';
                    }


                ?>
            </span>
        </div>
        <div>
            <button>Hủy</button>
            <button id="addToCart">Thêm vào giỏ hàng</button>
        </div>
    </div>
    <link rel="stylesheet" href="../../../css/productStyle/productDetail.css">
</div>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

<script>
    var productDetailIframe = parent.document.getElementById('product-detail');
    var productDetailForm = document.getElementById('product-detail');
    var product = <?php echo json_encode( $product)?>

    var currentUser = <?php echo json_encode($_SESSION['currentUser']); ?>;

    window.onclick = function(e) {
        if (e.target == productDetailForm.parentElement) {
            productDetailIframe.style.display = 'none';
        }
    }

    var decreaseBtn = document.getElementById('decrease');
    var increaseBtn = document.getElementById('increase');
    var quantityValue = document.getElementById('quantity');
    var addToCartBtn = document.getElementById('addToCart');

    decreaseBtn.addEventListener('click', () => {
        if (quantityValue.value - 1 === 0) {
            quantityValue.value = parseInt(1);
        } else {
            quantityValue.value--;
        }
        quantityValue.innerText = quantityValue.value;
    })

    increaseBtn.addEventListener('click', () => {
        var quantity = <?php echo $product['quantity'] ?>;
        if (quantityValue.value == parseInt(quantity)) {
            quantityValue.value = parseInt(quantity);
        } else {
            quantityValue.value++;
        }
        quantityValue.innerText = quantityValue.value;
    })
    if (!Array.isArray(currentUser) && currentUser.length !== 0) {

        $(document).ready(function() {
            addToCartBtn.addEventListener('click', () => {
                var checkName = <?php echo json_encode($product['name'])?>;
                var productList = <?php echo empty($_SESSION['productList']) ? '[]' : json_encode($_SESSION['productList']); ?>;
                var success = 0;
                if(product['quantity'] == 0){
                    alert('Sản phẩm đã hết hàng');
                    success = 1;
                }
                else{
                    productList.forEach((product) => {
                        if (checkName.localeCompare(product['product']['name']) === 0) {
                            alert('Sản phẩm đã có trong giỏ hàng');
                            success = 1;
                        }
                    })
                }

                if(success == 0){
                    var data = {
                        product: <?php echo json_encode($product)?>,
                        quantity: quantityValue.value,
                        discount : <?php echo json_encode($discountModel)?>,
                    }
    
                    $.ajax({
                        type: 'POST',
                        url: '../cart/cart.php',
                        data: data,
                    });
                    productDetailIframe.style.display = 'none';
                }


            });
        })
    } else {
        addToCartBtn.addEventListener('click', () => {

            alert('Vui lòng đăng nhập để mua hàng')
        });
    }
</script>
