<?php
$productList = [
    ['id' => '01', 'name' => 'Sản phẩm 12', 'price' => '100000', 'image' => 'logo.png', 'logo' => 'new.gif'],
    ['id' => '02', 'name' => 'Sản phẩm 2', 'price' => '150000', 'image' => 'logo.png', 'logo' => 'new.gif'],
    ['id' => '03', 'name' => 'Sản phẩm 3', 'price' => '120000', 'image' => 'logo.png', 'logo' => 'star.gif']
];
?>

<body>
    <div id="main">
        <div id="poster">
            <div id="image-slider" >
                <div class="poster-main" >
                    <img src="../../images/poster1.png" alt="" class="image-main">
                </div>
                <div class="poster-next" >
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
                    <div onclick="selectSlider(1)">Sản phẩm mới nhất</div>
                </div>
                <div class="slider-item">
                    <div onclick="selectSlider(2)">Sản phẩm bán chạy</div>
                </div>
                <div class="slider-item">
                    <div onclick="selectSlider(3)">Sản phẩm cửa hàng khuyên dùng</div>
                </div>
            </div>

            <div id="products">
                <?php foreach ($productList as $product) : ?>
                    <iframe src="./product/product.php?data=<?php echo urlencode(json_encode($product)); ?>" frameborder="0"></iframe>
                <?php endforeach; ?>
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

    <!-- <div class="modalPlus" id="modalLogin">
        <div class="modalContainer">

            <div class="modal_close">
                <i class='fa fa-close'></i>
            </div>
    
            <header class="modal-header">
                <div class="modal-param">
                    Đăng nhập
                </div>
            </header>

            <div class="modal-body">
                <label for="add" class="modal-label">
                    <div><img src="../../icons/user.png" alt=""></div>
                    <p class="title">Tên đăng nhập</p>
                    <input id="add" type="text" class="modal-add" name="txtUsername">
                </label>
           
                <label for="name" class="modal-label">
                <div><img src="../../icons/password.png" alt=""></div>
                    <p class="title">Mật khẩu</p>
                    <input id="name" type="text" class="modal-add" name="txtPassword">
                </label>

                <a href="signup.php" class="signUp" name="signUp">Chưa có tài khoản? Hãy đăng ký</a>
                <button class="modal-submit" onclick="themsp()" name="loginBtn">
                    Đăng nhập
                    <i class='fa fa-check'></i>
                </button>
                
            </div>

            
        </div>

    </div> -->

    <link rel="stylesheet" href="../css/login/login.css">

    <link rel="stylesheet" href="../css/homeScreen.css">
    <link rel="stylesheet" href="../css/productStyle/product.css">
    <script src="../controller/homeScreen.js"></script>\
    <script src="../controller/product/product.js"></script>
</body>