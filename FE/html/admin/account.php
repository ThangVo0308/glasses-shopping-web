<?php
session_start();
$account = [
    [
        'id' => 1,
        'username' => 'account1',
        'name' => 'nguyen van A',
        'phone' => '091234567',
        'role' => 1,
        'status' => 'Active',
    ],
    [
        'id' => 2,
        'username' => 'account2',
        'name' => 'nguyen van B',
        'phone' => '097654321',
        'role' => 1,
        'status' => 'Inactive',
    ],
];
$c=count($account);
?>
<div id="account">
    <div class="header">
        <h2><i class="fa-regular fa-user"></i> Tài khoản </h2>
        <div class="button-placeholder">
            <div class="new-button" onclick="loadModalBoxByAjax('newAccount',<?=$c?>)">
                <div class="icon-placeholder"><i class="fa-solid fa-user-plus fa-sm"></i></div>
                <div class="info-placeholder">Thêm</div>
            </div>
        </div>
    </div>
<div class="title-list">
    <div class="title-placeholder">
    <div class="title" >Mã tài khoản</div>
    <div class="title">Tài khoản</div>
    <div class="title">Tên người dùng</div>
    <div class="title">Số điện thoại</div>
    <div class="title">Vai trò</div>
    <div class="title">Trạng thái</div>
    </div>
</div>
<div class="list">
    <?php for ($i=0;$i < count($account);$i++):?>
        <div class="placeholder">
            <div class="info">
                <div class="item">
                    <?= $account[$i]['id']?>
                </div>
                <div class="item">
                    <?= $account[$i]['username']?>
                </div>
                <div class="item">
                    <?= $account[$i]['name']?>
                </div>
                <div class="item">
                    <?= $account[$i]['phone']?>
                </div>
                <div class="item">
                    <?= $account[$i]['role']?>
                </div>
                <div class="item">
                    <?= $account[$i]['status']?>
                </div>
                <div class="item"onclick="loadModalBoxByAjax('detailAccount',<?=$i?>)">
                    <i class="fa-solid fa-circle-info"></i>
                </div>
            </div>
        </div>
        <?php endfor; ?>
</div>
<div id="modal-box"></div>
</div>
