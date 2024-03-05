<?php
session_start();
$product = [
    [
        'id' => 1,
        'name' => 'Sản phẩm 1',
        'category' => 'Gọng kính',
        'gender' => 'Nam',
        'price' => 15000,
        'quantity' => 100,
        'status' => 'Active',
        'image'=>'productDemo.png',
        'describe'=>'tròn',
    ],
    [
        'id' => 2,
        'name' => 'Sản phẩm 2',
        'category' => 'Kính mát',
        'gender' => 'Nữ',
        'price' => 30000,
        'quantity' => 75,
        'status' => 'Inactive',
        'image'=>'productDemo.png',
        'describe'=>'tròn',
    ],
    [
        'id'=>3,
        'name' => 'Sản phẩm 2',
        'category' => 'Kính mát',
        'gender' => 'Nữ',
        'price' => 30000,
        'quantity' => 75,
        'status' => 'Inactive',
        'image'=>'productDemo.png',
        'describe'=>'tròn',
    ],
    [
        'id'=>4,
        'name' => 'Sản phẩm 2',
        'category' => 'Kính mát',
        'gender' => 'Nữ',
        'price' => 30000,
        'quantity' => 75,
        'status' => 'Inactive',
        'image'=>'productDemo.png',
        'describe'=>'tròn',
    ]

];
$category = [
    [
        'category_id' => 1,
        'category_name' =>'Gọng kính',
    ],
    [
        'category_id' => 2,
        'category_name' =>'Kính mát',
    ],
];
$gender = [
    [
        'gender_id' => 0,
        'gender_name' =>'Tất cả',
    ],
    [
        'gender_id' => 1,
        'gender_name' =>'Nam',
    ],
    [
        'gender_id' => 2,
        'gender_name' =>'Nữ',
    ],
];
$status = [
    [
        'status_id' => 1,
        'status_name' =>'Active',
    ],
    [
        'status_id' => 2,
        'status_name' =>'Inactive',
    ],
];
$c=count($product);

?>
<div id="product">
    <div class="header">
        <h2><i class="fa-solid fa-warehouse"></i> Sản phẩm </h2>
        <div class="button-placeholder" onclick="loadModalBoxByAjax('newProduct',<?=$c?>)">
            <div class="new-button">
            <div class="icon-placeholder"><i class="fa-solid fa-user-plus fa-sm"></i></div>
            <div class="info-placeholder">Thêm</div>
            </div>
        </div>
        <div class="search-bar">
            <div class="search-input"><i class="fa-solid fa-magnifying-glass"></i>
            <input type="text" placeholder="Bạn muốn tìm gì?">
            </div>
            <div class="filter-input">
                <i class="fa-solid fa-filter"></i>
                <select name="" id="">
                    <option value="0">All</option>
                    <?php foreach ($category as $cat){
                        echo "<option value='".$cat['category_id']."'>".$cat['category_name']."</option>";
                    }
                    ?>
                </select>
        </div>
        <div class="date-begin price-begin">
            <img src="../../../icons/coin.png">
            <input type="text" name="" id="" placeholder="Giá bắt đầu" value="">
        </div>
        <div class="date-end price-end">
        <i class="fa-solid fa-coins"></i>
            <input type="text" name="" id="" placeholder="Giá kết thúc" value="">
        </div>        
    </div>
    </div>
    <div class="title-list">
        <div class="title-placeholder">
            <div class="title">Mã sản phẩm</div>
            <div class="title">Tên sản phẩm</div>
            <div class="title">Loại kính</div>
            <div class="title">Giới tính</div>
            <div class="title">Giá</div>
            <div class="title">Số lượng</div>
            <div class="title">Trạng thái</div>
        </div>
    </div>
    <div class="list">
        <?php for ($i = 0;$i < count($product);$i++): ?>
            <div class="placeholder">
                <div class="info">
                    <div class="item">
                        <?=$product[$i]['id'] ?>
                    </div>
                    <div class="item name">
                        <?=$product[$i]['name'] ?>
                    </div>
                    <div class="item category">
                        <?=$product[$i]['category'] ?>
                    </div>
                    <div class="item">
                        <?=$product[$i]['gender'] ?>
                    </div>
                    <div class="item">
                        <?=$product[$i]['price'] ?>
                    </div>
                    <div class="item">
                        <?=$product[$i]['quantity'] ?>
                    </div>
                    <div class="item">
                        <?=$product[$i]['status'] ?>
                    </div>
                    <div class="item" onclick="loadModalBoxByAjax('detailProduct',<?=$product[$i]['id']?>)">
                    <i class="fa-solid fa-circle-info" ></i>
                    </div>
                </div>
        </div>
        <?php endfor; ?>
    </div>
    <div id="modal-box"></div>
</div>
