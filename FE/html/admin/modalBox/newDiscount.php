<div class="modal-placeholder" id="new-discount">
    <div class="modal-box">
        <div class="modal-header">
            <h1><i class="fa-solid fa-percent"></i> Thêm giảm giá</h1>
            
        </div>
    <div class="modal-left">
        <div class="modal-info">
            <div class="modal-item">
                <div class="item-header">Mã giảm giá</div>
                <div class="item-input"><input type="text" class="discount_id" value="2" disabled></div>
            </div>
            <div class="modal-item">
                <div class="item-header">% Giảm giá</div>
                <div class="item-input"><input type="text" class="discount_value" value="" ></div>
            </div>
            <div class="modal-item" style=" grid-column: 1 / 3; width: 90%; margin: 0 5%;">
                <div class="item-header">Tên chương trình</div>
                <div class="item-input"><input type="text" class="discount_name" value="" ></div>
            </div>
            <div class="modal-item">
                <div class="item-header">Ngày bắt đầu</div>
                <div class="item-input"><input type="date" class="discount_start" value="" ></div>
            </div>
            <div class="modal-item">
                <div class="item-header">Ngày kết thúc</div>
                <div class="item-input"><input type="date" class="discount_end" value="" ></div>
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
            <div class="btnAdd">
            <input type="button" value="+" onclick="openAddproduct()">  
        </div>
    </div>
    </div>
    <div class="modal-button">
    <div class="button-layout"></div>
        <div class="button-layout">
            <div class="edit-button" onclick="loadModalBoxByAjax('editDiscount')">
                <div class="icon-placeholder"><i class="fa-solid fa-pen-to-square"></i></div>
                <div class="info-placeholder">Lưu</div>
            </div>
                <div class="back-button" onclick="closeNewdiscount()">
                <div class="icon-placeholder"><i class="fa-solid fa-angle-left"></i></div>
                <div class="info-placeholder">Back</div>
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
