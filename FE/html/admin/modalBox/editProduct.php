<?php
session_start();
if(isset($_POST['id'])) {
    $id = intval($_POST['id']);
}   
require_once("../../../BE/BUS/categoryBUS.php");
require_once("../../../BE/BUS/productBUS.php");
$product = productBUS::getInstance()->getProductById($id);
$category = categoryBUS::getInstance()->getAllCategory();
$gender=[
    [
    'id'=>1,
    'name'=>"Nam"
    ],
    [
        'id'=>0,
        'name'=>"Nữ"
    ],
    [
        'id'=>2,
        'name'=>"Unisex"
        ]
    ];
$status=[
    [
        'id'=>"active",
    ],
    [
        'id'=>"soldout",
    ],
    ];
?>
<div class="modal-placeholder" id="edit-product">
    <div class="modal-box">
        <div class="modal-header">
            <h1><i class=""></i>Chi tiết sản phẩm</h1>
        </div>
        <div class="modal-left">
        <div class="modal-info">
                <div class="modal-item">
                    <div class="item-header">Mã sản phẩm</div>
                    <div class="item-input"><input type="text" class="product_id" value="<?= $product['id']?>" disabled></div>
                </div> 
                <div class="modal-item">
                    <div class="item-header">Tên sản phẩm</div>
                    <div class="item-input"><input type="text" class="product_name" value="<?= $product['name']?>" ></div>
                </div>
                <div class="modal-item">
                <div class="item-header">Loại sản phẩm</div>
                <div class="item-input"><select class="product_kind" name="" id="" >
                    <option value="<?= $product['category_id'] ?>"><?php $categoryInfo = CategoryBUS::getInstance()->getCategoryById(intval($product['category_id']));
                        echo $categoryInfo['name'];
                        ?></option>
                    <?php foreach ($category as $cat): ?>
                        <?php if ($cat['id']==$product['category_id']){
                            continue;
                        }
                        ?>
                        <option value="<?= $cat['id']?>"><?=$cat['name']?></option>
                        <?php endforeach ?>
                </select>
                </div>
                </div>
                <div class="modal-item">
                <div class="item-header">Giới tính</div>
                <div class="item-input"><select class="product_gender" name="" id="">
                    <option value="<?= $product['gender'] ?>"><?php if($product['gender']==1){
                            echo "Nam";
                        } else if($product['gender']==0){
                            echo "Nữ";
                        } else {echo "Unisex";}?></option>
                    <?php foreach ($gender as $g): ?>
                        <?php if($g['id']==$product['gender']){
                            continue;
                        }
                        ?>
                        <option value="<?=$g['id']?>"><?=$g['name']?></option>
                        <?php endforeach ?>
                </select>
                </div>
                </div>
                <div class="modal-item">
                    <div class="item-header">Giá</div>
                    <div class="item-input"><input type="text" class="product_price" value="<?= $product['price'] ?>" >
                    </div>
                </div>
                <div class="modal-item">
                    <div class="item-header">Số lượng</div>
                    <div class="item-input"><input type="text" class="product_quantity" value="<?= $product  ['quantity'] ?>"
                            disabled></div>
                </div>
                <div class="modal-item">
                <div class="item-header">Trạng thái</div>
                <div class="item-input"><select class="product_status" name="" id="" >
                    <option value="<?= $product['status'] ?>"><?= $product['status']?></option>
                    <?php foreach ($status as $s): ?>
                        <?php if($s['id']==$product['status']){
                            continue;
                        }
                        ?>
                        <option value="<?=$s['id']?>"><?=$s['id']?></option>
                        <?php endforeach ?>
                </select>
                </div>
                </div>
                <div class="modal-item"></div>
                </div>
                </div>
        <div class="modal-right">
            <div class="modal-item">
                <div class="item-header" style="font-size:calc(10px + 1vw);margin-left:10px">Hình ảnh</div>
                <div class="item-input img-container">
                    <img width="100%" name="product_image" src="../images/<?=$product['image']?>" alt="img" style="height: 200px;width:auto;margin-left:40px;">
                    <input type="button" value="Change" onclick="uploadImg()">
                    <input type="button" value="Delete" onclick="deleteImg()">
                </div>
                <div class="modal-item">
                    <div class="item-header" style="font-size:calc(10px + 1vw);margin-left:10px">Mô tả</div>
                    <div class="item-input"><textarea cols="30" class="product_description" rows="6"
                            ><?= $product['description'] ?></textarea>
                    </div>
                </div> 
        </div>
        </div>
        <div class="modal-button">
            <div class="button-layout"></div>
            <div class="button-layout">
                <div class="edit-button" onclick="updateProduct(<?=$product['id']?>)">
                <div class="icon-placeholder"><i class="fa-solid fa-pen-to-square"></i></div>
                <div class="info-placeholder">Lưu</div>
                </div>
                <div class="back-button" onclick="loadModalBoxByAjax('detailProduct',<?=$product['id']?>)">
                <div class="icon-placeholder"><i class="fa-solid fa-angle-left"></i></div>
                <div class="info-placeholder">Hủy</div>
                </div>
            </div>
        </div>
    </div>
</div>
 
    
