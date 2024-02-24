<?php
if (isset($_POST["page"])) {
  switch ($_POST["page"]) {
    case "Thống kê":
      include("statistic.php");
      break;
    case "Sản phẩm":
      include("product.php");
      break;
      case "Đơn hàng":
      include("order.php");
      break;
    case "Tài khoản":
      include("account.php");
      break;
    case "Nhập hàng":
      include("supply.php");
      break;
      case "Giao diện":
      include("interface.php");
      break;
    case "Phân quyền":
      include("permission.php");
      break;
    default:
      echo `<h1>Page not found 404</h1>`;    
  }
} else {
}
?>