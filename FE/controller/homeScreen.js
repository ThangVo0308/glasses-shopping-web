

function changeInput() {
    var inputElement = document.querySelector('.searchvalue');
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
}

document.addEventListener('DOMContentLoaded', function () {

    // Thêm event listener scroll ở đây
    document.addEventListener('scroll', function () {
        var windowHeight = window.innerHeight;

        // Điều chỉnh ngưỡng dựa trên sở thích của bạn
        var threshold = 0.8;

        var serviceContainer = document.getElementById('service-intro');
        var serviceTop = serviceContainer.getBoundingClientRect().top;

        if (serviceTop < windowHeight * threshold) {
            serviceContainer.classList.add('fade-in');
        }

    });
});

  
