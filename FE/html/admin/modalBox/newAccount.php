<?php
session_start();
if(isset($_POST['id'])) {
    $id = intval($_POST['id'])+1;
}
$role=[
    [
        'role'=>'Khách hàng'
    ],
    [
        'role'=>'Nhân viên'
    ],
    [
        'role'=>'Quản lý'
    ]
    ];
$status = [
    [
        'status' =>'Active',
    ],
    [
        'status' =>'Inactive',
    ],
];
?>
<div class="modal-placeholder" id="new-account">
    <div class="modal-box">
        <div class="modal-header">
            <h1><i class="fa-solid fa-user-pen"></i>  Tạo tài khoản</h1>
        </div>
        <div class="modal-info">
            <div class="modal-item">
                <div class="item-header">Mã tài khoản</div>
                <div class="item-input"><input type="text" value="<?=$id?>" disabled></div>
            </div>
            <div class="modal-item">
                <div class="item-header">Tài khoản</div>
                <div class="item-input"><input type="text" value="" ></div>
            </div>
            <div class="modal-item">
                <div class="item-header">Mật khẩu</div>
                <div class="item-input"><input type="text" value="" ></div>
            </div>
            <div class="modal-item">
                <div class="item-header">Tên người dùng</div>
                <div class="item-input"><input type="text" value="" ></div>
            </div>
            <div class="modal-item">
                <div class="item-header">Email</div>
                <div class="item-input"><input type="text" value="" ></div>
            </div>
            <div class="modal-item">
                <div class="item-header">Số điện thoại</div>
                <div class="item-input"><input type="text" value="" ></div>
            </div>
            <div class="modal-item">
                <div class="item-header">Vai trò</div>
                <div class="item-input"><select name="" id="" >
                <option value=""></option>
                <?php foreach ($role as $r): ?>
                        <option value="<?=$r['role']?>"><?=$r['role']?></option>
                        <?php endforeach ?>
                </select>
                </div>
            </div>
            <div class="modal-item">
                <div class="item-header">Trạng thái</div>
                <div class="item-input"><select name="" id="" >
                <option value=""></option>
                <?php foreach ($status as $s): ?>
                        <option value="<?=$s['status']?>"><?=$s['status']?></option>
                        <?php endforeach ?>
                </select>
                </div>
            </div>
            <div class="modal-item" style=" grid-column: 1 / 3; width: 90%; margin: 0 5%;">
                <div class="item-header">Địa chỉ</div>
                <div class="item-input"><input type="text" value=""  ></div>
            </div>
        </div>
<div class="modal-button">
    <div class="button-layout"></div>
    <div class="button-layout">
        <div class="edit-button">
        <div class="icon-placeholder"><i class="fa-solid fa-pen-to-square"></i></div>
        <div class="info-placeholder">Lưu</div>
    </div>
    <div class="back-button" onclick="closeNewaccount()">
    <div class="icon-placeholder"><i class="fa-solid fa-angle-left"></i></div>
    <div class="info-placeholder">Hủy</div>
    </div>
    </div>
    </div>
</div>
    </div>
