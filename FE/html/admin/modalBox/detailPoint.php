<?php
$id=intval($_POST['id']);
require_once("../../../BE/BUS/pointBUS.php");
require_once("../../../BE/BUS/userBUS.php");
require_once("../../../BE/BUS/orderBUS.php");
$point= pointBUS::getInstance()->getPointByUserID($id);
$order= orderBUS::getInstance()->getOrderListByUserId($id);
foreach($order as $or):
    echo $or['id'];
    echo $or['order_date'];
    echo $or['points_earned'];
    echo $or['points_used'];
endforeach;
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
                <div class="item-input"><input type="text" class="order_id" value="<?=$point['user_id']?>" disabled></div>
            </div>
            <div class="modal-item">
                <div class="item-header">Tên khách hàng</div>
                <div class="item-input"><input type="text" class="user_name" value="<?php $user= userBUS::getInstance()->getUserById($point['user_id']);
                              echo $user['name'];?>
                        " disabled></div>
            </div>
            <div class="modal-item">
                <div class="item-header">Điểm đã nhận</div>
                <div class="item-input"><input type="text" class="order_date" value="<?=$point['points_earned']?>" disabled></div>
            </div>
            <div class="modal-item">
                <div class="item-header">Điểm đã dùng</div>
                <div class="item-input"><input type="text" class="discount_id" value="<?=$point['points_used']?>" disabled></div>
            </div>
            <div class="modal-item" style=" grid-column: 1 / 3; width: 90%; margin: 0 5%;">
                <div class="item-header" >Số điện thoại</div>
                <div class="item-input"><input type="text" class="order_pointearn" value="<?=$user['phone']?>" disabled></div>
            </div>
            
</div>
    </div>
    <div class="modal-right">
        <div class="title-list">
            <div class="title-placeholder">
                <div class="title">H.đơn</div>
                <div class="title">Ngày mua</div>
                <div class="title">Điểm nhận</div>
                <div class="title">Điểm dùng</div>
            </div>
        </div>
    <div class="list">
        <?php foreach($order as $or):?>
            <div class="placeholder">
                <div class="info">
                    <div class="item">
                    <?=$or['id']?>
                    </div>
                    <div class="item">
                    <?=$or['order_date']?>
                    </div>
                    <div class="item">
                    <?=$or['points_earned']?>
                    </div>
                    <div class="item">
                    <?=$or['points_used']?>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
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