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
        <div class="form-account">
            <form action="">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" placeholder="Username">

                <label for="password">Password:</label>
                <input type="password" id="password" name="password" placeholder="Password">

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" placeholder="Email">

                <label for="name">Name:</label>
                <input type="text" id="name" name="name" placeholder="Name">

                <label for="phone">Phone:</label>
                <input type="text" id="phone" name="phone" placeholder="Phone">

                <div class="gender">
                    <label>Gender:</label>
                    <input type="radio" id="male" name="gender" value="male">
                    <label for="male">Nam</label>

                    <input type="radio" id="female" name="gender" value="female">
                    <label for="female">Nữ</label>
                </div>

                <label for="image">Image:</label>
                <input type="file" id="image" name="image" accept="image/*">

                <label for="address">Address:</label>
                <textarea id="address" name="address" placeholder="Address"></textarea>

                <button type="submit">Submit</button>
            </form>

        </div>

</body>
<link rel="stylesheet" href="../css/account.css">