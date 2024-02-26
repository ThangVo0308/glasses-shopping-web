<?php 
    for ($page = 1; $page <= $totalPage; $page++) {
        if($page != $current_page) {
            echo "<a class='' href='?per_page=$item_per_page&page=$page'>$page</a>"; // ko hiển thị màu cho ô
        }else {
            echo "<strong class=''>$page</strong>"; // hiển thị màu in đậm ô đó khi trang ở currentPage
        }
    }
?>