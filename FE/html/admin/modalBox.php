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
        default:
            echo `<h1>Page not found 404</h1>`;
    }
} else {
    echo `<h1>Page not found 404</h1>`;
}
?>