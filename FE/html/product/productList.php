<body>
    <iframe src="../path.php" frameborder="0" id="pathProducts"></iframe>

    <h3 id="title">Mắt kính chính hãng PreVision</h3>

    <div id="signature">
        <div>
            <div class="item">
                <img src="../../../icons/premium.gif" alt="">
                <div>Hàng chính hãng, chất lượng cao</div>
            </div>
            <div class="item">
                <img src="../../../icons/cart.gif" alt="">
                <div>Miễn phí giao hàng với đơn 200k</div>
            </div>
            <div class="item">
                <img src="../../../icons/change.gif" alt="">
                <div>Đổi hàng 7 ngày, thủ tục đơn giản</div>
            </div>
        </div>
    </div>

    <div id="main">
        <div id="filter">
            <div id="filter-header">
                <div>Tìm kiếm </div>
                <button id="delete-btn">Xóa</button>
            </div>
            <div id="type" class="option-filter">
                <div class="btn" onclick="toggleDropdown('type-value',0)">
                    <h3>Danh mục</h3>
                    <img src="../../../icons/menu_on.png" class="icon-menu" alt="">
                </div>
                <div id="type-value" class="value-filter">
                    <label>
                        <input type="radio" name="categoryId" value="1">Gọng kính
                    </label>
                    <label>
                        <input type="radio" name="categoryId" value="2">Tròng kính
                    </label>
                    <label>
                        <input type="radio" name="categoryId" value="3">Phụ kiện
                    </label>
                </div>
            </div>

            <div id="gender" class="option-filter">
                <div class="btn" onclick="toggleDropdown('gender-value',1)">
                    <h3>Giới tính</h3>
                    <img src="../../../icons/menu_on.png" class="icon-menu" alt="">
                </div>
                <div id="gender-value" class="value-filter">
                    <label>
                        <input type="radio" name="gender" value="0">Nữ
                    </label>
                    <label>
                        <input type="radio" name="gender" value="1">Nam
                    </label>
                </div>
            </div>

            <div id="price" class="option-filter">
                <div class="btn" onclick="toggleDropdown('price-value',2)">
                    <h3>Giá tiền</h3>
                    <img src="../../../icons/menu_on.png" class="icon-menu" alt="">
                </div>
                <div id="price-value" class="value-filter">
                    <input type="range" min="0" max="5000000" step="250000" value="0" id="myRange" name="price">
                    <h3 id="result">0</h3>
                </div>
            </div>

        </div>

        <?php
        require_once("../../../BE/BUS/productBUS.php");
        $productList = productBUS::getInstance()->getAllProduct();

        ?>
        <div id="products">
            <?php foreach ($productList as $product) :
            if ($product['gender'] == 1) {
                    $product['logo'] = 'new.gif';
                } else {
                    $product['logo'] = 'star.gif';
                }
            ?>
                <iframe src="./product.php?data=<?php echo urlencode(json_encode($product)); ?>" frameborder="0"></iframe>
            <?php endforeach; ?>
        </div>
    </div>
    <iframe src="./productDetail.php" frameborder="0" id="product-detail"></iframe>

    <link rel="stylesheet" href="../../css/productStyle/productList.css">
    <link rel="stylesheet" href="../../css/productStyle/product.css">
</body>
<script src="../../controller/product/productList.js"></script>
<script src="../../controller/product/product.js"></script>

<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script>
    function selectHandle(url, method, data) {
        $.ajax({
            type: method,
            url: url,
            data: data,
            dataType: 'json',
            success: function(res) {
                console.log("test: " + res.result);
                var productList = document.getElementById('products');
                productList.innerHTML = '';

                res.result.forEach((product) => {
                    var iframe = document.createElement('iframe');
                    iframe.src = "./product.php?data=" + encodeURIComponent(JSON.stringify(product));
                    iframe.frameBorder = "0";

                    // Thêm iframe vào productList
                    productList.appendChild(iframe);

                })


            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(jqXHR.responseText);
                console.error("AJAX request failed:", textStatus, errorThrown);
            }
        })
    }

    document.querySelectorAll('#type-value input[name="categoryId"]').forEach(function(radio) {
        radio.addEventListener('click', function() {
            sendAjaxRequest();
        });
    });

    document.querySelectorAll('#gender-value input[name="gender"]').forEach(function(radio) {
        radio.addEventListener('click', function() {
            sendAjaxRequest();
        });
    });

    document.getElementById('myRange').addEventListener('input', function() {
        sendAjaxRequest();
    });
    
    var searchValue = getParameterByName('searchValue');
    if (searchValue) {
        sendAjaxRequest();
    }

    function sendAjaxRequest() {
        var typeValue = document.querySelector('#type-value input[name="categoryId"]:checked');
        var genderValue = document.querySelector('#gender-value input[name="gender"]:checked');
        var priceInput = document.getElementById('myRange');
        var priceValue = priceInput.value;
        var maxPrice = priceInput.max;

        var selectedType = typeValue ? typeValue.value : 'defaultType';
        var selectedGender = genderValue ? genderValue.value : 'defaultGender';


        selectHandle('../../../main/handler/searchAjax.php', 'POST', {
            searchValue: searchValue,
            type: selectedType,
            gender: selectedGender,
            price: priceValue,
            maxPrice: maxPrice
        });
    }

    // reload page when click delete button
    var delSelected = document.getElementById('delete-btn');
    delSelected.addEventListener('click', () => {
        document.querySelectorAll('#type-value input[name="type"]:checked').forEach((radio) => {
            radio.checked = false;
        });

        document.querySelectorAll('#gender-value input[name="type"]:checked').forEach((radio) => {
            radio.checked = false;
        });

        document.getElementById('myRange').value = 0;

        history.replaceState({}, document.title, window.location.pathname); // clear history search value
        location.reload();
    })

    function getParameterByName(name, url) {
        if (!url) url = window.location.href;
        name = name.replace(/[\[\]]/g, "\\$&");
        var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
            results = regex.exec(url);
        if (!results) return null;
        if (!results[2]) return '';
        return decodeURIComponent(results[2].replace(/\+/g, " "));
    }
</script>