<?php
require_once('../../BE/BUS/productBUS.php');
require_once('../../BE/BUS/orderItemBUS.php');

$productListDatabase = productBUS::getInstance()->getAllProduct();
$listNewestProduct = productBUS::getInstance()->getNewestProducts();
$listSoldOutProduct = orderItemBUS::getInstance()->getSoldOutProducts();
$listAdviceProduct = productBUS::getInstance()->getAdviceProducts();

$NewlistNewestProduct = [];
foreach ($productListDatabase as $product) {
    foreach ($listNewestProduct as $value) {
        if ($product['id'] == $value) {
            $NewlistNewestProduct[] = $product;
        }
    }
}
$NewListSoldOutProduct = [];
foreach ($productListDatabase as $product) {
    foreach ($listSoldOutProduct as $value) {
        if ($product['id'] == $value) {
            $NewListSoldOutProduct[] = $product;
        }
    }
}
$NewListAdviceProduct = [];
foreach ($productListDatabase as $product) {
    foreach ($listAdviceProduct as $value) {
        if ($product['id'] == $value) {
            $NewListAdviceProduct[] = $product;
        }
    }
}
?>

<div id="main">
    <div id="poster">
        <div id="image-slider">
            <img src="../../images/poster1.png" alt="" id="image-select">
            <div class="poster-main">
                <img src="../../images/poster1.png" alt="" class="image-main">
            </div>
            <div class="poster-next">
                <img src="../../images/poster2.png" alt="" class="image-next">
            </div>
        </div>
        <div class="images">
            <img src="../../images/poster1.png" alt="" onclick="changeImage(this)">
            <img src="../../images/poster2.png" alt="" onclick="changeImage(this)">
            <img src="../../images/poster3.png" alt="" onclick="changeImage(this)">
        </div>
    </div>

    <div id="topic">
        <div id="slider-container">
            <div class="selected slider-item">
                <div onclick="selectSlider1()">Sản phẩm mới nhất</div>
            </div>
            <div class="slider-item">
                <div onclick="selectSlider2()">Sản phẩm bán chạy</div>
            </div>
            <div class="slider-item">
                <div onclick="selectSlider3()">Sản phẩm cửa hàng khuyên dùng</div>
            </div>
        </div>

        <div id="products">
            <?php foreach ($NewlistNewestProduct as $product) : ?>
                <iframe src="./product/product.php?data=<?php echo urlencode(json_encode($product)); ?>" frameborder="0"></iframe>
            <?php endforeach; ?>
        </div>
    </div>
</div>
</div>


<div id="signature">
    <h2>Hãy đến với chúng tôi</h2>
    <div>
        <div class="item">
            <img src="../../icons/premium.gif" alt="">
            <div>Hàng chính hãng, chất lượng cao</div>
        </div>
        <div class="item">
            <img src="../../icons/cart.gif" alt="">
            <div>Miễn phí giao hàng với đơn 200k</div>
        </div>
        <div class="item">
            <img src="../../icons/change.gif" alt="">
            <div>Đổi hàng 7 ngày, thủ tục đơn giản</div>
        </div>
    </div>
</div>

<div id="service-intro">
    <div>
        <h2>Dịch vụ của PreVision</h2>
        <div>
            Tròng kính phi cầu dạng mỏng Phụ phí 0đ <br>
            Hoàn thành và giao kính tận tay quý khách trong vòng 20 phút <br>
            Giá thay tròng kính siêu ưu đãi, dù là gọng kính của PreVision hay của công ty khác <br>
        </div>
    </div>
    <img src="../../images/glassIntro.png" alt="">
</div>

<div id="contact">
    <h2>Liên hệ</h2>
    <div>
        Hãy cho chúng tôi thông tin của bạn <br>
        Để nhận được tư vấn và ưu đãi của chúng tôi
    </div>
    <div>
        <input type="email" id="emailValue">
        <input type="submit" name="" value="Gửi" id="emailBtn">
    </div>
</div>
</div>

<link rel="stylesheet" href="../css/login/login.css">

<link rel="stylesheet" href="../css/homeScreen.css">
<link rel="stylesheet" href="../css/productStyle/product.css">
<script src="../controller/homeScreen.js"></script>\
<script src="../controller/product/product.js"></script>
</body>
<script>
    function changeSlider(number) {
        var items = document.querySelectorAll('.slider-item');
        items.forEach(function(item) {
            item.classList.remove('selected');
        });

        var selectedSlider = document.querySelector('.slider-item:nth-child(' + number + ')');
        selectedSlider.classList.add('selected');

        var container = document.getElementById('slider-container');
        container.scrollLeft = selectedSlider.offsetLeft - (container.offsetWidth - selectedSlider.offsetWidth) / 2;
    }

    function selectSlider1() {
        var productList = document.getElementById('products');
        productList.innerHTML = '';

        <?php foreach ($NewlistNewestProduct as $product) : ?>
            var iframe = document.createElement('iframe');
            iframe.src = "./product/product.php?data=<?php echo urlencode(json_encode($product)); ?>";
            iframe.frameBorder = "0";
            productList.appendChild(iframe);
        <?php endforeach; ?>
        changeSlider(1);
    }

    function selectSlider2() {
        var productList = document.getElementById('products');
        productList.innerHTML = '';

        <?php foreach ($NewListSoldOutProduct as $product) : ?>
            var iframe = document.createElement('iframe');
            iframe.src = "./product/product.php?data=<?php echo urlencode(json_encode($product)); ?>";
            iframe.frameBorder = "0";
            productList.appendChild(iframe);
        <?php endforeach; ?>
        changeSlider(2)
    }

    function selectSlider3() {
        var productList = document.getElementById('products');
        productList.innerHTML = '';

        <?php foreach ($NewListAdviceProduct as $product) : ?>
            var iframe = document.createElement('iframe');
            iframe.src = "./product/product.php?data=<?php echo urlencode(json_encode($product)); ?>";
            iframe.frameBorder = "0";
            productList.appendChild(iframe);
        <?php endforeach; ?>
        changeSlider(3);
    }
</script>