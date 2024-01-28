<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/homeScreen.css">
    <script src="../controller/homeScreen.js"></script>
</head>

<body>
    <div id="homeScreen">
        <div id="header">
            <div class="logo">
                <img src="../../images/logo.png" alt="" style="width:100px; height:100px">
                <h2>PreVision</h2>
            </div>
            <div class="navigation">
                <a class="hover" href="">Trang Chủ</a>
                <a class="hover" href="">Sản Phẩm</a>
                <a class="hover" href="">Về Chúng Tôi</a>
                <a class="hover" href="">Liên Hệ</a>
            </div>
            <div class="navigation">
                <div class="searchInput">
                    <img src="../../icons/setting.png" alt="">
                    <input type="text">
                </div>
                <img src="../../icons/search.png" onclick="changeInput()" alt="">
                <img src="../../icons/user.png" alt="">
                <img src="../../icons/cart.png" alt="">
            </div>
        </div>

        <div id="poster">
            <img src="../../images/poster1.png" alt="" class="image-main">
            <div class="images">
                <img src="../../images/logo.png" alt="" onclick="changeImage(this)">
                <img src="../../images/poster1.png" alt="" onclick="changeImage(this)">
                <img src="../../images/poster1.png" alt="" onclick="changeImage(this)">
            </div>
        </div>

        <div id="slider-container">
            <div class="selected slider-item">
                <div onclick="selectSlider(1)">Sản phẩm mới nhất</div>
            </div>
            <div class="slider-item">
                <div onclick="selectSlider(2)">Sản phẩm bán chạy</div>
            </div>
            <div class="slider-item">
                <div onclick="selectSlider(3)">Sản phẩm cửa hàng khuyên dùng</div>
            </div>
        </div>
        <div id="product"></div>

        <div id="signature" >
            <div class="item" >
                <img src="../../icons/premium.gif" alt="">
                <div>Hàng chính hãng, chất lượng cao</div>
            </div>
            <div class="item" >
                <img src="../../icons/cart.gif" alt="">
                <div>Miễn phí giao hàng với đơn 200k</div>
            </div>
            <div class="item" >
                <img src="../../icons/change.gif" alt="">
                <div>Đổi hàng 7 ngày, thủ tục đơn giản</div>
            </div>
        </div>
    </div>
</body>

</html>
