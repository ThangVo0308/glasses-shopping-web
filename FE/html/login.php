<div id="myModal" class="login-modal">
    <div class="container" id="container">
        <div class="container-move">
            <div class="form-container sign-up">
                <form id="form-signUp" name="signup">
                    <h1>Đăng ký</h1>
                    <div class="wc-box">
                        <div class="close" id="closeButton"></div>
                    </div>
                    <div class="input-control">
                        <input type="text" placeholder="Tên đăng nhập" class="txtUsernameSignUp" id="usernameSignUp" name="username">
                        <div class="error" id="error"></div>
                    </div>
                    <div class="input-control">
                        <input type="password" placeholder="Mật khẩu" class="txtPasswordSignUp" id="passwordSignUp" name="password">
                        <div class="error" id="error"></div>
                    </div>
                    <div class="input-control">
                        <input type="text" placeholder="Họ Tên" class="txtName" id="name" name="name">
                        <div class="error" id="error"></div>
                    </div>
                    <div class="input-control">
                        <input type="text" placeholder="Email" class="txtEmail" id="email" name="email">
                        <div class="error" id="error"></div>
                    </div>
                    <div class="input-control">
                        <input type="text" placeholder="Số điện thoại" class="txtPhone" id="phone" name="phone">
                        <div class="error" id="error"></div>
                    </div>
                    <div class="input-control">
                        <input type="text" placeholder="Địa chỉ" class="txtAddress" id="address" name="address">
                        <div class="error" id="error"></div>
                    </div>
                    <!-- <button class="button" name="submit" type="button" id="btnRegister" onclick="validateInputSignUp()">Đăng ký</button> -->
                    <button class="button" onclick="validateInputSignUp()">Đăng ký</button>
                </form>
            </div>
            <div class="form-container sign-in">
                <form id="form-login" name="signin">
                    <h1>Đăng nhập</h1>
                    <div class="input-control">
                        <input type="text" placeholder="Tên đăng nhập" id="username" class="txtUsernameLogin" name="username">
                        <div class="error" id="error"></div>
                    </div>
                    <div class="input-control">
                        <input type="password" placeholder="Mật khẩu" id="password" class="txtPasswordLogin" name="password">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="eye eye-close">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88" />
                        </svg>

                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="eye eye-open hide">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        </svg>
                        <div class="error" id="error"></div>
                    </div>
                    <!-- <button class="button" type="button" id="btnLogin" onclick="validateInputLogin()">Đăng nhập</button> -->
                    <button class="button" onclick="validateInputLogin()">Đăng nhập</button>
                </form>
            </div>
            <div class="toggle-container">
                <div class="toggle">
                    <div class="toggle-panel toggle-left">
                        <h1>Chào mừng đến với PreVision</h1>
                        <img src="../../images/logo.png" alt="" class="imgLogo">
                        <p>Nhập thông tin cá nhân của bạn để sử dụng tất cả các tính năng của trang web</p>
                        <button class="hidden" id="login">Đăng nhập</button>
                    </div>
                    <div class="toggle-panel toggle-right">
                        <h1>Chào mừng đến với PreVision</h1>
                        <div class="wc-box">
                            <div class="close" id="closeButton-1"></div>
                        </div>
                        <img src="../../images/logo.png" alt="" class="imgLogo">
                        <p>Bạn chưa có tài khoản hãy đăng ký ngay</p>
                        <button class="hidden" id="register">Đăng ký</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
<link rel="stylesheet" href="../css/login/login.css">
<script src="../controller/login.js"></script>
<script>
    $(document).ready(function() {
        function signupHandle(url, method, data1) {
            console.log(url);
            $.ajax({
                type: method,
                url: url,
                data: data1,
                dataType: "json",
                success: function(res) {
                    if (res.response.check == true) {
                        alert("Xin chào: " + res.response.username);
                    } else if (res.response.check == false) {
                        alert("Sai tài khoản hoặc mật khẩu");
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log("lalalala: " + jqXHR.responseText);
                    console.error("AJAX request failed:", textStatus, errorThrown);
                }
            });
        }

        function signinHandle(url, method, data1) {
            $.ajax({
                type: method,
                url: url,
                data: data1,
                dataType: "json",
                success: function(res) {
                    if (res.response.check == true) {
                        alert("Xin chào: " + res.response.username);
                        parent.window.location.reload();

                    } else if (res.response.check == false) {
                        alert("Sai tài khoản hoặc mật khẩu");
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.error("AJAX request failed o form Signin:", textStatus, errorThrown);
                }
            })
        }
        $('form[name="signup"]').submit(function(e) {
            e.preventDefault();

            var formData = $(this).serialize();

            signupHandle('../../main/handler/signupHandle.php', 'POST', formData);
        });

        $('form[name="signin"]').submit(function(e) {
            e.preventDefault();

            var formData = $(this).serialize();

            signinHandle('../../main/handler/signinHandle.php', 'POST', formData);
        });
    });

    var loginIframe = parent.document.getElementById('login');
    var loginForm = document.getElementById('myModal');
    var closeButton = document.getElementById('closeButton');
    var closeButton1 = document.getElementById('closeButton-1');
    window.onclick = function(e) {
        if (e.target == loginForm) {
            loginIframe.style.display = 'none';
        }
    }

    closeButton.onclick = function(e) {
        if (e.target == closeButton) {
            loginIframe.style.display = 'none';
        }
    }

    closeButton1.onclick = function(e) {
        if (e.target == closeButton1) {
            loginIframe.style.display = 'none';
        }
    }
</script>