<?php
    require_once(__DIR__.'/../BE/BUS/productBUS.php');

    // $item_per_page = 9;
    $item_per_page = !empty($_GET['per_page']) ? $_GET['per_page'] : 9;
    // $current_page = 1;
    $current_page = !empty($_GET['page']) ? $_GET['page'] : 1;
    $offset = ($current_page - 1) * $item_per_page;
    $listProduct = productBUS::getInstance()->getPage($item_per_page,$offset); // for paging
    $totalProduct = productBUS::getInstance()->getTotal();
    $totalPage = ceil($totalProduct / $item_per_page);
    

    

?>
