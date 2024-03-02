<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sản Phẩm</title>
</head>

<body>
    <iframe src="../path.php" frameborder="0" id="pathProducts"></iframe>

    <h3 id="title">Mắt kính chính hãng PreVision</h3>

    <div id="signature">
        <div>
            <div class="item">
                <img src="../../../icons/premium.gif" alt="">
                <div>Hàng chính hãng, chất lượng cao</div>
            </div>
            <div class="item">
                <img src="../../../icons/cart.gif" alt="">
                <div>Miễn phí giao hàng với đơn 200k</div>
            </div>
            <div class="item">
                <img src="../../../icons/change.gif" alt="">
                <div>Đổi hàng 7 ngày, thủ tục đơn giản</div>
            </div>
        </div>
    </div>

    <div id="main">
        <div id="filter">
            <div id="filter-header">
                <div>Tìm kiếm </div>
                <button id="delete-btn">Xóa</button>
            </div>
            <div id="type" class="option-filter">
                <div class="btn" onclick="toggleDropdown('type-value',0)">
                    <h3>Danh mục</h3>
                    <img src="../../../icons/menu_on.png" class="icon-menu" alt="">
                </div>
                <div id="type-value" class="value-filter">
                    <label>
                        <input type="radio" name="type">Mắt kính
                    </label>
                    <label>
                        <input type="radio" name="type">Gọng kính
                    </label>
                    <label>
                        <input type="radio" name="type">Phụ kiện
                    </label>
                </div>
            </div>

            <div id="gender" class="option-filter">
                <div class="btn" onclick="toggleDropdown('gender-value',1)">
                    <h3>Giới tính</h3>
                    <img src="../../../icons/menu_on.png" class="icon-menu" alt="">
                </div>
                <div id="gender-value" class="value-filter">
                    <label>
                        <input type="radio" name="gender">Nam
                    </label>
                    <label>
                        <input type="radio" name="gender">Nữ
                    </label>
                </div>
            </div>

            <div id="price" class="option-filter">
                <div class="btn" onclick="toggleDropdown('price-value',2)">
                    <h3>Giá tiền</h3>
                    <img src="../../../icons/menu_on.png" class="icon-menu" alt="">
                </div>
                <div id="price-value" class="value-filter">
                    <input type="range" min="0" max="5000000" step="250000" value="0" id="myRange">
                    <h3 id="result">0</h3>
                </div>
            </div>

        </div>

        <?php
        require_once("../../../BE/BUS/productBUS.php");
        $productList = productBUS::getInstance()->getAllProduct()

        ?>
        <div id="products">
            <?php foreach ($productList as $product) : 
                if($product['gender'] == 2) {
                    $product['logo'] = 'cart.gif'; // add another logo for both gender(0,1)
                }else if($product['gender'] == 1) {
                    $product['logo'] = 'new.gif';
                }else {
                    $product['logo'] = 'star.gif';
                }
                
                ?>
                <iframe src="./product.php?data=<?php echo urlencode(json_encode($product)); ?>" frameborder="0"></iframe>
            <?php endforeach; ?>
        </div>
    </div>
    <iframe src="./productDetail.php" frameborder="0" id="product-detail"></iframe>
    
    <link rel="stylesheet" href="../../css/productStyle/productList.css">
    <link rel="stylesheet" href="../../css/productStyle/product.css">
</body>
<script src="../../controller/product/productList.js"></script>
<script src="../../controller/product/product.js"></script>

</html>
<script>
    
</script>