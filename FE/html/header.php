<div id="header">
    <div class="logo">
        <img src="../../images/logo.png" alt="" style="width:100px; height:100px">
        <h2>PreVision</h2>
    </div>
    <div class="navigation">
        <a href="#" onclick=changIframeHomeScreen()>Trang Chủ</a>
        <a href="#" onclick=changIframeProducts()>Sản Phẩm</a>
        <a href="">Về Chúng Tôi</a>
        <a href="" onclick=changIframeContact()>Liên Hệ</a>
    </div>
    <div class="navigation">
        <div>
            <input type="text" class="searchvalue" id="searchValue">
            <button id="btnSearch"><img src="../../icons/search.png" id="imgSearch" alt=""></button>
        </div>
        <img src="../../icons/user.png" alt="" id="userLogin" onclick="openLoginForm()">
        <img src="../../icons/cart.png" onclick="changIframeCart()" alt="">
    </div>
</div>

<link rel="stylesheet" href="../css/header.css">
<script src="../controller/navigation.js"></script>
<script src="../controller/header.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

<script>
    const loginForm = parent.document.getElementById('login');
    var userOptions = parent.document.getElementById('userOptions');

    $('#searchValue').on('keydown', function(event) {
        if (event.key === "Enter") {
            var searchValue = $('#searchValue').val();
            var homeScreen = parent.document.getElementById('homeScreen');
            homeScreen.src = "../FE/html/product/productList.php?searchValue=" + encodeURIComponent(searchValue);
        }
    });

    $(document).ready(function() {
        $('#userLogin').mouseenter(function() {
            userOptions.style.display = "block";
        });
        $('#userLogin').mouseleave(function() {
            var flag = true;
            userOptions.onmouseenter = function() {
                flag = false;
            }
            setTimeout(() => {
                if (flag==true) {
                    userOptions.style.display = "none";
                }
            }, 300);
        });
        userOptions.onmouseleave = function() {
            userOptions.style.display = "none";
        };

    });
</script>