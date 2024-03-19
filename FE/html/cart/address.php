<?php
session_start();
require_once("../../../BE/BUS/addressBUS.php");

$addressModel = addressBUS::getInstance()->getAlladdress();
?>

<div id="ship-address">
    <span class="title">Địa chỉ của tôi</span>
    <div id="addressForm">
        <?php foreach (addressBUS::getInstance()->getAlladdress() as $address) : ?>
            <?php if ($address['user_id'] == $_SESSION['currentUser']['id']) : ?>
                <div class="address-infor">
                    <div>
                        <div class="infor">
                            <span class="name-user"><?php echo $address['name_received'] ?></span>
                            <span class="phone-user"><?php echo $address['phone_received'] ?></span>
                        </div>
                        <span class="address"><?php echo $address['address_received'] ?></span>
                    </div>
                    <div class="btn-Address">
                        <span id="btnDelete">Xóa</span>
                        <span id="btnUpdate">Cập nhật</span>
                        <span onclick="chooseAddress('<?php echo $address['id']; ?>');" id="btnAccept">Xác nhận</span>
                    </div>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>

    </div>
    <div class="buttons">
        <span id="btnNewAddress">Thêm địa chỉ</span>
        <span id="btnClose">Đóng</span>
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
        <div class="btn-newAddres">
            <button id="buttonExit">Hủy</button>
            <button id="buttonAccept">Hoàn thành</button>
        </div>
    </div>
</div>
<link rel="stylesheet" href="../../css/cart/address.css">
<script src="../../controller//cart/address.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script>
    function chooseAddress(addressId) {
        var cartForm = parent.parent.document.getElementById('homeScreen');
        cartForm.src = '../FE/html/cart/cart.php?address='+addressId;
    }
</script>