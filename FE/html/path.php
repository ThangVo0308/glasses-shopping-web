<body>
    <div id="path">
        <a>Trang chủ</a>
        <img src="../../icons/next.png" alt="" srcset="">
        <a id="current-path" >Sản Phẩm</a>
    </div>
</body>

<link rel="stylesheet" href="../css/path.css">

<script>
    var currentPath =document.getElementById('current-path');
    var currentProducts = parent.document.getElementById('pathProducts');
    if(currentProducts){
        currentPath.textContent ='Sản phẩm'
    }

    var currentContact = parent.document.getElementById('pathContact');
    if(currentContact){
        currentPath.textContent ='Liên hệ'
    }

    var currentCart = parent.document.getElementById('pathCart');
    if(currentCart){
        currentPath.textContent ='Giỏ hàng'
    }
</script>