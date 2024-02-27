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
function changIframeCart() {
    var parentWindow = parent;
    var homeScreen = parentWindow.document.getElementById("homeScreen");
    homeScreen.src = '../FE/html/cart/cart.php'
    homeScreen.name = 'cart'
}
function changIframeContact() {
    var parentWindow = parent;
    var homeScreen = parentWindow.document.getElementById("homeScreen");
    homeScreen.src = '../FE/html/contact.php'
    homeScreen.name = 'cart'
}
