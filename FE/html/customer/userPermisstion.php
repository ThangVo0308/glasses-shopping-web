<div id="userOptions">
    <div class="ic"></div>
    <span onclick="changeIframeAccount()">Tài khoản của tao</span>
    <span>Đơn hàng</span>
    <span onclick="changeIframeHistoryCart()">Lịch sử đơn hàng</span>
    <span onclick="logout()">Đăng xuất</span>
</div>
<link rel="stylesheet" href="../../css/userPermisstion.css">
<script src="../../controller/navigation.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

<script>
    function logout() {
        $.ajax({
            type: "POST",
            url: "../../../main/handler/logoutHandle.php",
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    parent.document.location.reload()
                } else {
                    console.log("Đã có lỗi khi đăng xuất");
                }
            },
            error: function() {
                console.log("Có lỗi khi gửi yêu cầu đến máy chủ");
            }
        });
    }
</script>