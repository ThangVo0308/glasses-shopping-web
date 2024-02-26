<div id="header">
    <div class="logo">
        <img src="../../images/logo.png" alt="" style="width:100px; height:100px">
        <h2>PreVision</h2>
    </div>
    <div class="navigation">
        <a href="#" onclick=changIframeHomeScreen()>Trang Chủ</a>
        <a href="#" onclick=changIframeProducts()>Sản Phẩm</a>
        <a href="">Về Chúng Tôi</a>
        <a href="">Liên Hệ</a>
    </div>
    <div class="navigation">
        <input type="text" class="searchvalue">
        <img src="../../icons/search.png" onclick="changeInput()" alt="">
        <img src="../../icons/user.png" alt="" id="Userlogin" onclick="parent.openLoginForm()">
        <img src="../../icons/cart.png" onclick="changIframeCart()" alt="">
    </div>
</div>

<link rel="stylesheet" href="../css/header.css">
<script src="../controller/login.js"></script>
<script src="../controller/homeScreen.js"></script>
<script src="../controller/navigation.js"></script>