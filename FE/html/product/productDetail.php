<?php
session_start();
$product = json_decode($_GET['data'], true);
if (!isset($_SESSION['currentUser'])) {
    $_SESSION['currentUser'] = array();
}
require_once("../../../BE/BUS/productBUS.php");
require_once("../../../BE/BUS/discountItemBUS.php");
require_once("../../../BE/BUS/discountBUS.php");
?>

<div id="product-detail">
    <img src="../../../images/glasses/<?php echo $product['image']; ?>" alt="">
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
            <?php
            echo '<input id="quantity" type="text" value="' . $product['quantity'] . '">'
            ?>
            <button id="increase">+</button>
            <img src="../../../icons/tick.png" alt="">
            <span class="status">
                <?php
                echo 'Còn ' . $product['quantity'] . ' sản phẩm';
                ?>
            </span>
        </div>
        <div>
            <button>Hủy</button>
            <button id="addToCart">Thêm vào giỏ hàng</button>
        </div>
    </div>
    <link rel="stylesheet" href="../../css/productStyle/productDetail.css">
</div>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

<script>
    var productDetailIframe = parent.document.getElementById('product-detail');
    var productDetailForm = document.getElementById('product-detail');

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
                var idProduct = parseInt(<?php echo $product['id']; ?>);
                var checkName = "<?php echo addslashes($product['name']); ?>";
                var productList = <?php echo empty($_SESSION['productList']) ? '[]' : json_encode($_SESSION['productList']); ?>;
                var nameProduct = "<?php echo addslashes($product['name']); ?>";
                if (productList.length == 0) {
                    productList.length++;
                } else {
                    productList.forEach((product) => {
                        if (checkName.localeCompare(product.name) === 0) {
                            alert('Sản phẩm đã có trong giỏ hàng');
                            return;
                        }
                    })
                }

                var imageProduct = "<?php echo addslashes($product['image']); ?>";
                var currentPrice = parseInt(<?php echo $product['price'] ?>);
                var discountID = <?php echo (is_numeric($discountID)) ? $discountID : 'null'; ?>;
                var discountPrice = parseInt(<?php echo ($discountedPrice !== null) ? $discountedPrice : $product['price'] ?>);
                var discountAmount = parseInt(<?php echo ($discountAmount !== null) ? $discountAmount : 0 ?>)
                var firstQuantity = parseInt(<?php echo $product['quantity'] ?>);

                if (quantityValue.value == 0) {
                    alert('Sản phẩm đã hết hàng');
                    return;
                } else {
                    var quantity = parseInt(quantityValue.value);
                }

                var data = {
                    id: idProduct,
                    name: nameProduct,
                    image: imageProduct,
                    currentPrice: currentPrice,
                    discountPrice: discountPrice,
                    discountAmount: discountAmount,
                    discountID: discountID,
                    firstQuantity: firstQuantity,
                    quantity: quantity,
                }
                console.log(data);

                $.ajax({
                    type: 'POST',
                    url: '../cart/cart.php',
                    data: data,
                });
                productDetailIframe.style.display = 'none';
            });
        })
    } else {
        addToCartBtn.addEventListener('click', () => {

            alert('Vui lòng đăng nhập để mua hàng')
        });
    }
</script>
<script src="../../controller/product/productDetail.js"></script>