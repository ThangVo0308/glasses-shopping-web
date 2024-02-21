 <div class="container" id="container">
    <div class="container-move">
        <div class="form-container sign-up">
            <form>
                <h1>Sign Up</h1>
                <input type="text" placeholder="Username" class="txtUsername" id="input-box">                        
                <input type="password" placeholder="Password" class="txtPassword" id="input-box">
                <input type="text" placeholder="Name" class="txtName" id="input-box">
                <input type="email" placeholder="Email" id="txtEmail" id="input-box">
                <input type="text" placeholder="Phone" class="txtPhone" id="input-box">
                <input type="text" placeholder="Address" class="txtAddress" id="input-box">
                <button>Sign Up</button>
            </form>
        </div>
        <div class="form-container sign-in">
            <form>
                <h1>Login</h1>                
                <input type="text" placeholder="Username">
                <input type="password" placeholder="Password">
                <button>LogIn</button>
            </form>
        </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>Welcome to PreVision</h1>
                    <img src="../../images/logo.png" alt="" class="imgLogo">
                    <p>Nhập thông tin cá nhân của bạn để sử dụng tất cả các tính năng của trang web</p>
                    <button class="hidden" id="login">Login</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <h1>Welcome to PreVision</h1>
                    <img src="../../images/logo.png" alt="" class="imgLogo">
                    <p>Bạn chưa có tài khoản hãy đăng ký ngay</p>
                    <button class="hidden" id="register">Sign Up</button>
                </div>
            </div>
        </div>
    </div>
</div>

    <script src="../controller/login.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
<link rel="stylesheet" href="../css/login/login.css">