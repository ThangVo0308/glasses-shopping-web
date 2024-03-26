<?php
session_start();
require_once("../../../../BE/BUS/addressBUS.php");

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
                        <span id="btnDelete" address-id='<?php echo $address['id']; ?>'>Xóa</span>
                        <span id="btnUpdate" address-id='<?php echo $address['id']; ?>'>Cập nhật</span>
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
        <span>Địa chỉ mới</span>
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

<div id="updateAddressContainer">
    <div id="updateAddressForm">
        <span>Sửa địa chỉ</span>
        <div>
            <input id="updateName" class="ip" type="text" placeholder="Tên">
            <input id="updatePhone" class="ip" type="text" placeholder="Số tiện thoại">
        </div>
        <input id="updateAddress" class="ip" type="text" placeholder="Địa chỉ">
        <div class="btn-updateAddres">
            <button id="butUpdateExit">Hủy</button>
            <button id="butUpdateAccept">Cập nhật</button>
        </div>
    </div>
</div>


<link rel="stylesheet" href="../../../css/cart/address.css">
<script src="../../../controller//cart/address.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script>
    function chooseAddress(addressId) {
        var cartForm = parent.parent.document.getElementById('homeScreen');
        cartForm.src = '../FE/html/cart/cart.php?address=' + addressId;
    }

    var buttonAcceptBtn = document.getElementById('buttonAccept');
    var updateBtn = document.getElementById('butUpdateAccept');

    var btnsUpdate = document.querySelectorAll('#btnUpdate');
    var btnsDelete = document.querySelectorAll('#btnDelete');
    var btnNewAddress = document.getElementById('btnNewAddress');

    var addressId = 0;

    btnNewAddress.addEventListener('click', () => {
        clearForm();
    })

    buttonAcceptBtn.addEventListener('click', () => {
        var newName = document.getElementById('newName').value;
        var newPhone = document.getElementById('newPhone').value;
        var newAddress = document.getElementById('newAddress').value;

        if (newName.trim() === '' || newPhone.trim() === '' || newAddress.trim() === '') {
            alert("Vui lòng nhập đầy đủ thông tin");
            return;
        }

        var data = {
            userID: <?php echo $_SESSION['currentUser']['id'] ?>,
            name: newName,
            phone: newPhone,
            address: newAddress
        }

        $.ajax({
            type: "POST",
            url: "../../../../main/handler/addressHandle.php",
            data: data,
            dataType: 'json',
            success: function(res) {
                if (res.phoneExisted == false) {
                    alert("Số điện thoại đã được đăng ký trong danh sách địa chỉ của bạn");
                } else if (res.phoneValidate == false) {
                    alert("Số điện thoại không hợp lệ");
                }
                if (res.success) {
                    alert("Thêm địa chỉ mới thành công")
                    parent.document.location.reload();
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(jqXHR.responseText);
                console.error("AJAX request failed:", textStatus, errorThrown);
            }
        })
    })

    btnsUpdate.forEach((btnUpdate) => {
        btnUpdate.addEventListener('click', function() {
            addressId = btnUpdate.getAttribute('address-id');
            $.ajax({
                type: "POST",
                url: "../../../../../main/handler/showUpdateAddress.php",
                data: {
                    id: addressId
                },
                dataType: 'json',
                success: function(res) {
                    document.getElementById('updateAddressContainer').style.display = "flex";
                    document.getElementById('updateName').value = res.data.name;
                    document.getElementById('updatePhone').value = res.data.phone;
                    document.getElementById('updateAddress').value = res.data.address;
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(jqXHR.responseText);
                    console.error("AJAX request failed:", textStatus, errorThrown);
                }
            })
        })
    })

    updateBtn.addEventListener('click', () => {
        $.ajax({
            type: "POST",
            url: "../../../../../main/handler/updateAddress.php",
            data: {
                id: addressId,
                userID: <?php echo $_SESSION['currentUser']['id'] ?>,
                name: document.getElementById('updateName').value,
                phone: document.getElementById('updatePhone').value,
                address: document.getElementById('updateAddress').value
            },
            dataType: 'json',
            success: function(res) {
                if (res.phoneExisted == false) {
                    alert("Số điện thoại đã được đăng ký trong danh sách địa chỉ của bạn");
                } else if (res.phoneValidate == false) {
                    alert("Số điện thoại không hợp lệ");
                }
                if (res.success) {
                    alert("Sửa địa chỉ thành công")
                    parent.document.location.reload();
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(jqXHR.responseText);
                console.error("AJAX request failed:", textStatus, errorThrown);
            }
        })
    })

    btnsDelete.forEach((btnDelete) => {
        btnDelete.addEventListener('click', () => {
            var addressId =btnDelete.getAttribute('address-id');
            if (confirm("Bạn có chắc chắn muốn xóa địa chỉ này?")) {
                $.ajax({
                    type: "POST",
                    url: '../../../../../main/handler/deleteAddress.php',
                    data: {
                        id: addressId,
                    },
                    dataType: 'json',
                    success: function(res) {
                        if(res.success === true) {
                            alert("Xóa thành công");
                            parent.document.location.reload();
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.log(jqXHR.responseText);
                        console.error("AJAX request failed:", textStatus, errorThrown);
                    }
                })
            }
        })
    })

    function clearForm() {
        document.getElementById('newName').value = '';
        document.getElementById('newPhone').value = '';
        document.getElementById('newAddress').value = '';
    }
</script>