<?php
session_start();
if(isset($_POST['id'])) {
    $id = intval($_POST['id']);
}   
require_once("../../../BE/BUS/orderBUS.php");
require_once("../../../BE/BUS/orderItemBUS.php");
require_once("../../../BE/BUS/userBUS.php");
require_once("../../../BE/BUS/productBUS.php");

$order= orderBUS::getInstance()->getOrderById($id);
$orderItem = orderItemBUS::getInstance()->getProductsFromOrderItem($id);

?>
<div class="modal-placeholder" id="edit-order">
    <div class="modal-box">
        <div class="modal-header">
            <h1><i class="fa-solid fa-list"></i> Cập nhật đơn hàng</h1>
            
        </div>
    <div class="modal-left">
        <div class="modal-info">
            <div class="modal-item">
                <div class="item-header">Mã hóa đơn</div>
                <div class="item-input"><input type="text" class="order_id" value="<?= $order['id']?>" disabled></div>
            </div>
            <div class="modal-item">
                <div class="item-header">Tài khoản</div>
                <div class="item-input"><input type="text" class="user_name" value="<?php $user= userBUS::getInstance()->getUserById($order['user_id']);
                            echo $user['username'];?>" disabled></div>
            </div>
            <div class="modal-item">
                <div class="item-header">Ngày mua hàng</div>
                <div class="item-input"><input type="text" class="order_date" value="<?= $order['order_date']?>" disabled></div>
            </div>
            <div class="modal-item">
                <div class="item-header">Giảm giá</div>
                <div class="item-input"><input type="text" class="discount_id" value="Chưa có" disabled></div>
            </div>
            <div class="modal-item">
                <div class="item-header">Điểm tích lũy nhận</div>
                <div class="item-input"><input type="text" class="order_pointearn" value="<?= $order['points_earned']?>" disabled></div>
            </div>
            <div class="modal-item">
                <div class="item-header">Điểm tích lũy sử dụng</div>
                <div class="item-input"><input type="text" class="order_pointuse" value="<?= $order['points_used']?>" disabled></div>
            </div>
            <div class="modal-item">
                <div class="item-header">Tổng tiền</div>
                <div class="item-input"><input type="text" class="order_total" value="<?= $order['total_price']?>" disabled></div>
            </div>
            <div class="modal-item">
                <div class="item-header">Trạng thái</div>
                <div class="item-input"><select class="order_status">
                    <option value="<?= $order['status']?>"><?=$order['status']?></option>
                    <?php if($order['status']=='pending'){
                        $status="confirm";echo "<option value=\"$status\">$status</option>";
                    } else if($order['status']=='confirm') { $status="ordered";echo "<option value=\"$status\">$status</option>";
                    } else if($order['status']=='ordered'){ 
                    }
                    ?>
                    
                    </select>
            </div>
            </div>
            <div class="modal-item" style=" grid-column: 1 / 3; width: 90%; margin: 0 5%;">
                    <div class="item-header">Địa chỉ</div>
                    <div class="item-input"><input type="text" class="order_address"
                            value="<?=$user['address'] ?>" disabled></div>
                </div>
        </div>
    </div>
    <div class="modal-right">
        <div class="title-list">
            <div class="title-placeholder">
                <div class="title">Mã s.phẩm</div>
                <div class="title">Tên s.phẩm</div>
                <div class="title">Mã g.giá</div>
                <div class="title">Giá</div>
                <div class="title">S.lượng</div>
            </div>
        </div>
    <div class="list">
        <?php foreach ($orderItem as $oi):?>
            <div class="placeholder">
                <div class="info">
                    <div class="item" value="">
                        <?=$oi['product_id']?>
                    </div>
                    <div class="item">
                        <?php $product= productBUS::getInstance()->getProductById($oi['product_id']);
                        echo $product['name'];?>
                    </div>
                    <div class="item">
                        <?=$oi['discount_id']?>
                    </div>
                    <div class="item">
                        <?=$oi['price']?>
                    </div>
                    <div class="item">
                        <?=$oi['quantity']?>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
    </div>
    </div>
    <div class="modal-button">
    <div class="button-layout"></div>
        <div class="button-layout">
            <div class="edit-button" onclick="updateOrder()">
                <div class="icon-placeholder"><i class="fa-solid fa-pen-to-square"></i></div>
                <div class="info-placeholder">Lưu</div>
            </div>
                <div class="back-button" onclick="loadModalBoxByAjax('detailOrder',<?=$id?>)">
                <div class="icon-placeholder"><i class="fa-solid fa-angle-left"></i></div>
                <div class="info-placeholder">Back</div>
                </div>
        </div>
    </div>
</div>
</div>

