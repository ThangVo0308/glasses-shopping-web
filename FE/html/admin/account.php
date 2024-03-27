<?php
session_start();
require_once("../../../BE/BUS/userBUS.php");
require_once("../../../BE/BUS/roleBUS.php");
$user = userBUS::getInstance()->getAlluser();

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
    <?php foreach ($user as $u):?>
        <div class="placeholder">
            <div class="info">
                <div class="item">
                    <?= $u['id']?>
                </div>
                <div class="item">
                    <?= $u['username']?>
                </div>
                <div class="item">
                    <?= $u['name']?>
                </div>
                <div class="item">
                    <?= $u['phone']?>
                </div>
                <div class="item">
                    <?php $role = roleBUS::getInstance()->getRoleById($u['role_id']);
                          echo $role['name']; ?>
                </div>
                <div class="item">
                    <?= $u['status']?>
                </div>
                <div class="item"onclick="loadModalBoxByAjax('detailAccount',<?=$u['id']?>)">
                    <i class="fa-solid fa-circle-info"></i>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
</div>
<div id="modal-box"></div>
</div>
