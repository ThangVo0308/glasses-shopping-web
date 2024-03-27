<?php
if (isset($_POST["page"])) {
  switch ($_POST["page"]) {
    case "Thống kê":
      include("../admin/statistic.php");
      break;
    case "Sản phẩm":
      include("../admin/product.php");
      break;
      case "Đơn hàng":
      include("../admin/order.php");
      break;
    case "Tài khoản":
      include("../admin/account.php");
      break;
    case "Nhập hàng":
      include("../admin/supply.php");
      break;
      case "Giao diện":
      include("../admin/interface.php");
      break;
    case "Phân quyền":
      include("../admin/permission.php");
      break;
    case "Giảm giá":
      include("../admin/discount.php");
      break;
    case "Điểm tích lũy":
      include("../admin/point.php");
      break;
    default:
      echo `<h1>Page not found 404</h1>`;    
  }
} else {
}
?>
