<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sản Phẩm</title>
    <link rel="stylesheet" href="../../css/productStyle/products.css">
    <script src="../../controller/product/products.js"></script>
</head>

<body>
    <iframe src="../path.php" frameborder="0" id="path"></iframe>

    <h3 id="title" >Mắt kính chính hãng PreVision</h3>

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
            <div id="filter-header" >
                <div>Tìm kiếm </div>
                <button id="delete-btn" >Xóa</button>
            </div>
            <div id="type" class="option-filter" >
                <div class="btn" >
                    <h3>Danh mục</h3>
                    <img src="../../../icons/menu_on.png" class="icon-menu" alt="" onclick="toggleDropdown('type-value',0)" >
                </div>
                <div id="type-value" class="value-filter">
                    <div class="value" >Mắt Kính</div>
                    <div class="value" >Giọng Kính</div>
                    <div class="value" >Phụ Kiện</div>
                </div>
            </div>

            <div id="gender" class="option-filter" >
                <div class="btn" >
                    <h3>Giới tính</h3>
                    <img src="../../../icons/menu_on.png" class="icon-menu" alt="" onclick="toggleDropdown('gender-value',1)" >
                </div>
                <div id="gender-value" class="value-filter" >
                    <div class="value" >Nam</div>
                    <div class="value" >Nữ</div>
                </div>
            </div>

            <div id="price" class="option-filter" >
                <div class="btn" >
                    <h3>Giá tiền</h3>
                    <img src="../../../icons/menu_on.png" class="icon-menu" alt="" onclick="toggleDropdown('price-value',2)" >
                </div>
                <div id="price-value" class="value-filter" >
                    <input type="range" min="0" max="100" value="0" class="range-slider-input" id="start">
                    <input type="range" min="0" max="100" value="100" class="range-slider-input" id="end">
                </div>
            </div>

        </div>
        <div id="products">

        </div>
    </div>
</body>

</html>
<script>
    var productList = [{
            id: '01',
            name: 'Sản phẩm 1',
            price: '100000',
            image: 'logo.png',
            logo: 'new.gif'
        },
        {
            id: '02',
            name: 'Sản phẩm 2',
            price: '150000',
            image: 'logo.png',
            logo: 'new.gif'
        },
        {
            id: '03',
            name: 'Sản phẩm 3',
            price: '120000',
            image: 'logo.png',
            logo: 'star.gif'
        },
        {
            id: '04',
            name: 'Sản phẩm 3',
            price: '120000',
            image: 'logo.png',
            logo: 'star.gif'
        },
        {
            id: '05',
            name: 'Sản phẩm 3',
            price: '120000',
            image: 'logo.png',
            logo: 'star.gif'
        },
        {
            id: '06',
            name: 'Sản phẩm 3',
            price: '120000',
            image: 'logo.png',
            logo: 'star.gif'
        },
        {
            id: '07',
            name: 'Sản phẩm 3',
            price: '120000',
            image: 'logo.png',
            logo: 'star.gif'
        },
        {
            id: '08',
            name: 'Sản phẩm 3',
            price: '120000',
            image: 'logo.png',
            logo: 'star.gif'
        },
        {
            id: '09',
            name: 'Sản phẩm 3',
            price: '120000',
            image: 'logo.png',
            logo: 'star.gif'
        },
        {
            id: '10',
            name: 'Sản phẩm 3',
            price: '120000',
            image: 'logo.png',
            logo: 'star.gif'
        },
        {
            id: '11',
            name: 'Sản phẩm 3',
            price: '120000',
            image: 'logo.png',
            logo: 'star.gif'
        },
    ];

    function createProductFrames() {
        var productContainer = document.getElementById('products');
        productContainer.innerHTML = '';
        var i = 0;
        productList.forEach(function(product) {
            var iframe = document.createElement('iframe');
            iframe.src = 'product.php';
            iframe.frameborder = '0';

            iframe.onload = function() {
                iframe.contentWindow.postMessage(product, '*');
            };
            productContainer.appendChild(iframe);
        });
    }
    createProductFrames();
</script>