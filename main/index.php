<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='shortcut icon' href='../images/logo_web.ico'/>
    <title>PreVision Shop</title>
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="../FE/css/login/login.css">
</head>
<body>
    <iframe src="../FE/html/header.php" frameborder="0" id="header" ></iframe>
    <iframe src="../FE/html/homeScreen.php" frameborder="0" id="homeScreen" name="homeScreen" ></iframe>
    
    <?php include "../FE/html/login.php" ?>
</body>
</html>

<script>
    const loginForm = document.querySelector(".login-modal");
    function openLoginForm() {
        if (loginForm) {
            loginForm.style.display = "block";
        }
    }

    window.onclick = function(event) {
        if (event.target == loginForm) {
            loginForm.style.display = "none";
        }
    }
</script>
<script src="../FE/controller/login.js"></script>
<script  src="../FE/controller/navigation.js"></script>
<script src="../FE/controller/path.js"></script>
<script
  src="https://code.jquery.com/jquery-3.7.1.js"
  integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
  crossorigin="anonymous"></script>
<script src="./main.js"></script>