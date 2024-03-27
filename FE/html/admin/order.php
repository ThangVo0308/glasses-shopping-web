<?php 
session_start();
require_once("../../../BE/BUS/orderBUS.php");
require_once("../../../BE/BUS/orderItemBUS.php");
require_once("../../../BE/BUS/userBUS.php");
$order = orderBUS::getInstance()->getAllorder();

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
            <div class="title">Điểm nhận</div>
            <div class="title">Điểm dùng</div>
            <div class="title">Tổng tiền</div>
            <div class="title">Trạng thái</div>
        </div>
    </div>    
    <div class="list">
        <?php foreach($order as $or): ?>
            <div class="placeholder">
                <div class="info">
                    
                        <div class="item">
                            <?=$or['id']?>
                        </div>
                        <div class="item">
                            <?php $name= userBUS::getInstance()->getUserById($or['user_id']);
                            echo $name['username'];?>
                        </div>
                        <div class="item">
                            <?=$or['order_date']?>
                        </div>
                        <div class="item">
                            <?=$or['points_earned']?>
                        </div>
                        <div class="item">
                            <?=$or['points_used']?>
                        </div>
                        <div class="item">
                            <?=$or['total_price']?>
                        </div>
                        <div class="item">
                            <?=$or['status']?>
                        </div>
                        <div class="item" onclick="loadModalBoxByAjax('detailOrder',<?=$or['id']?>)">
                            <i class="fa-solid fa-circle-info"></i>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            <div id="modal-box"></div>
    </div>
    </div>
