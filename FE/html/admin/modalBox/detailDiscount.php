<?php
$id = intval($_POST['id']);
require_once("../../../BE/BUS/discountBUS.php");
require_once("../../../BE/BUS/productBUS.php");
require_once("../../../BE/BUS/discountItemBUS.php");
$discount = discountBUS::getInstance()->getdiscountById($id);
$discountItem = discountItemBUS::getInstance()-> getProductsFromDiscountItem($id);
?>
<div class="modal-placeholder" id="detail-discount">
    <div class="modal-box">
        <div class="modal-header">
            <h1><i class="fa-solid fa-percent"></i> Chi tiết giảm giá</h1>
            
        </div>
        <div class="modal-left">
        <div class="modal-info">
            <div class="modal-item">
                <div class="item-header">Mã giảm giá</div>
                <div class="item-input"><input type="text" class="discount_id" value="<?=$discount['id']?>" disabled></div>
            </div>
            <div class="modal-item">
                <div class="item-header">% Giảm giá</div>
                <div class="item-input"><input type="text" class="discount_value" value="<?=$discount['discount_percent']?>" disabled></div>
            </div>
            <div class="modal-item" style=" grid-column: 1 / 3; width: 90%; margin: 0 5%;">
                <div class="item-header">Tên chương trình</div>
                <div class="item-input"><input type="text" class="discount_name" value="<?=$discount['name']?>" disabled></div>
            </div>
            <div class="modal-item">
                <div class="item-header">Ngày bắt đầu</div>
                <div class="item-input"><input type="text" class="discount_start" value="<?=$discount['start_day']?>" disabled></div>
            </div>
            <div class="modal-item">
                <div class="item-header">Ngày kết thúc</div>
                <div class="item-input"><input type="text" class="discount_end" value="<?=$discount['end_day']?>" disabled></div>
            </div>
        </div>
    </div>
    <div class="modal-right">
        <div class="title-list">
            <div class="title-placeholder">
                <div class="title">Mã</div>
                <div class="title">Tên sản phẩm</div>
            </div>
        </div>
        <div class="list">
        <?php foreach ($discountItem as $ds):?>
            <div class="placeholder">
                <div class="info">
                    <div class="item" value="">
                        <?=$ds['product_id']?>
                    </div>
                    <div class="item">
                        <?php $product= productBUS::getInstance()->getProductById($ds['product_id']);
                              echo $product['name'];
                        ?>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
    </div>
    </div>
    <div class="modal-button">
    <div class="button-layout"></div>
        <div class="button-layout">
            <div class="edit-button" onclick="loadModalBoxByAjax('editDiscount',<?=$discount['id']?>)">
                <div class="icon-placeholder"><i class="fa-solid fa-pen-to-square"></i></div>
                <div class="info-placeholder">Sửa</div>
            </div>
                <div class="back-button" onclick="closeDetaildiscount()">
                <div class="icon-placeholder"><i class="fa-solid fa-angle-left"></i></div>
                <div class="info-placeholder">Back</div>
                </div>
        </div>
    </div>
</div>
</div>

