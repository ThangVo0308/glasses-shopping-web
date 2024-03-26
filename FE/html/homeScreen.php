<?php
session_start();
?>
<body>
    <iframe src="./customer/header.php" frameborder="0" id="header"></iframe>
    <iframe src="./customer/home.php" frameborder="0" id="homeScreen" name="homeScreen"></iframe>
    <iframe src="./customer/login.php" frameborder="0" id="login" name="login"></iframe>
    <iframe src="./customer/userPermisstion.php" frameborder="0" id="userPermisstion" ></iframe>
    <iframe src="./customer/alert.php" frameborder="0" id="alert" ></iframe>
</body>
<link rel="stylesheet" href="../css/homeScreen.css">
<script src="../controller/navigation.js"></script>
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

<script src="../controller/navigation.js"></script>
<script src="../controller/userPermisstion.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>