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
        <img src="../../icons/user.png" alt="" id="Userlogin" onclick="openLoginForm()">
        <img src="../../icons/cart.png" onclick="changIframeCart()" alt="">
    </div>
</div>

<link rel="stylesheet" href="../css/header.css">
<script src="../controller/navigation.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

<script>
    const loginForm = parent.document.getElementById('login');

    function openLoginForm() {
        if (loginForm) {
            loginForm.style.display = "block";
        }
    }

    $('#searchValue').on('keydown', function(event) {
        if (event.key === "Enter") {
            var searchValue = $('#searchValue').val();
            var homeScreen = parent.document.getElementById('homeScreen');
            homeScreen.src = "../FE/html/product/productList.php?searchValue=" + encodeURIComponent(searchValue);
        }
    });

    var btnSearch = document.getElementById('btnSearch');
    var searchValue = document.getElementById('searchValue');
    var searchParent = searchValue.parentElement;

    btnSearch.onclick = function() {
        var computedStyle = window.getComputedStyle(searchValue);
        var searchDisplayStyle = computedStyle.getPropertyValue('display');

        if (searchDisplayStyle === 'none') {
            searchValue.style.display = 'block';
            setTimeout(function() {
                searchValue.style.width = '170px';
                searchValue.style.opacity = '1';
                searchValue.style.transition = 'all 0.5s ease';

                searchParent.style.width = '170px';
                searchParent.style.transition = 'all 0.5s ease';
            }, 100);
        } else {
            searchValue.style.width = '27px';
            searchValue.style.transition = 'all 0.5s ease';
            searchValue.style.opacity = '0';

            searchParent.style.width = '27px';
            searchParent.style.transition = 'all 0.5s ease';
            setTimeout(function() {
                searchValue.style.display = 'none';
            }, 500);
        }
    }
</script>