<?php
require_once("../../../BE/BUS/discountBUS.php");
require_once("../../../BE/BUS/discountItemBUS.php");
$discount=discountBUS::getInstance()->getAlldiscount();
?>
<div id="discount">
    <div class="header">
        <h2><i class="fa-solid fa-percent"></i> Giảm giá</h2>
        <div class="button-placeholder" onclick="loadModalBoxByAjax('newDiscount')">
        <div class="new-button">
        <div class="icon-placeholder"><i class="fa-solid fa-user-plus fa-sm"></i></div>
        <div class="info-placeholder">Thêm</div>
        </div>
        </div>
        </div>
        <div class="title-list">
            <div class="title-placeholder">
                <div class="title">Mã giảm giá</div>
                <div class="title">Tên chương trình</div>
                <div class="title">% giảm giá</div>
                <div class="title">Ngày bắt đầu</div>
                <div class="title">Ngày kết thúc</div>
            </div>
        </div>
        <div class="list">
            <?php foreach($discount as $d):?>
        <div class="placeholder">
        <div class="info">
            <div class="item">
                <?=$d['id']?>
            </div>
            <div class="item">
                <?=$d['name']?>
            </div>
            <div class="item">
            <?=$d['discount_percent']?>
            </div>
            <div class="item">
            <?=$d['start_day']?>
            </div>
            <div class="item">
            <?=$d['end_day']?>
            </div>
            <div class="item" onclick="loadModalBoxByAjax('detailDiscount',<?=$d['id']?>)">
            <i class="fa-solid fa-circle-info" ></i>
            </div>
        </div>
        </div>
        <?php endforeach;?>
        </div>
        <div id="modal-box"></div></div>
    


