<?php
    require('./database.php');

    $item_per_page = 9;
    $current_page = 1;
    $offset = ($current_page - 1) * $item_per_page;
    $listProduct = productBUS::getInstance()->getPage($item_per_page,$offset); // for paging

    


?>



