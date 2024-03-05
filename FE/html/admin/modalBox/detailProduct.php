<?php
session_start();
if(isset($_POST['id'])) {
    $id = intval($_POST['id'])-1;
}   
echo $id;
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
                    <div class="item-input"><input type="text" class="product_id" value="<?= $product[$id]['id']?>" disabled></div>
                </div> 
                <div class="modal-item">
                    <div class="item-header">Tên sản phẩm</div>
                    <div class="item-input"><input type="text" class="product_name" value="<?= $product[$id]['name']?>" disabled></div>
                </div>
                <div class="modal-item">
                <div class="item-header">Loại sản phẩm</div>
                <div class="item-input"><select class="product_kind" name="" id="" disabled>
                    <option value="<?= $product[$id]['category'] ?>"><?= $product[$id]['category']?></option>
                </select>
                </div>
                </div>
                <div class="modal-item">
                <div class="item-header">Giới tính</div>
                <div class="item-input"><select class="product_gender" name="" id="" disabled>
                    <option value="<?= $product[$id]['gender'] ?>"><?= $product[$id]['gender']?></option>
                </select>
                </div>
                </div>
                <div class="modal-item">
                    <div class="item-header">Giá</div>
                    <div class="item-input"><input type="text" class="product_price" value="<?= $product[$id]['price'] ?>" disabled>
                    </div>
                </div>
                <div class="modal-item">
                    <div class="item-header">Số lượng</div>
                    <div class="item-input"><input type="text" class="product_quantity" value="<?= $product[$id]  ['quantity'] ?>"
                            disabled></div>
                </div>
                <div class="modal-item">
                <div class="item-header">Trạng thái</div>
                <div class="item-input"><select class="product_status" name="" id="" disabled>
                    <option value="<?= $product[$id]['status'] ?>"><?= $product[$id]['status']?></option>
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
                    <img width="100%" src="../../../images/products/<?=$product[$id]['image']?>" alt="img" style="height: 200px;width:auto;margin-left:40px;">

                </div>
                <div class="modal-item">
                    <div class="item-header" style="font-size:calc(10px + 1vw);margin-left:10px">Mô tả</div>
                    <div class="item-input"><textarea cols="30" class="product_describe" rows="6"
                            disabled><?= $product[$id]['describe'] ?></textarea>
                    </div>
                </div> 
        </div>
        </div>
        <div class="modal-button">
            <div class="button-layout"></div>
            <div class="button-layout">
                <div class="edit-button" onclick ="loadModalBoxByAjax('editProduct',<?=$product[$id]['id']?>)">
                <div class="icon-placeholder"><i class="fa-solid fa-pen-to-square"></i></div>
                <div class="info-placeholder">Sửa</div>
                </div>
                <div class="delete-button" >
                <div class="icon-placeholder"><i class="fa-solid fa-xmark"></i></div>
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
 
    
