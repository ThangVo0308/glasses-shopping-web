<?php
$id=intval($_POST['id']);
require_once("../../../BE/BUS/importBUS.php");
require_once("../../../BE/BUS/importItemBUS.php");
require_once("../../../BE/BUS/userBUS.php");
$import = importBUS::getInstance()->getImportById($id);
$item = importItemBUS::getInstance()->getimportItemById($id);
?>
<div class="modal-placeholder" id="detail-supply">
    <div class="modal-box">
        <div class="modal-header">
            <h1><i class="fa-solid fa-box"></i> Chi tiết nhập hàng</h1>
        </div>
        <div class="modal-left">
            <div class="modal-info">
            <div class="modal-item">
                <div class="item-header">Mã nhập hàng</div>
                <div class="item-input"><input type="text" class="supply_id" value="<?=$import['id']?>" disabled>
                </div>
            </div>
            <div class="modal-item">
                <div class="item-header">Mã nhân viên</div>
                <div class="item-input"><input type="text" class="supply_user" value="<?=$import['user_id']?>" disabled>
                </div>
            </div>
            <div class="modal-item">
                <div class="item-header">Tên nhân viên</div>
                <div class="item-input"><input type="text" class="supply_user" value="<?php $user =userBUS::getInstance()->getUserById($import['user_id']);
                    echo $user['name']; ?>" disabled>
                </div>
            </div>
            <div class="modal-item">
                <div class="item-header">Tổng tiền</div>
                <div class="item-input"><input type="text" class="supply_total" value="<?=$import['total_price']?>" disabled>
                </div>
            </div>
            <div class="modal-item" style=" grid-column: 1 / 3; width: 90%; margin: 0 5%;">
                    <div class="item-header">Ngày nhập</div>
                    <div class="item-input"><input type="text" class="supply_date"
                            value="<?=$import['import_date']?> " disabled>
                    </div>
            </div>
            
        </div>
        </div>
    <div class="modal-right">
        <div class="title-list">
            <div class="title-placeholder" style="margin: auto 20% auto 15%;">
                <div class="title">No.</div>
                <div class="title">Mã s.phẩm</div>
                <div class="title">Giá</div>
                <div class="title">Số lượng</div>
            </div>
        </div>
        <div class="list">
            <?php $a=1;foreach ($item as $i): ?>
                <div class="placeholder">
                    <div class="info">
                        <div class="item" style="padding: right 1px;">
                        <?=$a?>
                        </div>
                        <div class="item" style="padding: right 5px;">
                            <?=$item['product_id']?>
                        </div>
                        <div class="item">
                            <?=$item['price']?>
                        </div>
                        <div class="item">
                            <?=$item['quantity']?>
                        </div>
                    </div>
                </div>
                <?php $a+=1;
            endforeach;?>
        </div>
    </div>
    <div class="modal-button">
        <div class="button-layout"></div>
        <div class="button-layout">
            <div></div>
            <div class="back-button" onclick="closeDetailsupply()">
            <div class="icon-placeholder"><i class="fa-solid fa-angle-left"></i></div>
            <div class="info-placeholder">Back</div>
            </div>
        </div>
    </div>
</div>
</div>

                        