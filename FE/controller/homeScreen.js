

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
    var nextImage = document.querySelector('.image-next');
    var posterMain = document.querySelector('.poster-main');
    var posterNext = document.querySelector('.poster-next');
    posterMain.style.animationIterationCount = 0;
    posterNext.style.animationIterationCount = 0;
    setTimeout(() => {
        posterMain.style.animationIterationCount = 'infinite';
        posterNext.style.animationIterationCount = 'infinite';
    }, 4000);
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
var mainImage = document.querySelector('.image-main');
var nextImage = document.querySelector('.image-next');

const data = [
    'poster2.png',
    'poster3.png',
    'poster1.png',
]

let currentIndex = 0;

var interval = setInterval(() => {
    mainImage.src = nextImage.src;
    currentIndex = (currentIndex + 1) % data.length; 
    nextImage.src = '../../images/' + data[currentIndex];

}, 4000);



