function changeIframeProducts() {
    var homeScreen = parent.parent.document.getElementById("homeScreen");
    homeScreen.src = '../FE/html/products.php';
    homeScreen.name = 'product';
}
function changeIframeHomeScreen() {
    var homeScreen = parent.parent.document.getElementById("homeScreen");
    homeScreen.src = '../FE/html/homeScreen.php'
    homeScreen.name = 'homeScreen'
}
function changeIframeCart() {
    var homeScreen = parent.parent.document.getElementById("homeScreen");
    homeScreen.src = '../FE/html/cart/cart.php'
    homeScreen.name = 'cart'
}
function changeIframeContact() {
    var homeScreen = parent.parent.document.getElementById("homeScreen");
    homeScreen.src = '../FE/html/contact.php'
    homeScreen.name = 'cart'
}
function changeIframeHistoryCart() {
    var homeScreen = parent.parent.document.getElementById("homeScreen");
    homeScreen.src = '../FE/html/historyCart.php'
    homeScreen.name = 'cart'
}
function changeIframeAccount() {
    var homeScreen = parent.parent.document.getElementById("homeScreen");
    homeScreen.src = '../FE/html/account.php'
    homeScreen.name = 'cart'
}

