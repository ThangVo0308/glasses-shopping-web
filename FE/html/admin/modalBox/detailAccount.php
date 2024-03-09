<?php
session_start();
if(isset($_POST['id'])) {
    $id = intval($_POST['id']);
    $account = [
        [
            'id' => 1,
            'username' => 'account1',
            'name' => 'nguyen van A',
            'phone' => '091234567',
            'role' => 'Nhân viên',
            'status' => 'Active',
        ],
        [
            'id' => 2,
            'username' => 'account2',
            'name' => 'nguyen van B',
            'phone' => '097654321',
            'role' => 'Quản lý',
            'status' => 'Inactive',
        ],
    
    ];
}
?>
<div class="modal-placeholder" id="detail-account">
    <div class="modal-box">
        <div class="modal-header">
            <h1><i class="fa-solid fa-user"></i>  Chi tiết tài khoản</h1>
        </div>
        <div class="modal-info">
            <div class="modal-item">
                <div class="item-header">Mã tài khoản</div>
                <div class="item-input"><input type="text" value="" disabled></div>
            </div>
            <div class="modal-item">
                <div class="item-header">Tài khoản</div>
                <div class="item-input"><input type="text" value="" disabled></div>
            </div>
            <div class="modal-item">
                <div class="item-header">Tên người dùng</div>
                <div class="item-input"><input type="text" value="" disabled></div>
            </div>
            <div class="modal-item">
                <div class="item-header">Email</div>
                <div class="item-input"><input type="text" value="" disabled></div>
            </div>
            <div class="modal-item">
                <div class="item-header">Số điện thoại</div>
                <div class="item-input"><input type="text" value="" disabled></div>
            </div>
            <div class="modal-item">
                <div class="item-header">Địa chỉ</div>
                <div class="item-input"><input type="text" value="" disabled ></div>

</div>
            <div class="modal-item">
                <div class="item-header">Vai trò</div>
                <div class="item-input"><select name="" id="" disabled>
                <option value=""></option>
                </select>
                </div>
            </div>
            <div class="modal-item">
                <div class="item-header">Trạng thái</div>
                <div class="item-input"><select name="" id="" disabled>
                <option value=""></option>
                </select>
                </div>
            </div>
        </div>
<div class="modal-button">
    <div class="button-layout"></div>
    <div class="button-layout">
        <div class="edit-button" onclick="loadModalBoxByAjax('editAccount',<?=$id?>)">
        <div class="icon-placeholder"><i class="fa-solid fa-pen-to-square"></i></div>
        <div class="info-placeholder">Sửa</div>
    </div>
    <div class="back-button" onclick="closeDetailaccount()">
    <div class="icon-placeholder"><i class="fa-solid fa-angle-left"></i></div>
    <div class="info-placeholder">Back</div>
    </div>
    </div>
    </div>
</div>
    </div>
