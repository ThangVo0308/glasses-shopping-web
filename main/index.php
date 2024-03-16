<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='shortcut icon' href='../images/logo_web.ico' />
    <title>PreVision Shop</title>
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="../FE/css/login/login.css">
    <link rel="stylesheet" href="../FE/css/userOptions.css">
</head>

<body>
    <iframe src="../FE/html/header.php" frameborder="0" id="header"></iframe>
    <iframe src="../FE/html/homeScreen.php" frameborder="0" id="homeScreen" name="homeScreen"></iframe>
    <iframe src="../FE/html/login.php" frameborder="0" id="login" name="login"></iframe>
    <div id="userOptions">
        <div class="ic"></div>
        <span>Tài khoản của tao</span>
        <span>Đơn hàng</span>
        <span onclick="changeIframeHistoryCart()">Lịch sử đơn hàng</span>
        <span onclick="logout()">Đăng xuất</span>
    </div>
    <iframe src="../FE/html/alert.php" frameborder="0" id="alert" ></iframe>
</body>

</html>
<script src="../FE/controller/navigation.js"></script>
<script>
    const loginForm = parent.document.getElementById('login');

    function openLoginForm() {
        if (loginForm) {
            loginForm.style.display = "block";
            const usernameLogin = document.getElementById('username');
            const passwordLogin = document.getElementById('password');
            const usernameSignUp = document.getElementById('usernameSignUp');
            const passwordSignUp = document.getElementById('passwordSignUp');
            const nameSignUp = document.getElementById('name');
            const emailSignUp = document.getElementById('email');
            const phoneSignUp = document.getElementById('phone');
            const addressSignUp = document.getElementById('address');
            usernameLogin.value = "";
            passwordLogin.value = "";
            usernameSignUp.value = "";
            passwordSignUp.value = "";
            nameSignUp.value = "";
            emailSignUp.value = "";
            phoneSignUp.value = "";
            addressSignUp.value = "";
        }
    }

    function logout() {
        $.ajax({
            type: "POST",
            url: "../main/handler/logoutHandle.php",
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    window.location.reload();
                } else {
                    console.log("Đã có lỗi khi đăng xuất");
                }
            },
            error: function() {
                console.log("Có lỗi khi gửi yêu cầu đến máy chủ");
            }
        });
    }
</script>

<script src="../FE/controller/navigation.js"></script>
<script src="../FE/controller/userOptions.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>