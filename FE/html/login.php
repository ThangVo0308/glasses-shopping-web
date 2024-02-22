 <div class="container" id="container">
    <div class="container-move">
        <div class="form-container sign-up">
            <form>
                <h1>Sign Up</h1>
                <input type="text" placeholder="Username" class="txtUsernameSignUp" id="input-box">                        
                <input type="password" placeholder="Password" class="txtPasswordSignUp" id="input-box">
                <input type="text" placeholder="Name" class="txtName" id="input-box">
                <input type="email" placeholder="Email" id="txtEmail" id="input-box">
                <input type="text" placeholder="Phone" class="txtPhone" id="input-box">
                <input type="text" placeholder="Address" class="txtAddress" id="input-box">
                <button class="button">Sign Up</button>
            </form>
        </div>
        <div class="form-container sign-in">
            <form>
                <h1>Login</h1>                
                <input type="text" placeholder="Username" id="input-box" class="txtUsernameLogin">
                <input type="password" placeholder="Password" id="input-box" class="txtPasswordLogin">

                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="eye eye-close">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88" />
                </svg>

                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="eye eye-open hide">
                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                </svg>

                <button class="button">Login</button>
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