<body>
    <iframe src="./path.php" frameborder="0" id="pathContact"></iframe>
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
        <div id="emailContact">
            <span>Mọi vấn đề về cửa hàng được giải quyết tại đây</span>
            <input type="text" name="" id="nameUser" placeholder="Họ và tên">
            <input type="email" name="" id="emailUser" placeholder="Email">
            <textarea name="note" id="noteValue" placeholder="Ghi chú" rows="4"></textarea>
            <button onclick="sendEmail()">Xác Nhận</button>
        </div>
    </div>
</body>
<link rel="stylesheet" href="../css/contact.css">
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script>
    function sendEmail() {
        var nameUser = document.getElementById('nameUser').value;
        var emailUser = document.getElementById('emailUser').value;
        var noteValue = document.getElementById('noteValue').value;
        if (nameUser.trim() === "" || emailUser.trim() === "" || noteValue.trim() === "") {
            alert('Vui lòng điền đầy đủ thông tin')
        } else {
            $.ajax({
                type: "POST",
                url: "../../main/handler/sendEmail.php",
                dataType: 'json',
                data: {
                    nameUser: nameUser,
                    emailUser: emailUser,
                    noteValue: noteValue,
                },
                beforeSend: function() {
                    alert("Vui lòng chờ...");
                },
                success: function(response) {
                    if (response.success) {
                        alert('Phản hòi thành công')
                    } else {
                        console.log("Đã có lỗi");
                    }
                },
                error: function() {
                    console.log("Có lỗi khi gửi yêu cầu đến máy chủ");
                }
            });
        }
    }
</script>