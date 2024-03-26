<?php
session_start();
if (!isset($_SESSION['currentUser'])) {
    $_SESSION['currentUser'] = array();
}

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
</head>

<body>
    <iframe src="../FE/html/homeScreen.php" frameborder="0" id="index"></iframe>
</body>

</html>
<script>
    var currentUser = <?php echo json_encode($_SESSION['currentUser']); ?>;
    var index = document.getElementById('index');
    switch (currentUser['role_id']) {
        case 1:
            index.src = '../FE/html/admin.php';
            break;
        case 2:
            index.src = '../FE/html/homeScreen.php';
            break;
        case 3:
            index.src = '../FE/html/homeScreen.php';
            break;
        case 4:

            break;
    }
</script>