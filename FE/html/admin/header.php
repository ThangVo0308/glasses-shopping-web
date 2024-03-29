<?php
session_start();
$function = getFunction();
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.css">
<div class="background">
    <div class="top">
        <div class="logo-placeholder">
            <img src="../images/logo.png" alt="logo">
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
function getFunction()
 {
    $functions = [
        ['tenChucNang' => 'Thống kê', 'icon' => 'fa-solid fa-chart-column'],
        ['tenChucNang' => 'Sản phẩm', 'icon' => 'fa-solid fa-warehouse'],
        ['tenChucNang' => 'Đơn hàng', 'icon' => 'fa-solid fa-cart-shopping'],
        ['tenChucNang' => 'Giảm giá', 'icon' => 'fa-solid fa-percent'],
        ['tenChucNang' => 'Điểm tích lũy', 'icon' => 'fa-solid fa-ticket'],
        ['tenChucNang' => 'Tài khoản', 'icon' => 'fa-regular fa-user'],
        ['tenChucNang' => 'Nhập hàng', 'icon' => 'fa-solid fa-plus'],
        ['tenChucNang' => 'Phân quyền', 'icon' => 'fa-solid fa-user-pen'],
    ];
    return $functions;
 }
