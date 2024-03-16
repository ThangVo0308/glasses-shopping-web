<?php
session_start();
if (!isset($_SESSION['currentUser'])) {
    $_SESSION['currentUser'] = array();
}
?>
<div id="header">
    <div class="logo">
        <img src="../../images/logo.png" alt="" style="width:100px; height:100px">
        <h2>PreVision</h2>
    </div>
    <div class="navigation">
        <a href="#" onclick=changeIframeHomeScreen()>Trang Chủ</a>
        <a href="#" onclick=changeIframeProducts()>Sản Phẩm</a>
        <a href="">Về Chúng Tôi</a>
        <a href="" onclick=changeIframeContact()>Liên Hệ</a>
    </div>
    <div class="navigation">
        <div>
            <input type="text" class="searchvalue" id="searchValue">
            <button id="btnSearch"><img src="../../icons/search.png" id="imgSearch" alt=""></button>
        </div>
        <img src="../../icons/user.png" alt="" id="btnLogin">
        <img src="../../icons/cart.png" id="btnCart" alt="">
    </div>
</div>

<link rel="stylesheet" href="../css/header.css">
<script src="../controller/navigation.js"></script>
<script src="../controller/header.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

<script>
    const loginForm = parent.document.getElementById('login');
    var userOptions = parent.document.getElementById('userOptions');

    var currentUser = <?php echo json_encode($_SESSION['currentUser']); ?>;

    if (!Array.isArray(currentUser) && currentUser.length !== 0) { //kiểm tra đã đăng nhập
        $(document).ready(function() {
            $('#btnLogin').mouseenter(function() {
                userOptions.style.display = "block";
            });
            $('#btnLogin').mouseleave(function() {
                var flag = true;
                userOptions.onmouseenter = function() {
                    flag = false;
                }
                setTimeout(() => {
                    if (flag == true) {
                        userOptions.style.display = "none";
                    }
                }, 300);
            });
            userOptions.onmouseleave = function() {
                userOptions.style.display = "none";
            };

            $('#btnCart').click(function() {
                changeIframeCart();
            })
        });
    } else {
        $('#btnLogin').click(function() {
            loginForm.style.display = "block";
        })

        $('#btnCart').click(function() {
            var alert = parent.document.getElementById('alert');
            <?php
            $data = [
                'value'=>'Vui lòng đăng nhập',
                'status' => 'error',
                'reload' => 0,
            ];
            ?>
            alert.src ='../FE/html/alert.php?data=<?php echo json_encode($data) ?>';
            alert.style.display = 'flex';
        })
    }

    $('#searchValue').on('keydown', function(event) {
        if (event.key === "Enter") {
            var searchValue = $('#searchValue').val();
            var homeScreen = parent.document.getElementById('homeScreen');
            homeScreen.src = "../FE/html/products.php?searchValue=" + encodeURIComponent(searchValue);
        }
    });
</script>