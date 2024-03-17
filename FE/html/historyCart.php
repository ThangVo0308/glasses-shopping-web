<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lịch sử mua hàng</title>
    <link rel="stylesheet" href="../css/historyCart.css">

</head>

<body>
    <div id="cart">
        <div class="title section">
            <img src="https://deo.shopeemobile.com/shopee/shopee-pcmall-live-sg/cart/d9e992985b18d96aab90.png" alt="">
            <span>Sản phẩm chất lượng, giao hàng cấp tốc đó là những gì cửa hàng này không có</span>
        </div>
        <div class="history-search">
            <input type="text" placeholder="Tìm đơn hàng theo Mã đơn hàng" />
            <button type="submit">Tìm đơn hàng</button>
        </div>
        <div class="header section">
            <div class="item">
                <span>Mã hóa đơn</span>
                <span>Ngày đặt</span>
                <span>Số tiền</span>
                <span>Địa chỉ</span>
                <span>Người nhận</span>
                <span>Số điện thoại</span>
                <span>Tình trạng</span>
                <span>Thao tác</span>
            </div>
        </div>
        <?php
        require_once("../../BE/BUS/orderBUS.php");
        $orderList = orderBUS::getInstance()->getAllorder();
        ?>
        <div id="products">
            <?php foreach ($orderList as $order) : ?>
                <div class="product section">
                    <div class="item">  
                        <span><?php echo $order['id']; ?></span>
                        <span class="date"><?php echo $order['order_date']; ?></span>
                        <span id="totalPrice"><?php echo $order['total_price']; ?></span>
                        <span class="address"><?php echo $order['address']; ?></span>
                        <span class="name_received"><?php echo $order['name_received']; ?></span>
                        <span class="phone_received"><?php echo $order['phone_received']; ?></span>
                        <span class="status"><?php echo $order['status']; ?></span>
                        <span id="deleteBtn">Xem chi tiết</span>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    </div>
    </div>

    <iframe src="./detailsHistory.php?data=<?php echo urlencode(json_encode($orderList)); ?>" frameborder="0" id="details-history"></iframe>

</body>

</html>

<?php
if (empty($orderList)) {
    echo '  <div class="history-table">
    <div class="data-empty">
    <div class="icon-empty">
    <svg width="132" height="170" viewBox="0 0 132 170" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g clip-path="url(#clip0_6133_13905)">
                    <path d="M125.486 120.371H113.585V91.6562H132V113.845C132 117.451 129.086 120.371 125.486 120.371Z" fill="#A1AAAF"></path>
                    <path d="M99.3294 167.226C95.6392 170.922 89.6482 170.922 85.949 167.226L50.2828 131.497C46.5926 127.801 46.5926 121.799 50.2828 118.094C53.973 114.397 59.964 114.397 63.6633 118.094L99.3294 153.822C103.029 157.528 103.029 163.529 99.3294 167.226Z" fill="#E1E4E6"></path>
                    <path d="M128.553 117.208C126.649 117.208 125.107 115.662 125.107 113.755V91.9459C125.107 91.8465 125.125 91.7561 125.134 91.6567H125.107V6.06465C125.107 2.72051 122.4 0 119.052 0H42.7036C39.3652 0 36.6494 2.71147 36.6494 6.06465V114.315C36.6494 117.66 39.3562 120.38 42.7036 120.38H113.585H125.107H125.486C129.086 120.38 132 117.461 132 113.855V113.764C132 115.662 130.457 117.208 128.553 117.208Z" fill="#E1E4E6"></path>
                    <path d="M40.1233 148.932C62.2828 148.932 80.2466 130.937 80.2466 108.739C80.2466 86.5409 62.2828 68.5459 40.1233 68.5459C17.9638 68.5459 0 86.5409 0 108.739C0 130.937 17.9638 148.932 40.1233 148.932Z" fill="#CBD1D6"></path>
                    <path d="M40.1235 136.577C55.4712 136.577 67.9129 124.113 67.9129 108.739C67.9129 93.3647 55.4712 80.9014 40.1235 80.9014C24.7758 80.9014 12.334 93.3647 12.334 108.739C12.334 124.113 24.7758 136.577 40.1235 136.577Z" fill="white"></path>
                    <path d="M51.6001 97.2418C52.9084 98.5524 52.9084 100.676 51.6001 101.987L33.3836 120.226C32.0753 121.537 29.955 121.537 28.6467 120.226C27.3385 118.916 27.3385 116.792 28.6467 115.481L46.8633 97.2328C48.1715 95.9313 50.2918 95.9313 51.6001 97.2418Z" fill="#F56F65"></path>
                    <path d="M51.6001 120.226C50.2918 121.537 48.1715 121.537 46.8633 120.226L28.6467 101.978C27.3385 100.667 27.3385 98.5435 28.6467 97.2329C29.955 95.9224 32.0753 95.9224 33.3836 97.2329L51.6001 115.481C52.9084 116.792 52.9084 118.925 51.6001 120.226Z" fill="#F56F65"></path>
                    <path d="M55.9488 25.7136C59.7112 25.7136 63.3112 22.4056 63.1398 18.5101C62.9684 14.6056 59.9819 11.3066 55.9488 11.3066C52.1864 11.3066 48.5864 14.6146 48.7578 18.5101C48.9293 22.4146 51.9157 25.7136 55.9488 25.7136Z" fill="white"></path>
                    <path d="M80.1925 25.7136C83.9549 25.7136 87.5549 22.4056 87.3834 18.5101C87.212 14.6056 84.2255 11.3066 80.1925 11.3066C76.4301 11.3066 72.8301 14.6146 73.0015 18.5101C73.1819 22.4146 76.1684 25.7136 80.1925 25.7136Z" fill="white"></path>
                    <path d="M104.445 25.7136C108.207 25.7136 111.807 22.4056 111.636 18.5101C111.464 14.6056 108.478 11.3066 104.445 11.3066C100.683 11.3066 97.0825 14.6146 97.2539 18.5101C97.4344 22.4146 100.421 25.7136 104.445 25.7136Z" fill="white"></path>
                    <path d="M108.28 44.9557H51.1307C49.678 44.9557 48.4961 43.7717 48.4961 42.3165V40.8071C48.4961 39.352 49.678 38.168 51.1307 38.168H108.28C109.732 38.168 110.914 39.352 110.914 40.8071V42.3165C110.914 43.7717 109.732 44.9557 108.28 44.9557Z" fill="white"></path>
                    <path d="M108.343 61.6042H51.0585C49.642 61.6042 48.4961 60.4563 48.4961 59.0373V57.7358C48.4961 56.3168 49.642 55.1689 51.0585 55.1689H108.343C109.759 55.1689 110.905 56.3168 110.905 57.7358V59.0373C110.914 60.4473 109.759 61.6042 108.343 61.6042Z" fill="white"></path>
                    </g>
                    <defs>
                    <clipPath id="clip0_6133_13905">
                    <rect width="132" height="170" fill="white"></rect>
                    </clipPath>
                    </defs>
                    </svg>
                    <p class="alert-empty">Quý khách chưa có đơn hàng nào.</p>
                    <div><a href="/main/index.php" class="button-continue">
                    Tiếp tục mua hàng
                    </a></div>
                    </div>
                    </div>';
} else {
    echo '<div id="products">';
    echo '</div>';
}
?>

<script>
  var deleteButtons = document.querySelectorAll('.item #deleteBtn');

for (var i = 0; i < deleteButtons.length; i++) {
    deleteButtons[i].onclick = function() {
        document.getElementById('details-history').style.display = 'block';
    };
}

</script>