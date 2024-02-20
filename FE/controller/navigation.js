function changIframeProducts() {
    var homeScreen = parent.document.getElementById("homeScreen");
    homeScreen.src = '../FE/html/product/productList.php';
    homeScreen.name = 'product';
}
function changIframeHomeScreen() {
    var parentWindow = parent;
    var homeScreen = parentWindow.document.getElementById("homeScreen");
    homeScreen.src = '../FE/html/homeScreen.php'
    homeScreen.name = 'homeScreen'
}
