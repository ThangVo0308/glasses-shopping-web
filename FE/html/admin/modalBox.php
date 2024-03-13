<?php
if (isset($_POST["modalBox"])) {
    switch ($_POST["modalBox"]) {
        case 'detailProduct':
            include("modalBox/detailProduct.php");
            break;
        case 'editProduct':
            include("modalBox/editProduct.php");
            break;
        case 'newProduct':
            include("modalBox/newProduct.php");
            break;
        case 'detailOrder':
            include("modalBox/detailOrder.php");
            break;
        case 'editOrder':
            include("modalBox/editOrder.php");
            break;
        case 'detailAccount':
            include("modalBox/detailAccount.php");
            break; 
        case 'editAccount':
            include("modalBox/editAccount.php");
            break;
        case 'newAccount':
            include("modalBox/newAccount.php");
            break;
        case 'detailPermission':
            include("modalBox/detailPermission.php");
            break;
        case 'newPermission':
            include("modalBox/newPermission.php");
            break;
        case 'newDiscount':
            include("modalBox/newDiscount.php");
            break;
        case 'detailDiscount':
            include("modalBox/detailDiscount.php");
            break;
        case 'editDiscount':
            include("modalBox/editDiscount.php");
            break;
        case 'detailSupply':
            include("modalBox/detailSupply.php");
            break;
        case 'newSupply':
            include("modalBox/newSupply.php");
            break;
        case 'detailPoint':
            include("modalBox/detailPoint.php");
            break;
            default:
        echo `<h1>Page not found 404</h1>`;
    }
} else {
    echo `<h1>Page not found 404</h1>`;
}
?>
