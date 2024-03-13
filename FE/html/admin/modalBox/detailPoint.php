<?php
$id=$_POST['id'];
$point_detail=[
    [
        'point_orderid'=>1,
        'point_date'=>'01/02/2024',
        'point_earn'=>500,
        'point_use'=>0
    ],
    [
        'point_orderid'=>3,
        'point_date'=>'15/02/2024',
        'point_earn'=>500,
        'point_use'=>250
    ],
]
?>
<div class="modal-placeholder" id="detail-point">
    <div class="modal-box">
        <div class="modal-header">
            <h1><i class="fa-solid fa-list"></i> Chi tiết điểm tích lũy</h1>
            
        </div>
    <div class="modal-left">
        <div class="modal-info">
            <div class="modal-item">
                <div class="item-header">Mã khách hàng</div>
                <div class="item-input"><input type="text" class="order_id" value="1" disabled></div>
            </div>
            <div class="modal-item">
                <div class="item-header">Tên khách hàng</div>
                <div class="item-input"><input type="text" class="user_name" value="Nguyen van A" disabled></div>
            </div>
            <div class="modal-item">
                <div class="item-header">Điểm đã nhận</div>
                <div class="item-input"><input type="text" class="order_date" value="1000" disabled></div>
            </div>
            <div class="modal-item">
                <div class="item-header">Điểm đã dùng</div>
                <div class="item-input"><input type="text" class="discount_id" value="250" disabled></div>
            </div>
            <div class="modal-item" style=" grid-column: 1 / 3; width: 90%; margin: 0 5%;">
                <div class="item-header" >Số điện thoại</div>
                <div class="item-input"><input type="text" class="order_pointearn" value="0908123123" disabled></div>
            </div>
            
</div>
    </div>
    <div class="modal-right">
        <div class="title-list">
            <div class="title-placeholder">
                <div class="title">Mã h.đơn</div>
                <div class="title">Ngày mua</div>
                <div class="title">Điểm nhận</div>
                <div class="title">Điểm dùng</div>
            </div>
        </div>
    <div class="list">
        <?php for ($i = 0;$i < count($point_detail);$i++):?>
            <div class="placeholder">
                <div class="info">
                    <div class="item" value="">
                        <?=$point_detail[$i]['point_orderid']?>
                    </div>
                    <div class="item">
                    <?=$point_detail[$i]['point_date']?>
                    </div>
                    <div class="item">
                    <?=$point_detail[$i]['point_earn']?>
                    </div>
                    <div class="item">
                    <?=$point_detail[$i]['point_use']?>
                    </div>
                </div>
            </div>
            <?php endfor; ?>
    </div>
    </div>
    <div class="modal-button">
    <div class="button-layout"></div>
        <div class="button-layout">
            <div></div>
                <div class="back-button" onclick="closeDetailpoint()">
                <div class="icon-placeholder"><i class="fa-solid fa-angle-left"></i></div>
                <div class="info-placeholder">Back</div>
                </div>
        </div>
    </div>
</div>
</div>