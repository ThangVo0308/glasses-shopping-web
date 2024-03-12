<?php
$id=$_POST['id'];
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
$detailSupply=[
    [
        'product_id'=>1,
        'price'=>1,
        'quantity'=>1
    ],
    [
        'product_id'=>2,
        'price'=>2,
        'quantity'=>2
    ],
]
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
                <div class="item-input"><input type="text" class="supply_id" value="<?=$supply[$id]['id']?>" disabled>
                </div>
            </div>
            <div class="modal-item">
                <div class="item-header">Người nhập</div>
                <div class="item-input"><input type="text" class="supply_user" value="<?=$supply[$id]['user']?>" disabled>
                </div>
            </div>
            <div class="modal-item">
                    <div class="item-header">Ngày nhập</div>
                    <div class="item-input"><input type="text" class="supply_date"
                            value="<?= date("d/m/Y", strtotime($supply[$id]['date'])) ?> " disabled>
                    </div>
            </div>
            <div class="modal-item">
                <div class="item-header">Tổng tiền</div>
                <div class="item-input"><input type="text" class="supply_total" value="<?=$supply[$id]['total']?>" disabled>
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
            <?php for ($i =0;$i <count($detailSupply);$i++): ?>
                <div class="placeholder">
                    <div class="info">
                        <div class="item" style="padding: right 1px;">
                        1
                        </div>
                        <div class="item" style="padding: right 5px;">
                            3
                        </div>
                        <div class="item">
                            23333
                        </div>
                        <div class="item">
                            50
                        </div>
                    </div>
                </div>
                <?php endfor;?>
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

                        