<?php
$id=$_POST['id']+1;
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
];
$currentdate=date('d/m/Y');
?>
<div class="modal-placeholder" id="new-supply">
    <div class="modal-box">
        <div class="modal-header">
            <h1><i class="fa-solid fa-box"></i> Chi tiết nhập hàng</h1>
        </div>
        <div class="modal-left">
            <div class="modal-info">
            <div class="modal-item">
                <div class="item-header">Mã nhập hàng</div>
                <div class="item-input"><input type="text" class="supply_id" value="<?=$id?>" disabled>
                </div>
            </div>
            <div class="modal-item">
                <div class="item-header">Người nhập</div>
                <div class="item-input"><input type="text" class="supply_user" value="Admin" disabled>
                </div>
            </div>
            <div class="modal-item">
                    <div class="item-header">Ngày nhập</div>
                    <div class="item-input"><input type="text" class="supply_date"
                            value="<?=$currentdate?> " disabled>
                    </div>
            </div>
            <div class="modal-item">
                <div class="item-header">Tổng tiền</div>
                <div class="item-input"><input type="text" class="supply_total" value="?" disabled>
                </div>
            </div>
        </div>
        </div>
    <div class="modal-right">
        <div class="title-list" style="font-size: calc(1px + 1vw);">
            <div class="title-placeholder" style="margin: auto 20% auto 17%;">
                <div class="title">No.</div>
                <div class="title">Mã s.phẩm</div>
                <div class="title">Giá</div>
                <div class="title">Số lượng</div>
            </div>
        </div>
        <div class="list">
        <div class="placeholder">
                <div class="info">
                    <div class="item" value="">
                        1
                    </div>
                    <div class="item">
                        Kính
                    </div>
                    <div class="item">
                        12345
                    </div>
                    <div class="item">
                        54321
                    </div>
                    <div class="item">
                        <i class="fa-solid fa-x" style="color:red"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="btnAdd">
            <input type="button" value="+" onclick="openAddproduct()">
        </div>
    </div>
    <div class="modal-button">
        <div class="button-layout"></div>
        <div class="button-layout">
            <div class="add-button">
            <div class="icon-placeholder"><i class="fa-solid fa-plus"></i></div>
            <div class="info-placeholder">Lưu</div>
            </div>
            <div class="back-button" onclick="closeNewsupply()">
            <div class="icon-placeholder"><i class="fa-solid fa-angle-left"></i></div>
            <div class="info-placeholder">Hủy</div>
            </div>
        </div>
    </div>
</div>
</div>
<div class="modal-placeholder" id="add_exist_product">
    <div class="modal-box">
        <h1><i class="fa-regular fa-pen-to-square"></i>Thêm sản phẩm</h1>
        <div id="suggestion-container">
            <label for="my-input">Nhập mã hoặc tên sản phẩm:</label> <br> <br>
            <input type="text" id="my-input" name="my-input">
        </div><br>
        <div class="modal-button">
            <input type="button" class="btn-add" value="Thêm" >
            <input type="button" class="btn-cancel" value="Hủy" onclick="closeAddproduct()" >
        </div>
    </div>
</div>
