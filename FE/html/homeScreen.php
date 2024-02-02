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
        <div id="poster">
            <img src="../../images/poster1.png" alt="" class="image-main">
            <div class="images">
                <img src="../../images/poster2.png" alt="" onclick="changeImage(this)">
                <img src="../../images/poster1.png" alt="" onclick="changeImage(this)">
                <img src="../../images/poster3.png" alt="" onclick="changeImage(this)">
            </div>
        </div>

        <div id="topic" >
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
        </div>

        
        <div id="signature" >
            <h2>Hãy đến với chúng tôi</h2>
            <div>
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

        <div id="service-intro" >
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

        <div id="contact" >
            <h2>Liên hệ</h2>
            <div>
                Hãy cho chúng tôi thông tin của bạn <br>
                Để nhận được tư vấn và ưu đãi của chúng tôi
            </div>
            <div>
                <input type="email" id="emailValue" >
                <input type="submit" name="" value="Gửi" id="emailBtn">
            </div>
        </div>
    </div>
</body>

</html>
