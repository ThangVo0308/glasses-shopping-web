<?php
session_start();

// Xóa dữ liệu của phiên làm việc
$_SESSION['currentUser'] = array();

// Trả về kết quả thành công
echo json_encode(["success" => true]);
?>
