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
        <?php for($i=0;$i <1;$i++): ?>
            <div class="placeholder">
                <div class="info">
                    
                        <div class="item">
                            1
                        </div>
                        <div class="item">
                            Nguyen van A
                        </div>
                        <div class="item">
                            0908123123
                        </div>
                        <div class="item">
                            1000
                        </div>
                        <div class="item">
                            250
                        </div>
                        <div class="item" onclick="loadModalBoxByAjax('detailPoint',<?=$i?>)">
                            <i class="fa-solid fa-circle-info"></i>
                        </div>
                    </div>
                </div>
                <?php endfor; ?>
            </div>
            <div id="modal-box"></div>
    </div>
    </div>