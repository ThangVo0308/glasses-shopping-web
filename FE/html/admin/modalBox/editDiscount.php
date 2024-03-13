<div class="modal-placeholder" id="edit-discount">
    <div class="modal-box">
        <div class="modal-header">
            <h1><i class="fa-solid fa-percent"></i> Sửa chi tiết giảm giá</h1>
            
        </div>
    <div class="modal-left">
        <div class="modal-info">
            <div class="modal-item">
                <div class="item-header">Mã giảm giá</div>
                <div class="item-input"><input type="text" class="discount_id" value="1" disabled></div>
            </div>
            <div class="modal-item">
                <div class="item-header">% Giảm giá</div>
                <div class="item-input"><input type="text" class="discount_value" value="15" ></div>
            </div>
            <div class="modal-item" style=" grid-column: 1 / 3; width: 90%; margin: 0 5%;">
                <div class="item-header">Tên chương trình</div>
                <div class="item-input"><input type="text" class="discount_name" value="Khai xuân" ></div>
            </div>
            <div class="modal-item">
                <div class="item-header">Ngày bắt đầu</div>
                <div class="item-input"><input type="date" class="discount_start" value="<?php formatdate('2024/01/01')?>" ></div>
            </div>
            <div class="modal-item">
                <div class="item-header">Ngày kết thúc</div>
                <div class="item-input"><input type="date" class="discount_end" value="<?php formatdate('2024/03/31')?>" ></div>
            </div>
                    </div>
    </div>
    <div class="modal-right">
        <div class="title-list">
            <div class="title-placeholder">
                <div class="title">Mã</div>
                <div class="title">Tên sản phẩm</div>
                <div class="title">Giá</div>
                <div class="title">Số lượng</div>
            </div>
        </div>
    <div class="list">
        <?php for ($i = 0;$i < 1;$i++):?>
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
                    <div class="item">
                        1
                    </div>
                    <div class="item">
                        <i class="fa-solid fa-x" style="color:red"></i>
                    </div>
                </div>
            </div>
            <?php endfor; ?>
    </div>
    </div>
    <div class="modal-button">
    <div class="button-layout"></div>
        <div class="button-layout">
            <div class="edit-button" onclick="">
                <div class="icon-placeholder"><i class="fa-solid fa-pen-to-square"></i></div>
                <div class="info-placeholder">Lưu</div>
            </div>
                <div class="back-button" onclick="loadModalBoxByAjax('detailDiscount')">
                <div class="icon-placeholder"><i class="fa-solid fa-angle-left"></i></div>
                <div class="info-placeholder">Back</div>
                </div>
        </div>
    </div>
</div>
</div>
<?php
function formatdate($date) {
    $arr = explode('/', $date);
    $Date = $arr[0] . '-' . $arr[1] . '-' . $arr[2];
    echo $Date;
} 
?>