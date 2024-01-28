var productList = [
    { id: '01', name: 'Sản phẩm 1', price: '100000', image: 'logo.png', logo: 'new.gif' },
    { id: '02', name: 'Sản phẩm 2', price: '150000', image: 'logo.png', logo: 'new.gif' },
    { id: '03', name: 'Sản phẩm 3', price: '120000', image: 'logo.png', logo: 'star.gif' },
];

function changeInput() {
    var inputElement = document.querySelector('.searchInput');
    if (inputElement.style.visibility === "collapse") {
        inputElement.style.visibility = "visible";
    } else {
        inputElement.style.visibility = "collapse";
    }
}

function changeImage(clickedImage) {
    var mainImage = document.querySelector('.image-main');
    mainImage.src = clickedImage.src;
}

function selectSlider(number) {
    var items = document.querySelectorAll('.slider-item');
    items.forEach(function (item) {
        item.classList.remove('selected');
    });

    var selectedSlider = document.querySelector('.slider-item:nth-child(' + number + ')');
    selectedSlider.classList.add('selected');

    var container = document.getElementById('slider-container');
    container.scrollLeft = selectedSlider.offsetLeft - (container.offsetWidth - selectedSlider.offsetWidth) / 2;
    // thay đổi dữ liệu tại đây
    createProductFrames();
}
function createProductFrames() {
    var productContainer = document.getElementById('product');

    productContainer.innerHTML = '';

    var i = 0;

    productList.forEach(function (product) {
        var iframe = document.createElement('iframe');
        iframe.src = '../../FE/html/product/product.php'; 
        iframe.frameborder = '0';

        iframe.onload = function () {
            iframe.contentWindow.postMessage(product, '*');
        };
        productContainer.appendChild(iframe);
    });
}
document.addEventListener('scroll', function () {
    //giữ header
    var header = document.getElementById('header');
    var scrollTop = window.scrollY;

    var threshold = 100;

    if (scrollTop > threshold) {
        header.classList.add('fixed');
    } else {
        header.classList.remove('fixed');
    }

    //tạo fade-in fade-out product
    var productContainer = document.getElementById('product');
    var windowHeight = window.innerHeight;
    var productTop = productContainer.getBoundingClientRect().top;

    // Điều chỉnh ngưỡng dựa trên sở thích của bạn
    var threshold = 0.5;

    if (productTop < windowHeight * threshold) {
        productContainer.classList.add('fade-in');
    }
});

document.addEventListener('scroll', function () {
    var header = document.getElementById('header');
    var scrollTop = window.scrollY;

    // Đặt ngưỡng tùy thuộc vào sở thích của bạn
    var threshold = 100;

    if (scrollTop > threshold) {
        header.classList.add('fixed');
    } else {
        header.classList.remove('fixed');
    }
});



document.addEventListener('DOMContentLoaded', function () {
    // Đoạn mã hiện có của bạn ở đây

    // Thêm event listener scroll ở đây
    document.addEventListener('scroll', function () {
        var productContainer = document.getElementById('product');
        var windowHeight = window.innerHeight;
        var productTop = productContainer.getBoundingClientRect().top;

        // Điều chỉnh ngưỡng dựa trên sở thích của bạn
        var threshold = 0.5;

        if (productTop < windowHeight * threshold) {
            productContainer.classList.add('fade-in');
        }
    });

    // Khởi tạo các khung sản phẩm
    createProductFrames();
});

