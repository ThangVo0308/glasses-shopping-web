<?php
session_start();
require_once("../../../BE/BUS/userBUS.php");
require_once("../../../model/users.php");

?>

<link rel="stylesheet" href="../../css/account.css">

<body>
    <div class="header">
        <div class="title">Hồ sơ của tôi</div>
        <div class="title-under">Quản lý thông tin hồ sơ để bảo mật tài khoản</div>
    </div>
    <div id="contact">
        <div id="information">
            <div class="section">
                <img src="../../../icons/location.png" alt="">
                <div>
                    <span>PREVISION SHOP</span>
                    <span>222 L.A</span>
                </div>
            </div>
            <div class="section">
                <img src="../../../icons/phone.png" alt="">
                <div>
                    <span>HOTLINE</span>
                    <span>00000000</span>
                </div>
            </div>
            <div class="section">
                <img src="../../../icons/clock.png" alt="">
                <div>
                    <span>THỜI GIAN</span>
                    <span>Hoạt động 24/7</span>
                </div>
            </div>
        </div>
        <div class="line-left"></div>
        <div class="form-account">
            <form action="">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" placeholder="Email" value="<?php echo userBUS::getInstance()->getUserById($_SESSION['currentUser']['id'])['email'] ?>">

                <label for="name">Họ tên:</label>
                <input type="text" id="name" name="name" placeholder="Họ tên" value="<?php echo userBUS::getInstance()->getUserById($_SESSION['currentUser']['id'])['name'] ?>">

                <label for="phone">Số điện thoại:</label>
                <input type="text" id="phone" name="phone" placeholder="Số điện thoại" value="<?php echo userBUS::getInstance()->getUserById($_SESSION['currentUser']['id'])['phone'] ?>">

                <div class="gender">
                    <label>Giới tính:</label>
                    <input type="radio" id="male" name="gender" value="male" <?php echo userBUS::getInstance()->getUserById($_SESSION['currentUser']['id'])['gender'] == 1 ? "checked" : "" ?>>
                    <label for="male">Nam</label>
                    <input type="radio" id="female" name="gender" value="female" <?php echo userBUS::getInstance()->getUserById($_SESSION['currentUser']['id'])['gender'] == 0 ? "checked" : "" ?>>
                    <label for="female">Nữ</label>
                </div>
                <label for="address">Địa chỉ:</label>
                <textarea id="address" name="address" placeholder="Địa chỉ"><?php echo userBUS::getInstance()->getUserById($_SESSION['currentUser']['id'])['address'] ?>
                </textarea>

                <button class="button" id="submitBtn" type="submit">Lưu thông tin</button>
            </form>
        </div>
        <div class="line-right"></div>
        <div class="image">
            <label for="image">Ảnh:</label>
            <div class="header-image">
                <div class="url-image" style="background-image: url('<?php echo userBUS::getInstance()->getUserById($_SESSION['currentUser']['id'])['image']?>')"></div>
            </div>
            <input type="file" id="image-input" name="image" accept=".jpg,.jpeg,.png">
            <button class="button" type="button" onclick="openFileExplorer()">Chọn ảnh</button>
            <div class="title-credits">Chỉ được chọn file có đuôi .jpg, .jpeg, .png</div>
        </div>

</body>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script>
    var submitBtn = document.getElementById('submitBtn');

    function openFileExplorer() {
        document.getElementById("image-input").click();
    }

    
    var currentImage;
    document.getElementById("image-input").addEventListener("change", function() {
        var selectedFile = this.files[0];
        // console.log("Selected file:", selectedFile);

        var reader = new FileReader();
        reader.onload = function(e) {
            currentImage = e.target.result;
            var image = document.querySelector('.url-image');
            image.style.backgroundImage = "url(" + e.target.result + ")";
        };
        reader.readAsDataURL(selectedFile);
    });

    submitBtn.addEventListener('click', (e) => {
        e.preventDefault();

        var nameValue = document.getElementById('name').value;
        var phoneValue = document.getElementById('phone').value;
        var emailValue = document.getElementById('email').value;
        var genderValue = document.querySelector('input[name="gender"]:checked').value == 'male' ? 1 : 0;

        var addressValue = document.getElementById('address').value;
        var imageValue;
        if(document.getElementById('image-input').files.length > 0) {
            imageValue = document.getElementById('image-input').files[0].name;
        }else {
            imageValue = undefined;
        }

        console.log(currentImage);
        var data = {
            id: <?php echo $_SESSION['currentUser']['id'] ?>,
            email: emailValue,
            name: nameValue,
            phone: phoneValue,
            gender: genderValue,
            address: addressValue,
            // image:imageValue ===undefined ? '<?php echo userBUS::getInstance()->getUserById($_SESSION['currentUser']['id'])['image']?>' :imageValue
            image:currentImage
        }

        $.ajax({
            type: "POST",
            url: "../../../main/handler/updateAccount.php",
            data: data,
            dataType: 'json',
            success: function(res) {
                if (res.emailResponse == false) {
                    alert("Email đã tồn tại, hãy dùng email khác");
                } else if (res.nameResponse == false) {
                    alert("Tên đã được sử dụng, hãy dùng tên khác");
                } else if (res.phoneResponse == false) {
                    alert("Số điện thoại đã được sử dụng, vui lòng đổi số điện thoại khác");
                } else if (res.phoneValidate == false) {
                    alert("Số điện thoại không hợp lệ");
                } else if (res.emailValidate == false) {
                    alert("Email không hợp lệ");
                }

                if (res.success == true) {
                    alert("Sửa thành công");
                    parent.window.location.reload();
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(jqXHR.responseText);
                console.error("AJAX request failed:", textStatus, errorThrown);
            }
        })

    })
</script>