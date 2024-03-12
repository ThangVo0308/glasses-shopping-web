<?php
$productList = json_decode($_GET['data'], true);
$firstTenProducts = array_slice($productList, 0, 12);
?>
<div id="products">
    <?php foreach ($firstTenProducts as $product) : ?>
        <iframe src="./product.php?data=<?php echo urlencode(json_encode($product)); ?>" frameborder="0"></iframe>
    <?php endforeach; ?>
</div>
<div id="switchPage">
    <span class="switchID">1</span>
    <span class="switchID">2</span>
    <span class="switchID">3</span>
    <span class="switchID">4</span>
</div>
<link rel="stylesheet" href="../../css/productStyle/product.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
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
                console.error("AJAX request failed:", textStatus, errorThrown);
            }
        })
    }

    $(document).ready(function() {
        var productList = <?php echo json_encode($productList); ?>;
        $('.switchID').click(function(e) {
            var pageNumber = $(this).text();
            selectHandle('../../../main/handler/switchPageAjax.php', 'POST', {
                pageNumber: pageNumber,
                productList: productList,
            });
        });
    });
</script>