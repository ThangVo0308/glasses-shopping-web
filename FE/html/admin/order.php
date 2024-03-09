<?php 
session_start();
$order=[
    [
        'id'=>1,
        'name'=> 'Nguyen van A',
        'date'=>'27/02/2024',
        'total'=>100000,
        'discount'=>0,
        'status'=>'Shipped'
    ],
    [
        'id'=>2,
        'name'=> 'Nguyen van B',
        'date'=>'24/02/2024',
        'total'=>50000,
        'discount'=>0,
        'status'=>'Pending'
    ],
    ];
?>
<div id="order">
    <div class="header">
    <h2><i class="fa-solid fa-cart-shopping"></i><span> Đơn hàng </span></h2>
    <div class="search-bar">
            <div class="search-input">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input type="text" placeholder="Bạn muốn tìm gì?">
            </div>
            <div class="filter-input">
                <i class="fa-solid fa-filter"></i>
                <select name="" id="" >
                    <option value="All">All</option>
                    <option value="Pending">Pending</option>
                    <option value="Shipping">Shipping</option>
                    <option value="Delivered">Delivered</option>
                    <option value="Cancel">Cancel</option>
                </select>
            </div>
            <div class="date-begin">
                <input type="date" name="" id="" >
            </div>
            <div class="date-end">
                <input type="date" name="" id="" >
            </div>
        </div>
    </div>
    <div class="title-list">
        <div class="title-placeholder">
            <div class="title">Mã đơn hàng</div>
            <div class="title">Tên khách hàng</div>
            <div class="title">Ngày mua hàng</div>
            <div class="title">Giảm giá</div>
            <div class="title">Tổng tiền</div>
            <div class="title">Trạng thái</div>
        </div>
    </div>    
    <div class="list">
        <?php for($i=0;$i <count($order);$i++): ?>
            <div class="placeholder">
                <div class="info">
                    
                        <div class="item">
                            <?=$order[$i]['id']?>
                        </div>
                        <div class="item">
                            <?=$order[$i]['name']?>
                        </div>
                        <div class="item">
                            <?=$order[$i]['date']?>
                        </div>
                        <div class="item">
                            <?=$order[$i]['discount']?>
                        </div>
                        <div class="item">
                            <?=$order[$i]['total']?>
                        </div>
                        <div class="item">
                            <?=$order[$i]['status']?>
                        </div>
                        <div class="item" onclick="loadModalBoxByAjax('detailOrder',<?=$i?>)">
                            <i class="fa-solid fa-circle-info"></i>
                        </div>
                    </div>
                </div>
                <?php endfor; ?>
            </div>
            <div id="modal-box"></div>
    </div>
    </div>
