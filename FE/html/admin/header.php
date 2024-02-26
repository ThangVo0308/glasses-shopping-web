<?php
require ("../../../BE/DAL/database.php");
session_start();
$function = getFunction();
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.css">
<div class="background">
    <div class="top">
        <div class="logo-placeholder">
            <img src="../../../images/logo.png" alt="logo">
        </div>
        <div class="top-menu">
            <?php foreach ($function as $f): ?>          
                    <div class="tab-title" onclick="selectMenuAdmin(this,'<?= $f['tenChucNang']?>')">
                        <div class="tab-icon"><i class="<?= $f['icon']?>"></i></div>
                        <div class="tab-info">
                            <?= $f['tenChucNang']?>
                        </div>
                    </div>
                    <?php endforeach ?>
        </div>
    </div>
    <div class="bottom">
        <div class="info-placeholder">
        <h3> Hello <br> Admin </h3> 
            <div class="log-out-button">
                <i class="fa-solid fa-right-from-bracket"></i>
            </div>
        </div>
    </div>
</div>
<?php
// Dùng database
// function getFunction()
// {
//     $servername = 'localhost';
//     $username = 'root';
//     $password = '';
//     $dbname = 'web2';

//     try {
//         $dp = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
//         $dp->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//     } catch (PDOException $e) {
//         echo "Connection failed: " . $e->getMessage();
//     }
//     $sql = "SELECT tenChucNang, icon FROM chucnang ORDER BY maChucNang;";
//     $stmt = $dp->prepare($sql);
//     $stmt->execute();
//     $functions= array();
    
//         while($row= $stmt->fetch(PDO::FETCH_ASSOC)){
//             array_push($functions,$row);
//         }
//     return $functions;
// }
// Dùng array
function getFunction()
 {
    $functions = [
        ['tenChucNang' => 'Thống kê', 'icon' => 'fa-solid fa-chart-column'],
        ['tenChucNang' => 'Sản phẩm', 'icon' => 'fa-solid fa-warehouse'],
        ['tenChucNang' => 'Đơn hàng', 'icon' => 'fa-solid fa-cart-shopping'],
        ['tenChucNang' => 'Tài khoản', 'icon' => 'fa-regular fa-user'],
        ['tenChucNang' => 'Nhập hàng', 'icon' => 'fa-solid fa-plus'],
        ['tenChucNang' => 'Giao diện', 'icon' => 'fa-regular fa-image'],
        ['tenChucNang' => 'Phân quyền', 'icon' => 'fa-solid fa-user-pen'],
    ];
    return $functions;
 }
