function toggleDropdown(element, index) {
    var typeValue = document.getElementById(element);
    var icon = document.getElementsByClassName('icon-menu');

    if (typeValue.style.display === "block") {
        typeValue.style.display = "none";
        icon[index].style.transform = 'rotate(-90deg)';
    } else {
        typeValue.style.display = "block"
        icon[index].style.transform = 'rotate(0deg)';
    }
}
