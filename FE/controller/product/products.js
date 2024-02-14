function toggleDropdown() {
    var typeValue = document.getElementById("type-value");
    var icon = document.getElementById('icon-menu');

    if (typeValue.style.display === "block") {
        typeValue.style.display = "none";
        icon.src = '../../../icons/menu_off.png'
    } else {
        typeValue.style.display = "block";
        icon.src = '../../../icons/menu_on.png'
    }
}