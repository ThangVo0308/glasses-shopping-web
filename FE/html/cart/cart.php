<?php
session_start();
require_once("../../../BE/BUS/userBUS.php");
require_once("../../../BE/BUS/pointBUS.php");
require_once("../../../BE/BUS/discountBUS.php");
require_once("../../../BE/BUS/addressBUS.php");
$productList = [];

if (!isset($_SESSION['currentUser'])) {
    $_SESSION['currentUser'] = array();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST['quantity'] > 0) {
        $product = $_POST['product'];
        $quantity = $_POST['quantity'];
        $discount = $_POST['discount'];
    }

    $nameExist = false;
    foreach ($_SESSION['productList'] as $existingProduct) {
        if ($_POST['product']['name'] == $existingProduct['name']) {
            $nameExist = true;
            break;
        }
    }

    if (!$nameExist) {
        if (!isset($_SESSION['productList'])) {
            $_SESSION['productList'] = array();
        }

        $productData = [
            'product' => $product,
            'quantity' => $quantity,
            'discount' => $discount,
        ];

        $_SESSION['productList'][] = $productData;
        echo json_encode(['session' => $_SESSION['productList']]);
    }
}


if (!empty($_SESSION['productList'])) {
    $productList = $_SESSION['productList'];
}

$addressList = addressBUS::getInstance()->getAddressByUserID($_SESSION['currentUser']['id']);

if (!isset($_GET['address'])) {
    $address = $addressList[0]['id'];
} else {
    $address = json_decode($_GET['address'], true);
}
?>

<div id="cartForm">
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
                <?php $discountPrice = $product['discount'] != null ? number_format(intval($product['discount']['discount_percent'])) : 0 ?>
                <div class="product section">
                    <div>
                        <input type="checkbox" name="checked" class="checkBox" value="<?= $product['product']['id'] ?>">
                        <span><?php echo $product['product']['name']; ?></span>
                        <?php
                        echo "<img src='../../../images/" . $product['product']['image'] . "' alt=''>";
                        ?>
                    </div>
                    <div class="item">
                        <div id="valueForm">
                            <span><?php echo $discountPrice > 0 ? number_format($product['product']['price'] - ($discountPrice / 100) * $product['product']['price']) : number_format($product['product']['price']); ?></span>
                            <span id="discountPrice"><?php echo $discountPrice > 0 ? number_format($product['product']['price']) : ''; ?></span>
                        </div>
                        <div>
                            <button id="decrease" class="decrease">-</button>
                            <input id="quantity" type="text" class="quantity" value="<?php echo $product['quantity']; ?>">
                            <button id="increase" class="increase">+</button>
                        </div>
                        <?php
                        $totalPrice = intval($discountPrice > 0 ? ($product['product']['price'] - ($discountPrice / 100) * $product['product']['price']) : $product['product']['price']) * $product['quantity'];
                        ?>
                        <span class="totalPrice"><?php echo number_format($totalPrice) ?></span>
                        <span class="deleteBtn">Xóa</span>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <div id="statistical">
            <img class="pinImage" src="../../../icons/pin.png" alt="">
            <div id="addressForm">
                <div>
                    <div>
                        <img src="../../../icons/address.png" alt="">
                        <span>Địa chỉ giao hàng</span>
                    </div>
                    <div id="detail">
                        <span><?php echo userBUS::getInstance()->getUserById($_SESSION['currentUser']['id'])['name'] ?>,</span> <!-- 4: will be user_id when users login, will replace with $_SESSION['userID']-->
                        <span><?php echo userBUS::getInstance()->getUserById($_SESSION['currentUser']['id'])['phone'] ?>,</span>
                        <span id="address"><?php echo userBUS::getInstance()->getUserById($_SESSION['currentUser']['id'])['address'] ?></span>
                    </div>
                </div>
                <span id="btnChangeAddress">Thay đổi</span>
            </div>
            <div id="voucherForm">
                <img src="../../../icons/coupon.png" alt="">
                <span id="selectStatus">Bạn đã chọn 0 sản phẩm</span>
                <span id="valueVoucher">0đ</span>
            </div>
            <div id="pointForm">
                <div>
                    <input type="checkbox" id="pointCb">
                    <span>Point: <?php echo pointBUS::getInstance()->getPointByUserID($_SESSION['currentUser']['id'])['points_earned'] ?></span>
                </div>
                <span id="pointValue">0</span>
            </div>
            <div id="payForm">
                <div class="pay">
                    <span>Tổng thanh toán</span>
                    <div>
                        <h3 id="valuePay">0</h3>
                        <h3 id="valueReal"></h3>
                    </div>
                    <button id="payBtn">Thanh Toán</button>
                </div>
            </div>
        </div>
        <iframe frameborder="0" id="payment"></iframe>
    </div>
    <iframe src="./address.php" id="addressIframe" frameborder="0"></iframe>
</div>

<link rel="stylesheet" href="../../css/cart/cart.css">
<script src="../../controller/cart/cart.js"></script>

<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

<script>
    var currentUser = <?php echo json_encode($_SESSION['currentUser']['id']); ?>;
    var productList = <?php echo json_encode($_SESSION['productList']) ?>;

    var decreaseBtns = document.querySelectorAll('.decrease');
    var increaseBtns = document.querySelectorAll('.increase');
    var quantityValues = document.querySelectorAll('.quantity');
    var totalPrices = document.querySelectorAll('.totalPrice');
    var checkedBoxes = document.querySelectorAll('.checkBox');
    var allChecked = document.getElementById('allChecked');
    var allDeleteBtn = document.querySelectorAll('.deleteBtn');

    var valueReal = document.getElementById('valueReal');
    var valuePay = document.getElementById('valuePay');

    var pointValue = document.getElementById('pointValue');

    var pointCb = document.getElementById('pointCb');
    var payBtn = document.getElementById('payBtn');


    var total = 0;
    var discount = 0;
    var pointUsed = 0;
    var pointEarned = 0;
    var address = <?php echo $address ?>

    decreaseBtns.forEach((decreaseBtn, index) => {
        decreaseBtn.addEventListener('click', () => {
            var quantity = productList[index]['product']['quantity'];
            if (productList[index]['quantity'] == 1) {
                productList[index]['quantity'] = 1;
            } else {
                $.ajax({
                    type: 'POST',
                    url: '../../../main/handler/changeQuantityHandle.php',
                    data: {
                        index: index,
                        status: 'decrease'
                    },
                    dataType: 'json',
                    success: function(res) {
                        productList = res.result;
                        reload(index)

                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.log(jqXHR.responseText);
                        console.error("AJAX request failed:", textStatus, errorThrown);
                    }
                })
            }
        });
    });
    increaseBtns.forEach((increaseBtns, index) => {
        increaseBtns.addEventListener('click', () => {
            var quantity = productList[index]['product']['quantity'];
            if (productList[index]['quantity'] == parseInt(quantity)) {
                productList[index]['quantity'] = parseInt(quantity);
            } else {
                $.ajax({
                    type: 'POST',
                    url: '../../../main/handler/changeQuantityHandle.php',
                    data: {
                        index: index,
                        status: 'increase'
                    },
                    dataType: 'json',
                    success: function(res) {
                        productList = res.result;
                        reload(index)

                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.log(jqXHR.responseText);
                        console.error("AJAX request failed:", textStatus, errorThrown);
                    }
                })
            }



        });
    });

    checkedBoxes.forEach((checkBox, index) => {
        checkBox.addEventListener('click', () => {

            reload(index);
        });
    });

    allChecked.addEventListener('click', () => {
        checkedBoxes.forEach((checkBox, index) => {
            checkBox.checked = allChecked.checked;
            reload(0);
        })
    })

    allDeleteBtn.forEach((deleteBtn, index) => {
        deleteBtn.addEventListener('click', () => {
            $.ajax({
                type: 'POST',
                url: '../../../../main/handler/deleteHandler.php',
                data: {
                    id: productList[index]['product']['id']
                },
                dataType: 'json',
                success: function(res) {
                    productList = res.result;
                    reload(0);
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(jqXHR.responseText);
                    console.error("AJAX request failed:", textStatus, errorThrown);
                }
            })
        })
    })

    function reload(index) {
        var discountValue = productList[index]['discount'] != '' ? productList[index]['discount']['discount_percent'] : 0;

        totalPrices[index].textContent = (productList[index]['discount'] != '' ? (productList[index]['quantity'] * (productList[index]['product']['price'] - (discountValue / 100) * productList[index]['product']['price'])) : productList[index]['product']['price'] * productList[index]['quantity']).toLocaleString('en-US')
        quantityValues[index].value = productList[index]['quantity'];

        total = 0;
        discount = 0;
        checkedBoxes.forEach((checkBox, id) => {
            if (checkBox.checked == true) {
                var discountValue = productList[id]['discount'] != '' ? productList[id]['discount']['discount_percent'] : 0;

                total = total + (productList[id]['discount'] != '' ? (productList[id]['quantity'] * (productList[id]['product']['price'] - (discountValue / 100) * productList[id]['product']['price'])) : productList[id]['product']['price'] * productList[id]['quantity']);
                discount += discountValue > 0 ? (discountValue / 100) * productList[id]['product']['price'] : 0;
            }
        });
        if (pointCb.checked) {
            total = total - pointUsed;
        } else {
            valueReal.innerText = (discount > 0 ? total + discount : '').toLocaleString('en-US');
        }
        valuePay.innerText = (total > 0 ? total : 0).toLocaleString('en-US');
    }

    pointCb.addEventListener('change', () => {
        if (pointCb.checked) {
            pointUsed = parseInt(<?php echo pointBUS::getInstance()->getPointByUserID($_SESSION['currentUser']['id'])['points_earned'] ?>);
            pointValue.innerText = pointUsed;
            reload(0);
        } else {
            pointUsed = 0;
            pointValue.innerText = pointUsed
            reload(0)
        }
    })



    payBtn.onclick = function() {
        var newProductList = [];
        checkedBoxes.forEach((checkBox, id) => {
            if (checkBox.checked == true) {
                newProductList.push(productList[id]);
            }
        });
        if (newProductList.length == 0) {
            alert("Chọn sản phẩm để thanh toán");
            return;
        } else {
            data = {
                productList: newProductList,
                pointEarned: (total * 1) / 100,
                pointUsed: pointUsed,
                total: total,
                discount: discount,
                address: address,
            }
            var dataJSON = JSON.stringify(data);
            document.getElementById('payment').src = './payment.php?data=' + encodeURIComponent(dataJSON);

            document.getElementById('payment').style.display = 'flex';
        }
    };
</script>