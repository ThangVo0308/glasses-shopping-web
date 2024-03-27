<?php
session_start();
if(isset($_POST['id'])) {
    $id = intval($_POST['id']);
    require_once("../../../BE/BUS/userBUS.php");
    require_once("../../../BE/BUS/roleBUS.php");
    $user = userBUS::getInstance()->getUserById($id);
    date_default_timezone_set('Asia/Ho_Chi_Minh');
}
$user=userBUS::getInstance()->getUserById($id);
$role= roleBUS::getInstance()->getRoleById($user['role_id']);
$roles=roleBus::getInstance()->getAllrole();
$status=[
    [
        'name'=>"active",
    ],
    [
        'name'=>"inactive",
    ]
]
?>
<div class="modal-placeholder" id="edit-account">
    <div class="modal-box">
        <div class="modal-header">
            <h1><i class="fa-solid fa-user"></i>  Sửa chi tiết tài khoản</h1>
        </div>
        <div class="modal-info">
            <div class="modal-item">
                <div class="item-header">Mã tài khoản</div>
                <div class="item-input"><input type="text"class="account_id" value="<?=$user['id']?>" disabled ></div>
            </div>
            <div class="modal-item">
                <div class="item-header">Tài khoản</div>
                <div class="item-input"><input type="text"class="account_username"value="<?=$user['username']?>" disabled></div>
            </div>
            <div class="modal-item">
                <div class="item-header">Tên người dùng</div>
                <div class="item-input"><input type="text"class="account_name" value="<?=$user['name']?>" style="color :black"></div>
            </div>
            <div class="modal-item">
                <div class="item-header">Mật khẩu</div>
                <div class="item-input"><input type="text"class="account_password" value="<?=$user['password']?>"style="color :black"></div>
            </div>
            <div class="modal-item">
                <div class="item-header">Email</div>
                <div class="item-input"><input type="text"class="account_email"value="<?=$user['email']?>"style="color :black" ></div>
            </div>
            <div class="modal-item">
                <div class="item-header">Số điện thoại</div>
                <div class="item-input"><input type="text"class="account_phone"value="<?=$user['phone']?>"style="color :black" ></div>
            </div>
            <div class="modal-item">
                <div class="item-header">Địa chỉ</div>
                <div class="item-input"><input type="text"class="account_address"value="<?=$user['address']?>" style="color :black" ></div>
          </div>
            <div class="modal-item">
                <div class="item-header">Giới tính</div>
                <div class="item-input"><input type="text"class="account_gender" value="<?=gender($user['gender'])?>" disabled ></div>
            </div>
            <div class="modal-item">
                <div class="item-header">Vai trò</div>
                <div class="item-input"><select type="text"class="account_role" >
                    <option value="<?= $user['role_id']?>"><?=$role['name']?></option> 
                    <?php foreach ($roles as $r): ?>
                        <?php if($user['role_id']==$r['id']){
                            continue;
                        }
                        ?>
                        <option value="<?=$r['id']?>"><?=$r['name']?></option>
                        <?php endforeach ?>
                </select>
                </div>
            </div>
            <div class="modal-item">
                <div class="item-header">Trạng thái</div>
                <div class="item-input"><select type="text"class="account_status" >
                    <option value="<?= $user['status']?>"><?=$user['status']?></option> 
                    <?php foreach ($status as $s): ?>
                        <?php if($user['status']==$s['name']){
                            continue;
                        }
                        ?>
                        <option value="<?=$s['name']?>"><?=$s['name']?></option>
                        <?php endforeach ?>
                </select>
                </div>
            </div>
            <div class="modal-item">
                <div class="item-header">Ngày tạo</div>
                <div class="item-input"><input type="text" value="<?=$user['created_at']?>" disabled ></div>
            </div>
            <div class="modal-item">
                <div class="item-header">Ngày cập nhật</div>
                <div class="item-input"><input type="timestamp" value="<?= date('Y-m-d H:i:s') ?>" disabled ></div>
            </div>
            <div class="modal-item" style=" grid-column: 1 / 3; width: 90%; margin: 0 5%;">
                <div class="item-header">Image</div>
                <div class="item-input"><input type="text" class="account_image" value="<?=$user['image']?>" disabled ></div>
            </div>
        </div>
<div class="modal-button">
    <div class="button-layout"></div>
    <div class="button-layout">
        <div></div>
        <div class="edit-button" onclick="updateAccount()">
        <div class="icon-placeholder"><i class="fa-solid fa-pen-to-square"></i></div>
        <div class="info-placeholder">Lưu</div>
    </div>
    <div class="back-button" onclick="loadModalBoxByAjax('detailAccount',<?=$user['id']?>)">
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
