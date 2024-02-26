<?php
    $username = '';
    $username_error = '';

    $password = '';
    $password_error = '';

    if(isset($_POST['login'])) {
        if(empty($_POST['username']) || trim($_POST['username'])) {
            $username_error = 'Username is required';
        }else {
            $username = $_POST['username'];
        }

        if(empty($_POST['password']) || trim($_POST['password'])) {
            $username_error = 'Password is required';
        }else {
            $username = $_POST['password'];
        }
    }

    session_start();

    $result = empty($username_error) && empty($password_error);
    if($result) {
        foreach (userBUS::getInstance()->getAlluser() as $user) {
            if(strcmp($username,$user->getUsername()) == 0 && strcmp($password,$user->getPassword()) == 0) {
                echo "<script>alert(Welcome '".$username."'</script>"; // can replace with login successfully notifications(html,css,js)
                $_SESSION['username'] = $username;
                header('Location: ./main/index.php?username='.$username);
                exit();
            }else {
                echo "<script>alert(Incorrect username or password)</script>";
            }
        }
    }

?>