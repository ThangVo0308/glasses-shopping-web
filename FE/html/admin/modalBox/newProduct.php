<?php
session_start();
$newid = intval($_POST['id']) + 1;
$category = [
    [
        'category_id' => 1,
        'category_name' => 'Gọng kính',
    ],
    [
        'category_id' => 2,
        'category_name' => 'Tròng kính',
    ],
    [
        'category_id' => 3,
        'category_name' => 'Phụ kiện',
    ]
];
$gender = [
    [
        'gender_id' => 0,
        'gender_name' => 'Nữ',
    ],
    [
        'gender_id' => 1,
        'gender_name' => 'Nam',
    ],
    [
        'gender_id' => 2,
        'gender_name' => 'Unisex',
    ],
];
$status = [
    [
        'status_id' => "active",
    ],
    [
        'status_id' => "soldout",
    ],
    [
        'status_id' => "banned",
    ],
];
?>
<div class="modal-placeholder" id="new-product">
    <div class="modal-box">
        <div class="modal-header">
            <h1><i class=""></i>Chi tiết sản phẩm</h1>
        </div>
        <div class="modal-left">
            <div class="modal-info">
                <div class="modal-item">
                    <div class="item-header">Mã sản phẩm</div>
                    <div class="item-input"><input type="text" class="product_id" value="<?= $newid ?>" disabled></div>
                </div>
                <div class="modal-item">
                    <div class="item-header">Tên sản phẩm</div>
                    <div class="item-input"><input type="text" class="product_name" value=""></div>
                </div>
                <div class="modal-item">
                    <div class="item-header">Loại sản phẩm</div>
                    <div class="item-input"><select class="product_kind" name="" id="">
                            <option value="<?= $category[0]['category_id'] ?>">
                                <?= $category[0]['category_name'] ?>
                            </option>
                            <?php $dc = [
                                'id' => $category[0]['category_id'],
                                'name' => $category[0]['category_name']
                            ] ?>
                            <?php foreach ($category as $cat): ?>
                                <?php if ($cat['category_id'] == $dc['id']) {
                                    continue;
                                }
                                ?>
                                <option value="<?= $cat['category_id'] ?>">
                                    <?= $cat['category_name'] ?>
                                </option>
                            <?php endforeach ?>
                        </select>
                    </div>
                </div>
                <div class="modal-item">
                    <div class="item-header">Giới tính</div>
                    <div class="item-input"><select class="product_gender" name="" id="">
                            <option value="<?= $gender[2]['gender_id'] ?>">
                                <?= $gender[2]['gender_name'] ?>
                            </option>
                            <?php $dg = [
                                'id' => $gender[2]['gender_id'],
                                'name' => $gender[2]['gender_name']
                            ] ?>
                            <?php foreach ($gender as $g): ?>
                                <?php if ($g['gender_id'] == $dg['id']) {
                                    continue;
                                }
                                ?>
                                <option value="<?= $g['gender_id'] ?>">
                                    <?= $g['gender_name'] ?>
                                </option>
                            <?php endforeach ?>
                        </select>
                    </div>
                </div>
                <div class="modal-item">
                    <div class="item-header">Giá</div>
                    <div class="item-input"><input type="text" class="product_price" value="">
                    </div>
                </div>
                <div class="modal-item">
                    <div class="item-header">Trạng thái</div>
                    <div class="item-input"><select class="product_status" name="" id="">
                            <option value="<?= $status[0]['status_id'] ?>">
                                <?= $status[0]['status_id'] ?>
                            </option>
                            <?php $ds = $status[0]['status_id'] ?>
                            <?php foreach ($status as $s): ?>
                                <?php if ($s['status_id'] == $ds) {
                                    continue;
                                }
                                ?>
                                <option value="<?= $s['status_id'] ?>">
                                    <?= $s['status_id'] ?>
                                </option>
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
                    <img width="100%" alt="img" style="height: 200px;width:auto;margin-left:40px;">
                    <input type="button" value="Change" onclick="|">
                    <input type="button" value="Delete" onclick="">
                </div>
                <div class="modal-item">
                    <div class="item-header" style="font-size:calc(10px + 1vw);margin-left:10px">Mô tả</div>
                    <div class="item-input"><textarea cols="30" class="product_description" rows="6"></textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-button">
            <div class="button-layout"></div>
            <div class="button-layout">
                <div class="edit-button" id="addBtn" onclick="newProduct()">
                    <div class="icon-placeholder"><i class="fa-solid fa-pen-to-square"></i></div>
                    <div class="info-placeholder">Thêm</div>
                </div>
                <div class="back-button" onclick="closeNewproduct()">
                    <div class="icon-placeholder"><i class="fa-solid fa-angle-left"></i></div>
                    <div class="info-placeholder">Hủy</div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>


</script>