

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/homeScreen.css">
</head>
<body>
        <div id="homeScreen">
            <div id="header">
                <div class="logo">
                    <img src="../../images/logo.png" alt="" style="width:100px; height:100px">
                    <h2>PreVision</h2>
                </div>
                <div class="navigation" >
                    <a class="hover" >Trang Chủ</a>
                    <a class="hover" >Sản Phẩm</a>
                    <a class="hover" >Về Chúng Tôi</a>
                    <a class="hover" >Liên Hệ</a>
                </div>
                <div class="navigation" >
                    <div class="searchInput" >
                        <img src="../../icons/setting.png" alt="">
                        <input type="text">
                    </div>
                    <img src="../../icons/search.png" onclick="changeInput()" alt="">
                    <img src="../../icons/user.png" alt="">
                    <img src="../../icons/cart.png" alt="">
                </div>
            </div>

            <div id="poster">
                <div>
                    <img src="../../images/poster1.png" alt="">
                </div>
                <div>
                    <img src="../../images/poster1.png" alt="">
                    <img src="../../images/poster1.png" alt="">
                </div>
            </div>
        </div>
</body>

<script>
    function changeInput() {
            var inputElement = document.querySelector('.searchInput');
            if (inputElement.style.visibility === "collapse" ) {
                inputElement.style.visibility = "visible";
            } else {
                inputElement.style.visibility = "collapse";
            }
        }
</script>
</html>
