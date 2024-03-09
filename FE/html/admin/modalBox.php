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
            default:
        echo `<h1>Page not found 404</h1>`;
    }
} else {
    echo `<h1>Page not found 404</h1>`;
}
?>
