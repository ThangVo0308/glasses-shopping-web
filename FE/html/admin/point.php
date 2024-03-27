<?php
require_once("../../../BE/BUS/pointBUS.php");
require_once("../../../BE/BUS/userBUS.php");
$point= pointBUS::getInstance()->getAllpoint();
?>
<div id="point">
    <div class="header">
    <h2><i class="fa-solid fa-cart-shopping"></i><span> Điểm tích lũy </span></h2>
    </div>
    <div class="title-list">
        <div class="title-placeholder">
            <div class="title">Mã khách hàng</div>
            <div class="title">Tên khách hàng</div>
            <div class="title">Số điện thoại</div>
            <div class="title">Điểm đã nhận</div>
            <div class="title">Điểm đã dùng</div>
        </div>
    </div>    
    <div class="list">
        <?php foreach($point as $p): ?>
            <div class="placeholder">
                <div class="info">
                    
                        <div class="item">
                            <?=$p['user_id']?>
                        </div>
                        <div class="item">
                        <?php $user= userBUS::getInstance()->getUserById($p['user_id']);
                              echo $user['name'];?>
                        </div>
                        <div class="item">
                        <?=$user['phone']?>
                        </div>
                        <div class="item">
                        <?=$p['points_earned']?>
                        </div>
                        <div class="item">
                        <?=$p['points_used']?>
                        </div>
                        <div class="item" onclick="loadModalBoxByAjax('detailPoint',<?=$p['user_id']?>)">
                            <i class="fa-solid fa-circle-info"></i>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            <div id="modal-box"></div>
    </div>
    </div>