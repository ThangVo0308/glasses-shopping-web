<?php
$supply=[
    [
        'id'=>1,
        'user'=>'Nhân viên 1',
        'date'=>'10/3/2024',
        'total'=>200000,
    ],
    [
        'id'=>2,
        'user'=>'Nhân viên 2',
        'date'=>'11/3/2024',
        'total'=>750000,
    ],
];
$c=count($supply);
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
            <div class="title">Người nhập</div>
            <div class="title">Ngày nhập</div>
            <div class="title">Tổng tiền</div>
            <div class="title"></div>
        </div>
    </div>
    <div class="list">
        <?php for ($i=0;$i<count($supply);$i++):?>
            <div class="placeholder">
                <div class="info">
                    <div class="item">
                        <?=$supply[$i]['id']?>
                    </div>
                    <div class="item">
                    <?=$supply[$i]['user']?>
                    </div>
                    <div class="item">
                    <?=date("d/m/Y",strtotime($supply[$i]['date']))?>
                    </div>
                    <div class="item">
                    <?=$supply[$i]['total']?>
                    </div>
                    <div class="item" onclick="loadModalBoxByAjax('detailSupply',<?=$i?>)">
                        <i class="fa-solid fa-circle-info"></i>
                    </div>
                </div>
            </div>
            <?php endfor;?>
    </div>
    <div id="modal-box"></div>
</div>
