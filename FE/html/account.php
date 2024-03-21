<body>
    <div class="header">
        <div class="title">Hồ sơ của tôi</div>
        <div class="title-under">Quản lý thông tin hồ sơ để bảo mật tài khoản</div>
    </div>
    <div id="contact">
        <div id="information">
            <div class="section">
                <img src="../../icons/location.png" alt="">
                <div>
                    <span>PREVISION SHOP</span>
                    <span>222 L.A</span>
                </div>
            </div>
            <div class="section">
                <img src="../../icons/phone.png" alt="">
                <div>
                    <span>HOTLINE</span>
                    <span>00000000</span>
                </div>
            </div>
            <div class="section">
                <img src="../../icons/clock.png" alt="">
                <div>
                    <span>THỜI GIAN</span>
                    <span>Hoạt động 24/7</span>
                </div>
            </div>
        </div>
        <div class="line-left"></div>
        <div class="form-account">
            <form action="">
                <label for="username">Tên đăng nhập:</label>
                <input type="text" id="username" name="username" placeholder="Tên đăng nhập">

                <label for="password">Mật khẩu:</label>
                <input type="password" id="password" name="password" placeholder="Mật khẩu">

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" placeholder="Email">

                <label for="name">Họ tên:</label>
                <input type="text" id="name" name="name" placeholder="Họ tên">

                <label for="phone">Số điện thoại:</label>
                <input type="text" id="phone" name="phone" placeholder="Số điện thoại">

                <div class="gender">
                    <label>Giới tính:</label>
                    <input type="radio" id="male" name="gender" value="male">
                    <label for="male">Nam</label>
                    <input type="radio" id="female" name="gender" value="female">
                    <label for="female">Nữ</label>
                </div>
                <label for="address">Địa chỉ:</label>
                <textarea id="address" name="address" placeholder="Địa chỉ"></textarea>

                <button class="button" type="submit">Lưu thông tin</button>
            </form>
        </div>
        <div class="line-right"></div>
        <div class="image">
            <label for="image">Ảnh:</label>
            <div class="header-image">
                <div class="url-image"></div>
            </div>
            <input type="file" id="image-input" name="image" accept=".jpg,.jpeg,.png">
            <button class="button" type="button" onclick="openFileExplorer()">Chọn ảnh</button>
            <div class="title-credits">Chỉ được chọn file có đuôi .jpg, .jpeg, .png</div>
        </div>

</body>
<link rel="stylesheet" href="../css/account.css">
<script>
    function openFileExplorer() {
        document.getElementById("image-input").click();
    }

    document.getElementById("image-input").addEventListener("change", function() {
        var selectedFile = this.files[0];
        console.log("Selected file:", selectedFile);

        var reader = new FileReader();
        reader.onload = function(e) {
            var image = document.querySelector('.url-image');
            image.style.backgroundImage = "url(" + e.target.result + ")";
        };
        reader.readAsDataURL(selectedFile);
    });
</script>