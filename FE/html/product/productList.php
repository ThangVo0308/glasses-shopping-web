<?php
$productList = json_decode($_GET['data'], true);
?>
<div id="products">

</div>

<div id="switchPage">

</div>

<link rel="stylesheet" href="../../css/productStyle/product.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    // show total page of products
    pagination('../../../main/handler/pagination.php', 'POST', {
        data: <?php echo json_encode($productList) ?>
    })

    var currentPage = 1;

    function pagination(url, method, data) {
        $.ajax({
            type: method,
            url: url,
            data: data,
            dataType: 'json',
            success: function(res) {
                var switchPage = document.getElementById('switchPage');
                for (var i = 1; i <= res.totalPage; i++) {
                    var switchContent = document.createElement('span');
                    switchContent.textContent = i;
                    switchContent.className = 'switchID';
                    switchContent.setAttribute('page', i);
                    switchPage.append(switchContent);
                }

                pageProducts('../../../main/handler/pageProduct.php', 'POST', {
                    page: currentPage
                })

                var switchIDs = document.querySelectorAll('.switchID');
                switchIDs.forEach((switchID) => {
                    switchID.addEventListener('click', () => {
                        currentPage = parseInt(switchID.getAttribute('page'));
                        pageProducts('../../../main/handler/pageProduct.php', 'POST', {
                            page: currentPage
                        })
                    })
                })

            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(jqXHR.responseText);
                console.error("AJAX request failed:", textStatus, errorThrown);
            }
        })
    }

    // show specific products in each page
    function pageProducts(url, method, data) {
        $.ajax({
            type: method,
            url: url,
            data: data,
            dataType: 'json',
            success: function(res) {
                var productList = document.getElementById('products');
                productList.innerHTML = '';
                res.listProduct.forEach((product) => {
                    var iframe = document.createElement('iframe');
                    iframe.src = "./product.php?data=" + encodeURIComponent(JSON.stringify(product));

                    productList.appendChild(iframe);
                })
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(jqXHR.responseText);
                console.error("AJAX request failed:", textStatus, errorThrown);
            }
        })
    }





    // search product
    function selectHandle(url, method, data) {
        $.ajax({
            type: method,
            url: url,
            data: data,
            dataType: 'json',
            success: function(res) {
                var productList = document.getElementById('products');
                productList.innerHTML = '';

                res.result.forEach((product) => {
                    console.log(product);
                    var iframe = document.createElement('iframe');
                    iframe.src = "./product.php?data=" + encodeURIComponent(JSON.stringify(product));

                    // Thêm iframe vào productList
                    productList.appendChild(iframe);

                })

            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(jqXHR.responseText);
                console.error("AJAX request failed:", textStatus, errorThrown);
            }
        })
    }
</script>