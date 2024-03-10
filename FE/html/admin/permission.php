<?php
$role=[
    [
        'id'=>1,
        'name'=>'Nhân viên'
    ],
    [
        'id'=>2,
        'name'=>'Quản lý'
    ],
    ];
    $c=count($role);
?>
<div id="warper">
<div id="permission">
    <div class="header">
        <h2><i class="fa-solid fa-user-pen"></i> Phân quyền</h2>
            <div class="button-placeholder">
                <div class="new-button" onclick="loadModalBoxByAjax('newPermission',<?=$c?>)">
                    <div class="icon-placeholder"><i class="fa-solid fa-user-plus fa-sm"></i></div>
                    <div class="info-placeholder">Thêm</div>
                </div>
            </div>
    </div>
    <div class="permission-placeholder">
        <div class="title-placeholder">
            <div class="title">Mã quyền</div>
            <div class="title">Tên quyền</div>
            <div class="title"></div>

        </div>
        <div class="list-placeholder">
            <?php for ($i = 0; $i < count($role); $i++): ?>
                <div class="role-information">
                    <div class="item">
                        <?= $role[$i]['id'] ?>
                    </div>
                    <div class="item">
                        <?= $role[$i]['name'] ?>
                    </div>
                    <div class="item" onclick="loadModalBoxByAjax('detailPermission', <?=$i?>)"><i
                            class="fa-solid fa-circle-info"></i>
                    </div>
                </div>
            <?php endfor ?>
        </div>
    </div>

    <div id="modal-box"></div>
</div>
</div>
