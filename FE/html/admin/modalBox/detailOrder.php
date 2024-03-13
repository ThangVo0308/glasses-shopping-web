<?php
session_start();
if(isset($_POST['id'])) {
    $id = intval($_POST['id']);
}   
echo $id;
$order=[
    [
        'id'=>1,
        'name'=> 'Nguyen van A',
        'date'=>'27/02/2024',
        'total'=>100000,
        'discount'=>0,
        'status'=>'Shipped',
        'pointearn'=>100,
        'pointuse'=>0
    ],
    [
        'id'=>2,
        'name'=> 'Nguyen van B',
        'date'=>'24/02/2024',
        'total'=>50000,
        'discount'=>0,
        'status'=>'Pending',
        'pointearn'=>200,
        'pointuse'=>50
    ],
    ];
$detailOrder=[1];
?>
<div class="modal-placeholder" id="detail-order">
    <div class="modal-box">
        <div class="modal-header">
            <h1><i class="fa-solid fa-list"></i> Chi tiết đơn hàng</h1>
            
        </div>
    <div class="modal-left">
        <div class="modal-info">
            <div class="modal-item">
                <div class="item-header">Mã hóa đơn</div>
                <div class="item-input"><input type="text" class="order_id" value="<?= $order[$id]['id']?>" disabled></div>
            </div>
            <div class="modal-item">
                <div class="item-header">Tài khoản</div>
                <div class="item-input"><input type="text" class="user_name" value="<?= $order[$id]['name']?>" disabled></div>
            </div>
            <div class="modal-item">
                <div class="item-header">Ngày mua hàng</div>
                <div class="item-input"><input type="text" class="order_date" value="<?= $order[$id]['date']?>" disabled></div>
            </div>
            <div class="modal-item">
                <div class="item-header">Giảm giá</div>
                <div class="item-input"><input type="text" class="discount_id" value="<?= $order[$id]['discount']?>" disabled></div>
            </div>
            <div class="modal-item">
                <div class="item-header">Điểm tích lũy nhận</div>
                <div class="item-input"><input type="text" class="order_pointearn" value="<?= $order[$id]['pointearn']?>" disabled></div>
            </div>
            <div class="modal-item">
                <div class="item-header">Điểm tích lũy sử dụng</div>
                <div class="item-input"><input type="text" class="order_pointuse" value="<?= $order[$id]['pointuse']?>" disabled></div>
            </div>
            <div class="modal-item">
                <div class="item-header">Tổng tiền</div>
                <div class="item-input"><input type="text" class="order_total" value="<?= $order[$id]['total']?>" disabled></div>
            </div>
            <div class="modal-item">
                <div class="item-header">Trạng thái</div>
                <div class="item-input"><input type="text" class="order_status" value="<?= $order[$id]['status']?>" disabled></div>
            </div>
            <div class="modal-item" style=" grid-column: 1 / 3; width: 90%; margin: 0 5%;">
                    <div class="item-header">Địa chỉ</div>
                    <div class="item-input"><input type="text" class="order_address"
                            value="ĐHSG" disabled></div>
                </div>
        </div>
    </div>
    <div class="modal-right">
        <div class="title-list">
            <div class="title-placeholder">
                <div class="title">Mã s.phẩm</div>
                <div class="title">Tên sản phẩm</div>
                <div class="title">Giá</div>
                <div class="title">Số lượng</div>
            </div>
        </div>
    <div class="list">
        <?php for ($i = 0;$i < count($detailOrder);$i++):?>
            <div class="placeholder">
                <div class="info">
                    <div class="item" value="">
                        1
                    </div>
                    <div class="item">
                        Kính tròn
                    </div>
                    <div class="item">
                        1000000
                    </div>
                    <div class="item" style="border-right:none;">
                        1
                    </div>
                </div>
            </div>
            <?php endfor; ?>
    </div>
    </div>
    <div class="modal-button">
    <div class="button-layout"></div>
        <div class="button-layout">
            <div class="edit-button" onclick="loadModalBoxByAjax('editOrder',<?=$id?>)">
                <div class="icon-placeholder"><i class="fa-solid fa-pen-to-square"></i></div>
                <div class="info-placeholder">Sửa</div>
            </div>
                <div class="back-button" onclick="closeDetailorder()">
                <div class="icon-placeholder"><i class="fa-solid fa-angle-left"></i></div>
                <div class="info-placeholder">Back</div>
                </div>
        </div>
    </div>
</div>
</div>

