function changIframeProducts() {
    var homeScreen = parent.parent.document.getElementById("homeScreen");
    homeScreen.src = '../FE/html/product/productList.php';
    homeScreen.name = 'product';
}
function changIframeHomeScreen() {
    var homeScreen = parent.parent.document.getElementById("homeScreen");
    homeScreen.src = '../FE/html/homeScreen.php'
    homeScreen.name = 'homeScreen'
}
function changIframeCart() {
    var homeScreen = parent.parent.document.getElementById("homeScreen");
    homeScreen.src = '../FE/html/cart/cart.php'
    homeScreen.name = 'cart'
}
function changIframeContact() {
    var homeScreen = parent.parent.document.getElementById("homeScreen");
    homeScreen.src = '../FE/html/contact.php'
    homeScreen.name = 'cart'
}
function changIframeHistoryCart() {
    var homeScreen = parent.parent.document.getElementById("homeScreen");
    homeScreen.src = '../FE/html/historyCart.php'
    homeScreen.name = 'cart'
}
