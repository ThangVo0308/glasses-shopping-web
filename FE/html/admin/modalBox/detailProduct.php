<?php
session_start();
if(isset($_POST['id'])) {
    $id = intval($_POST['id']);
}   
require_once("../../../BE/BUS/categoryBUS.php");
require_once("../../../BE/BUS/productBUS.php");
$product = productBUS::getInstance()->getProductById($id);
$category = categoryBUS::getInstance()->getAllCategory();
?>
<div class="modal-placeholder" id="detail-product">
    <div class="modal-box">
        <div class="modal-header">
            <h1><i class=""></i><i class="fa-solid fa-list"></i>  Chi tiết sản phẩm</h1>
        </div>
        <div class="modal-left">
        <div class="modal-info">
                <div class="modal-item">
                    <div class="item-header">Mã sản phẩm</div>
                    <div class="item-input"><input type="text" class="product_id" value="<?= $product['id']?>" disabled></div>
                </div> 
                <div class="modal-item">
                    <div class="item-header">Tên sản phẩm</div>
                    <div class="item-input"><input type="text" class="product_name" value="<?= $product['name']?>" disabled></div>
                </div>
                <div class="modal-item">
                <div class="item-header">Loại sản phẩm</div>
                <div class="item-input"><select class="product_kind" name="" id="" disabled>
                    <option value="<?= $product['category_id'] ?>">
                    <?php $categoryInfo = CategoryBUS::getInstance()->getCategoryById(intval($product['category_id']));
                        echo $categoryInfo['name'];
                        ?></option>
                </select>
                </div>
                </div>
                <div class="modal-item">
                <div class="item-header">Giới tính</div>
                <div class="item-input"><select class="product_gender" name="" id="" disabled>
                    <option value="<?= $product['gender'] ?>"><?php if($product['gender']==1){
                            echo "Nam";
                        } else if($product['gender']==0){
                            echo "Nữ";
                        } else {echo "Unisex";}?></option>
                </select>
                </div>
                </div>
                <div class="modal-item">
                    <div class="item-header">Giá</div>
                    <div class="item-input"><input type="text" class="product_price" value="<?= $product['price'] ?>" disabled>
                    </div>
                </div>
                <div class="modal-item">
                    <div class="item-header">Số lượng</div>
                    <div class="item-input"><input type="text" class="product_quantity" value="<?= $product  ['quantity'] ?>"
                            disabled></div>
                </div>
                <div class="modal-item">
                <div class="item-header">Trạng thái</div>
                <div class="item-input"><select class="product_status" name="" id="" disabled>
                    <option value="<?= $product['status'] ?>"><?= $product['status']?></option>
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
                    <img width="100%" src="../images/<?=$product['image']?>" alt="img" style="height: 200px;width:auto;margin-left:40px;">

                </div>
                <div class="modal-item">
                    <div class="item-header" style="font-size:calc(10px + 1vw);margin-left:10px">Mô tả</div>
                    <div class="item-input"><textarea cols="30" class="product_describe" rows="6"
                            disabled><?= $product['description'] ?></textarea>
                    </div>
                </div> 
        </div>
        </div>
        <div class="modal-button">
            <div class="button-layout"></div>
            <div class="button-layout">
                <div class="edit-button" onclick ="loadModalBoxByAjax('editProduct',<?=$product['id']?>)">
                <div class="icon-placeholder"><i class="fa-solid fa-pen-to-square"></i></div>
                <div class="info-placeholder">Sửa</div>
                </div>
                <div class="delete-button" onclick ="deleteProduct(<?=$product['id']?>)">
                <div class="icon-placeholder"><i class="fa-solid fa-xmark" ></i></div>
                <div class="info-placeholder">Xóa</div>
                </div>  
                <div class="back-button" onclick="closeDetailproduct()">
                <div class="icon-placeholder"><i class="fa-solid fa-angle-left"></i></div>
                <div class="info-placeholder">Back</div>
                </div>
            </div>
</div>
    </div>
</div>
 <script>

