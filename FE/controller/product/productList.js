function toggleDropdown(element, index) {
    var typeValue = document.getElementById(element);
    var icon = document.getElementsByClassName('icon-menu')[index];
    var filter = document.getElementsByClassName('option-filter')[index];

    if (typeValue.style.display === "flex") {
        typeValue.style.display='none';
        icon.style.transform = 'rotate(-90deg)';
        filter.style.borderBottom = 'none';
    } else {
        icon.style.transform = 'rotate(0deg)';
        filter.style.borderBottom = '#2c85da 1px solid';
        typeValue.style.display='flex';
    };
}


var rangeInput = document.getElementById("myRange");
var resultDisplay = document.getElementById("result");

rangeInput.addEventListener("input", function () {
    resultDisplay.textContent = rangeInput.value.replace(/(.)(?=(\d{3})+$)/g,'$1,')
});
