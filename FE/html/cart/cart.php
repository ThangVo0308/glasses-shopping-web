<?php
session_start();
require_once("../../../BE/BUS/userBUS.php");
require_once("../../../BE/BUS/pointBUS.php");
require_once("../../../BE/BUS/discountBUS.php");
$productList = [];

if (!isset($_SESSION['currentUser'])) {
    $_SESSION['currentUser'] = array();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST['quantity'] > 0) {
        $product = array(
            'id' => $_POST['id'] ?? null,
            'name' => $_POST['name'] ?? null,
            'image' => $_POST['image'] ?? null,
            'category_id' => $_POST['category_id'] ?? null,
            'currentPrice' => $_POST['currentPrice'] ?? null,
            'discountPrice' => $_POST['discountPrice'] ?? null,
            'firstQuantity' => $_POST['firstQuantity'] ?? null,
            'discountAmount' => $_POST['discountAmount'] ?? null,
            'discountID' => $_POST['discountID'] ?? null,
            'quantity' => $_POST['quantity'], // number product user choose
            'totalPrice' => $_POST['totalPrice'] ?? null,
        );
    }

    $nameExist = false;
    foreach ($_SESSION['productList'] as $existingProduct) {
        if ($_POST['name'] == $existingProduct['name']) {
            $nameExist = true;
            break;
        }
    }

    if (!$nameExist) {
        if (!isset($_SESSION['productList'])) {
            $_SESSION['productList'] = array();
        }

        $_SESSION['productList'][] = $product;
        echo json_encode(['session' => $_SESSION['productList']]);
    }
}


if (!empty($_SESSION['productList'])) {
    $productList = $_SESSION['productList'];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ Hàng</title>
</head>

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
                        <input type="checkbox" name="checked" id="checkBox" value="<?= $product['id'] ?>">
                        <span><?php echo $product['name']; ?></span>
                        <?php
                            echo "<img src='../../../images/" . $product['image'] . "' alt=''>";
                        ?>
                    </div>
                    <div class="item">
                        <span id="discountPrice"><?php echo number_format(intval($product['discountPrice'])); ?></span>
                        <div>
                            <button id="decrease" class="decrease">-</button>
                            <input id="quantity" type="text" class="quantity" value="<?php echo $product['quantity']; ?>">
                            <button id="increase" class="increase">+</button>
                        </div>
                        <?php
                        $totalPrice = intval(str_replace('.', '', $product['discountPrice'])) * $product['quantity'];
                        ?>
                        <span id="totalPrice"><?php echo number_format($totalPrice) ?></span>
                        <span id="deleteBtn">Xóa</span>
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
                        <h3 id="valueReal"></h3>
                        <h3 id="valuePay"></h3>
                    </div>
                    <button id="payBtn">Thanh Toán</button>
                </div>
            </div>
        </div>

        <div id="newAddessContainer">
            <div id="newAddressForm">
                <span>Địa chỉ mới</span>
                <div>
                    <input id="newName" class="ip" type="text" placeholder="Tên">
                    <input id="newPhone" class="ip" type="text" placeholder="Số tiện thoại">
                </div>
                <input id="newAddress" class="ip" type="text" placeholder="Địa chỉ">
                <div>
                    <input type="checkbox" id="defaultAddress">
                    <span>Đặt làm địa chỉ mặc định</span>
                </div>
                <div class="buttons">
                    <button id="buttonExit">Hủy</button>
                    <button id="buttonAccept">Hoàn thành</button>
                </div>
            </div>
        </div>
        <iframe frameborder="0" id="payment"></iframe>
</body>
<link rel="stylesheet" href="../../css/cart/cart.css">
<script src="../../controller/cart/cart.js"></script>

</html>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

<script>
    var currentUser = <?php echo json_encode($_SESSION['currentUser']['id']); ?>;

    document.getElementById('buttonAccept').addEventListener('click', function() {
        var newName = document.getElementById('newName').value;
        var newPhone = document.getElementById('newPhone').value;
        var newAddress = document.getElementById('newAddress').value;

        if (newName === '' || newPhone === '' || newAddress === '') {
            var detail = document.getElementById('detail');
            detail.innerHTML = `
            <span><?php echo userBUS::getInstance()->getUserById(4)['name'] ?>,</span>
            <span><?php echo userBUS::getInstance()->getUserById(4)['phone'] ?>,</span>
            <span id="address"><?php echo userBUS::getInstance()->getUserById(4)['address'] ?></span>
        `;
        } else {
            var detail = document.getElementById('detail');
            detail.innerHTML = `
        <span>${newName},</span>
        <span>${newPhone},</span>
        <span id="address">${newAddress}</span>
        `;
        }
        document.getElementById('newAddessContainer').style.display = 'none';
    });


    var btnPay = document.getElementById('payBtn');
    btnPay.onclick = function() {
        var productList1 = [];
        for (var i = 0; i < checkedBoxes.length; i++) {
            var checkedBox = checkedBoxes[i];
            var quantityValue = quantityValues[i].value;
            var clickedValue = checkedBox.value;

            <?php foreach ($productList as $product) : ?>
                if (clickedValue == parseInt(<?php echo $product['id']; ?>) && checkedBox.checked == true) {
                    var product1 = {
                        'id': <?php echo $product['id']; ?>,
                        'name': '<?php echo $product['name']; ?>',
                        'image': '<?php echo $product['image']; ?>',
                        'userID': parseInt(4), // replace with $_SESSION['userID']
                        'currentPrice': <?php echo $product['currentPrice']; ?>,
                        'discountPrice': <?php echo $product['discountPrice']; ?>,
                        'quantity': quantityValue,
                        'discountID': <?php echo (is_numeric($product['discountID'])) ? $product['discountID'] : 'null'; ?>,
                        'pointEarned': parseInt(<?php echo pointBUS::getInstance()->getPointByUserID(4)['points_earned'] ?>),
                        'pointUsed': parseInt(pointValue.innerHTML),
                        'total': parseInt(total),
                        'name_received': document.getElementById('newName').value,
                        'phone_received': document.getElementById('newPhone').value,
                        'address': document.getElementById('newAddress').value,

                    };

                    productList1.push(product1);
                }

            <?php endforeach; ?>
        }

        var productList1JSON = JSON.stringify(productList1);
        document.getElementById('payment').src = './payment.php?data=' + encodeURIComponent(productList1JSON);

        document.getElementById('payment').style.display = 'flex';
    };


    var btnEditAddress = document.getElementById('btnChangeAddress');
    var newAddressContainer = document.getElementById('newAddessContainer');

    btnEditAddress.onclick = function() {
        newAddressContainer.style.display = 'flex';
    }

    var decreaseBtns = document.querySelectorAll('.decrease');
    var increaseBtns = document.querySelectorAll('.increase');
    var quantityValues = document.querySelectorAll('.quantity');
    var totalPrices = document.querySelectorAll('#totalPrice');
    var currentPrices = document.querySelectorAll('#discountPrice');
    var allChecked = document.getElementById('allChecked');
    var selectStatus = document.getElementById('selectStatus');
    var valueVoucher = document.getElementById('valueVoucher');
    var pointCb = document.getElementById('pointCb');
    var pointValue = document.getElementById('pointValue');
    var defaultAddress = document.getElementById('defaultAddress');

    defaultAddress.onchange = () => {
        if (defaultAddress.checked) {
            document.getElementById('newName').value = "<?php echo userBUS::getInstance()->getUserById(4)['name'] ?>";
            document.getElementById('newPhone').value = "<?php echo userBUS::getInstance()->getUserById(4)['phone'] ?>";
            document.getElementById('newAddress').value = "<?php echo userBUS::getInstance()->getUserById(4)['address'] ?>";
        } else {
            document.getElementById('newName').value = '';
            document.getElementById('newPhone').value = '';
            document.getElementById('newAddress').value = '';
        }
    }

    var checkedBoxes = document.querySelectorAll('#checkBox');
    var valuePay = document.getElementById('valuePay');
    var total = 0;

    decreaseBtns.forEach((decreaseBtn, index) => {
        decreaseBtn.addEventListener('click', () => {
            var quantityValue = quantityValues[index];
            var totalPriceElement = totalPrices[index];
            var currentPriceElement = currentPrices[index];
            var checkedBox = checkedBoxes[index];

            var convertCurrentPrice = currentPriceElement.innerText.replace(/,/g, '');

            if (quantityValue.value - 1 == 0) {
                quantityValue.value = parseInt(1);
            } else {
                quantityValue.value--;
            }

            var priceReal = parseInt(convertCurrentPrice) * quantityValue.value;

            quantityValue.innerText = quantityValue.value;
            totalPriceElement.innerText = number_format(priceReal);

            updateTotal();
        });
    });

    increaseBtns.forEach((increaseBtn, index) => {
        increaseBtn.addEventListener('click', () => {
            var quantityValue = quantityValues[index];
            var totalPriceElement = totalPrices[index];
            var currentPriceElement = currentPrices[index];


            var convertCurrentPrice = currentPriceElement.innerText.replace(/,/g, '');

            var quantity = <?php echo isset($product['quantity']) ? $product['quantity'] : 1 ?>;
            if (quantityValue.value == parseInt(quantity)) {
                quantityValue.value = parseInt(quantity);
            } else {
                quantityValue.value++;
            }

            var priceReal = parseInt(convertCurrentPrice) * quantityValue.value;

            quantityValue.innerText = quantityValue.value;
            totalPriceElement.innerText = number_format(priceReal);

            updateTotal();
        })

    })

    allChecked.addEventListener('click', () => {
        checkedBoxes.forEach((checkBox, index) => {
            checkBox.checked = allChecked.checked;

            if (checkBox.checked == true) {
                selectStatus.innerText = `Bạn đã chọn ${++count} sản phẩm`;
            } else {
                selectStatus.innerText = `Bạn đã chọn ${--count} sản phẩm`;
            }
            var clickedValue = checkBox.value;

            var convertCurrentPrice = currentPrices[index].innerText.replace(/,/g, '');
            var quantityValue = quantityValues[index].value;

            <?php foreach ($productList as $product) : ?>
                var productId = '<?php echo $product['id']; ?>';

                if (clickedValue === productId) {
                    if (checkBox.checked) {
                        total += parseInt(convertCurrentPrice) * parseInt(quantityValue);
                        var discount = parseInt(<?php echo json_encode($product['discountAmount']); ?>);
                        discountTotal += discount;
                        valueVoucher.innerText = discountTotal.toLocaleString('en-US');
                    } else {
                        total -= parseInt(convertCurrentPrice) * parseInt(quantityValue);
                        var discount = parseInt(<?php echo json_encode($product['discountAmount']); ?>);
                        discountTotal -= discount;
                        valueVoucher.innerText = discountTotal.toLocaleString('en-US');
                    }
                }
            <?php endforeach; ?>
            valuePay.innerText = number_format(total);
        })
    })

    pointCb.addEventListener('change', () => {
        if (pointCb.checked) {
            pointValue.innerText = parseInt(<?php echo pointBUS::getInstance()->getPointByUserID(4)['points_earned'] ?>);
            total -= parseInt(<?php echo pointBUS::getInstance()->getPointByUserID(4)['points_earned'] ?>) * 10;
            valuePay.innerText = number_format(total);
        } else {
            pointValue.innerText = '0';
            total += parseInt(<?php echo pointBUS::getInstance()->getPointByUserID(4)['points_earned'] ?>) * 10;
            valuePay.innerText = number_format(total);
        }
    })

    var count = 0;
    var discountTotal = 0;
    checkedBoxes.forEach((checkBox, index) => {
        checkBox.addEventListener('click', () => {
            // handle log amount of products clicked
            if (checkBox.checked == true) {
                selectStatus.innerText = `Bạn đã chọn ${++count} sản phẩm`;
            } else {
                selectStatus.innerText = `Bạn đã chọn ${--count} sản phẩm`;
            }

            // handle total price when clicking checkBox
            var clickedValue = checkBox.value;

            var convertCurrentPrice = currentPrices[index].innerText.replace(/,/g, '');
            var quantityValue = quantityValues[index].value;

            if (checkBox.checked == false) {
                total -= parseInt(convertCurrentPrice) * parseInt(quantityValue);
            }

            <?php foreach ($productList as $product) : ?>
                console.log(<?php echo json_encode($product) ?>);
                if (checkBox.checked) {
                    var productId = '<?php echo $product['id']; ?>';
                    if (clickedValue === productId) {
                        // handle discount price
                        var discount = parseInt(<?php echo json_encode($product['discountAmount']); ?>);
                        discountTotal += discount;
                        valueVoucher.innerText = discountTotal.toLocaleString('en-US');

                        // handle total price
                        if (checkBox.checked) {
                            total += parseInt(convertCurrentPrice) * parseInt(quantityValue);
                        }
                    }
                } else {
                    var productId = '<?php echo $product['id']; ?>';
                    if (clickedValue === productId) {
                        // handle discount price
                        var discount = parseInt(<?php echo json_encode($product['discountAmount']); ?>);
                        discountTotal -= discount;
                        valueVoucher.innerText = discountTotal.toLocaleString('en-US');
                    }
                }
            <?php endforeach; ?>
            valuePay.innerText = number_format(total);
        });
    });



    // Function to format the number with commas
    function number_format(number) {
        return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }

    function updateTotal() {
        total = 0;
        checkedBoxes.forEach((checkBox, index) => {
            var clickedValue = checkBox.value;
            var convertCurrentPrice = currentPrices[index].innerText.replace(/,/g, '');
            var quantityValue = quantityValues[index].value;

            <?php foreach ($productList as $product) : ?>
                if (checkBox.checked) {
                    var productId = '<?php echo $product['id']; ?>';
                    var test = '<?php echo $product['discountAmount']; ?>';
                    console.log(test);
                    if (clickedValue === productId) {
                        total += parseInt(convertCurrentPrice) * parseInt(quantityValue);
                    }
                }
            <?php endforeach; ?>

            valuePay.innerText = number_format(total);
        });
    }



    function quantityHandle(url, method, data) {
        $.ajax({
            type: method,
            url: url,
            data: data,
            dataType: 'json',
            success: function(res) {
                if (res.success === true) {
                    console.log(res.productList);
                } else {
                    alert('FAILED');
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(jqXHR.responseText);
                console.error("AJAX request failed:", textStatus, errorThrown);
            }
        })
    }
</script>