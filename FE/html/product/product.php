<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/productStyle/product.css">
</head>
<body>
    <div id="product" >

    </div>
</body>

<script>
        window.addEventListener('message', function (event) {
            var productData = event.data;

            generateProductUI(productData);
        });

        function generateProductUI(productData) {
            var productContainer = document.getElementById('product');
            var productHTML = `
                <div>
                    <img src="../../../images/${productData.image}" alt="" class="image" >
                    <h3 class="id" >${productData.id}</h3>
                    <h3 class="name" >${productData.name}</h3>
                    <i class="price" >Price: ${productData.price}</i>
                    <img class="icon" src="../../../icons/${productData.logo}" alt="">
                </div>
            `;

            productContainer.innerHTML = productHTML;
        }
</script>

</html>