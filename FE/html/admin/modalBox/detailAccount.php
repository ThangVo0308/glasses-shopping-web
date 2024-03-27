<?php
session_start();
    $id = intval($_POST['id']);
    require_once("../../../BE/BUS/userBUS.php");
    require_once("../../../BE/BUS/roleBUS.php");
    $user = userBUS::getInstance()->getUserById($id);
?>
<div class="modal-placeholder" id="detail-account">
    <div class="modal-box">
        <div class="modal-header">
            <h1><i class="fa-solid fa-user"></i>  Chi tiết tài khoản</h1>
        </div>
        <div class="modal-info">
            <div class="modal-item">
                <div class="item-header">Mã tài khoản</div>
                <div class="item-input"><input type="text" value="<?=$user['id']?>" disabled></div>
            </div>
            <div class="modal-item">
                <div class="item-header">Tài khoản</div>
                <div class="item-input"><input type="text" value="<?=$user['username']?>" disabled></div>
            </div>
            <div class="modal-item">
                <div class="item-header">Tên người dùng</div>
                <div class="item-input"><input type="text" value="<?=$user['name']?>" disabled></div>
            </div>
            <div class="modal-item">
                <div class="item-header">Mật khẩu</div>
                <div class="item-input"><input type="text" value="<?=$user['password']?>" disabled></div>
            </div>
            <div class="modal-item">
                <div class="item-header">Email</div>
                <div class="item-input"><input type="text" value="<?=$user['email']?>" disabled></div>
            </div>
            <div class="modal-item">
                <div class="item-header">Số điện thoại</div>
                <div class="item-input"><input type="text" value="<?=$user['phone']?>" disabled></div>
            </div>
            <div class="modal-item">
                <div class="item-header">Địa chỉ</div>
                <div class="item-input"><input type="text" value="<?=$user['address']?>" disabled ></div>
          </div>
            <div class="modal-item">
                <div class="item-header">Giới tính</div>
                <div class="item-input"><input type="text" value="<?=gender($user['gender'])?>" disabled ></div>
            </div>
            <div class="modal-item">
                <div class="item-header">Vai trò</div>
                <div class="item-input"><input type="text" value="<?php $role = roleBUS::getInstance()->getRoleById($user['role_id']);
                          echo $role['name'];?>" disabled >
                </div>
            </div>
            <div class="modal-item">
                <div class="item-header">Trạng thái</div>
                <div class="item-input"><input type="text" value="<?=$user['status']?>">
                </div>
            </div>
            <div class="modal-item">
                <div class="item-header">Ngày tạo</div>
                <div class="item-input"><input type="text" value="<?=$user['created_at']?>" disabled ></div>
            </div>
            <div class="modal-item">
                <div class="item-header">Ngày cập nhật</div>
                <div class="item-input"><input type="text" value="<?=$user['updated_at']?>" disabled ></div>
            </div>
            <div class="modal-item" style=" grid-column: 1 / 3; width: 90%; margin: 0 5%;">
                <div class="item-header">Image</div>
                <div class="item-input"><input type="text" value="<?=$user['image']?>" disabled ></div>
            </div>
        </div>
<div class="modal-button">
    <div class="button-layout"></div>
    <div class="button-layout">
        
        <div class="edit-button" onclick="loadModalBoxByAjax('editAccount',<?=$user['id']?>)">
        <div class="icon-placeholder"><i class="fa-solid fa-pen-to-square"></i></div>
        <div class="info-placeholder">Sửa</div>
    </div>
    <div class="edit-button" onclick="deleteAccount(<?=$id?>)">
        <div class="icon-placeholder"><i class="fa-solid fa-x"></i></div>
        <div class="info-placeholder">Xóa</div>
    </div>
    <div class="back-button" onclick="closeDetailaccount()">
    <div class="icon-placeholder"><i class="fa-solid fa-angle-left"></i></div>
    <div class="info-placeholder">Back</div>
    </div>
    </div>
    </div>
</div>
    </div>
    <?php
    function gender($id){
        if($id == 1) echo "Nam";
         else if($id == 0) echo "Nữ";
         else echo "Unisex";
    }
    ?>
