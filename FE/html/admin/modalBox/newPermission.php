<?php
$id=$_POST['id'];
$role=[
    [
        'id'=>1,
        'name'=>'Nhân viên'
    ],
    [
        'id'=>2,
        'name'=>'Quản lý'
    ]
    ];
$permission=[
    [
        'id'=>1,
        'function_id'=>1,
        'name'=>'Truy cập'
    ],
    [
        'id'=>2,
        'function_id'=>2,
        'name'=>'Truy cập'
    ],
    [
        'id'=>3,
        'function_id'=>2,
        'name'=>'Thêm'
    ],
    [
        'id'=>4,
        'function_id'=>2,
        'name'=>'Sửa'
    ],
    [
        'id'=>5,
        'function_id'=>2,
        'name'=>'Xóa'
    ],
    [
        'id'=>6,
        'function_id'=>3,
        'name'=>'Truy cập'
    ],
    [
        'id'=>7,
        'function_id'=>3,
        'name'=>'Sửa'
    ],
    [
        'id'=>8,
        'function_id'=>4,
        'name'=>'Truy cập'
    ],
    [
        'id'=>9,
        'function_id'=>4,
        'name'=>'Thêm'
    ],
    [
        'id'=>10,
        'function_id'=>4,
        'name'=>'Sửa'
    ],
    [
        'id'=>11,
        'function_id'=>4,
        'name'=>'Xóa'
    ],
    [
        'id'=>12,
        'function_id'=>5,
        'name'=>'Truy cập'
    ],
    [
        'id'=>13,
        'function_id'=>5,
        'name'=>'Thêm'
    ],
    [
        'id'=>14,
        'function_id'=>5,
        'name'=>'Sửa'
    ],
    [
        'id'=>15,
        'function_id'=>5,
        'name'=>'Xóa'
    ],
    [
        'id'=>16,
        'function_id'=>6,
        'name'=>'Truy cập'
    ],
    [
        'id'=>17,
        'function_id'=>6,
        'name'=>'Thêm'
    ],
    [
        'id'=>18,
        'function_id'=>6,
        'name'=>'Sửa'
    ],
    [
        'id'=>19,
        'function_id'=>6,
        'name'=>'Xóa'
    ],
    [
        'id'=>20,
        'function_id'=>7,
        'name'=>'Truy cập'
    ],
    [
        'id'=>21,
        'function_id'=>7,
        'name'=>'Thêm'
    ],
    [
        'id'=>22,
        'function_id'=>8,
        'name'=>'Truy cập'
    ],
    [
        'id'=>23,
        'function_id'=>8,
        'name'=>'Thêm'
    ],
    [
        'id'=>24,
        'function_id'=>8,
        'name'=>'Sửa'
    ],
    [
        'id'=>25,
        'function_id'=>8,
        'name'=>'Xóa'
    ],
];
$function=[
    [
        'id'=>1,
        'name'=>'Thống kê'
    ],
    [
        'id'=>2,
        'name'=>'Sản phẩm'
    ],
    [
        'id'=>3,
        'name'=>'Đơn hàng'
    ],
    [
        'id'=>4,
        'name'=>'Giảm giá'
    ],
    [
        'id'=>5,
        'name'=>'Điểm tích lũy'
    ],
    [
        'id'=>6,
        'name'=>'Tài khoản'
    ],
    [
        'id'=>7,
        'name'=>'Nhập hàng'
    ],
    [
        'id'=>8,
        'name'=>'Phân quyền'
    ],
];
$role_permission=[
    [
        'role'=>1,
        'permission'=>2,
    ],
    [
        'role'=>1,
        'permission'=>3,
    ],
    [
        'role'=>2,
        'permission'=>1,
    ],
    
];
$c=$_POST['id']+1;
?>
<h1 style="padding-top: 30px">Thêm vai trò</h1>
<div class="info-role">
    <div class="role-header">Thông tin vai trò</div>
    <div class="row">
        <label for="">Mã :</label>
        <Span>
            <?= $c ?>
        </Span>
    </div>
    <div class="row">
        <label for="">Vai trò :</label>
            <input type="text" value="">
    </div>
    <div class="button-layout">
        
            <div class="button-container" >
                <i class="fa-solid fa-plus"></i>
                <span class="info-placeholder">Lưu</span>
            </div>
             <div class="button-container" onclick="loadModalBoxByAjax()">
                <i class="fa-solid fa-x"></i>
                <span class="info-placeholder">Hủy</span>
            </div>
    </div>
</div>
<div class="role-placeholder">
    <?php foreach ($function as $fs): ?>
        <div class="role-box">
            <div class="role-header">
                 <?= $fs['name'] ?> 
            </div>
            <?php foreach (getDetailRoleByFunction($fs['id'],$permission) as $roleDetails): ?>
                <div class="role-item">
                    <?= $roleDetails['name'] ?>
                </div>
                <div class="checkbox-placeholder">
                    <input type="checkbox" value=""  >
                </div>
            <?php endforeach ?>
        </div>
    <?php endforeach ?>
</div>
<?php
function getDetailRoleByFunction($f,$permission)
{
    $detailRole = array();
    foreach($permission as $p){
        if($p['function_id']==$f) 
        {
            $detailRole[] = array('id' => $p['id'], 'name' => $p['name']);

        }
    } 
   return $detailRole;
}
?>

