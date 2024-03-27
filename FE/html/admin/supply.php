<?php
require_once("../../../BE/BUS/importBUS.php");
require_once("../../../BE/BUS/userBUS.php");
$import = importBUS::getInstance()->getAllImport();
$c=count($import)+1;
?>
<div id="supply">
    <div class="header">
    <h2><i class="fa-solid fa-plus"></i><span> Nhập hàng </span></h2>
    <div class="button-placeholder">
        <div class="new-button" onclick="loadModalBoxByAjax('newSupply',<?=$c?>)">
            <div class="icon-placeholder"><i class="fa-solid fa-plus"></i></div>
            <div class="info-placeholder">Thêm</div>
        </div>
    </div>
    </div>
    <div class="title-list">
        <div class="title-placeholder">
            <div class="title">Mã phiếu nhập</div>
            <div class="title">ID nhân viên</div>
            <div class="title">Tên nhân viên</div>
            <div class="title">Ngày nhập</div>
            <div class="title">Tổng tiền</div>
            <div class="title"></div>
        </div>
    </div>
    <div class="list">
        <?php foreach ($import as $i):?>
            <div class="placeholder">
                <div class="info">
                    <div class="item">
                        <?=$i['id']?>
                    </div>
                    <div class="item">
                    <?=$i['user_id']?>
                    </div>
                    <div class="item">
                    <?php $user =userBUS::getInstance()->getUserById($i['user_id']);
                    echo $user['name']; ?>
                    </div>
                    <div class="item">
                    <?=$i['import_date']?>
                    </div>
                    <div class="item">
                    <?=$i['total_price']?>
                    </div>
                    <div class="item" onclick="loadModalBoxByAjax('detailSupply',<?=$i['id']?>)">
                        <i class="fa-solid fa-circle-info"></i>
                    </div>
                </div>
            </div>
            <?php endforeach;?>
    </div>
    <div id="modal-box"></div>
</div>
