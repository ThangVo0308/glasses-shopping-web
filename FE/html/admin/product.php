<?php
session_start();
require_once("../../../BE/BUS/productBUS.php");
require_once("../../../BE/BUS/categoryBUS.php");
$c= productBUS::getInstance()->getTotal();  
    $product = productBUS::getInstance()->getAllProduct();
    $cate = categoryBUS::getInstance()->getAllCategory();  
if(isset($_POST['name']) )
{
    $name=$_POST['name'];
    $product=productBUS::getInstance()->searchProduct($name,null,0,null,null);
}   else {
    $product = productBUS::getInstance()->getAllProduct();
    
}

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
            <input type="text" placeholder="Bạn muốn tìm gì?" onchange="loadProductByAjax()">
            </div>
            <div class="filter-input">
                <i class="fa-solid fa-filter"></i>
                <select name="" id="" onchange="">
                    <option value="0">All</option>
                    <?php foreach ($cate as $cat){
                        echo "<option value='".$cat['id']."'>".$cat['name']."</option>";
                    }
                    ?>
                </select>
        </div>
        <div class="date-begin price-begin">
            <img src="../icons/coin.png">
            <input type="text" name="" id="" placeholder="Giá bắt đầu" value="" onchange="">
        </div>
        <div class="date-end price-end">
        <i class="fa-solid fa-coins"></i>
            <input type="text" name="" id="" placeholder="Giá kết thúc" value="" onchange="">
        </div>        
    </div>
    </div>
    <div class="title-list">
        <div class="title-placeholder">
            <div class="title">Mã sản phẩm</div>
            <div class="title">Tên sản phẩm</div>
            <div class="title">Phân loại</div>
            <div class="title">Giới tính</div>
            <div class="title">Giá</div>
            <div class="title">Số lượng</div>
            <div class="title">Trạng thái</div>
        </div>
    </div>
    <div class="list">
        <?php foreach ($product as $p): ?>
            <div class="placeholder">
                <div class="info">
                    <div class="item">
                        <?=$p['id'] ?>    
                    </div>
                    <div class="item name">
                        <?=$p['name'] ?>
                    </div>
                    <div class="item category">
                        <?php         
                        $categoryInfo = CategoryBUS::getInstance()->getCategoryById(intval($p['category_id']));
                        echo $categoryInfo['name'];
                        ?>
                    </div>
                    <div class="item">
                        <?php if($p['gender']==1){
                            echo "Nam";
                        } else if($p['gender']==0){
                            echo "Nữ";
                        } else {echo "Unisex";}?>
                    </div>
                    <div class="item">
                        <?=$p['price'] ?>
                    </div>
                    <div class="item">
                        <?=$p['quantity'] ?>
                    </div>
                    <div class="item">
                        <?=$p['status'] ?>
                    </div>
                    <div class="item" onclick="loadModalBoxByAjax('detailProduct',<?=$p['id']?>)">
                    <i class="fa-solid fa-circle-info" ></i>
                    </div>
                </div>
        </div>
        <?php endforeach; ?>
    </div>
    <div id="modal-box"></div>
</div>
<?php 
?>