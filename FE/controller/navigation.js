function changeIframeProducts() {
    var homeScreen = parent.document.getElementById("homeScreen");
    homeScreen.src = './customer/products.php';
    homeScreen.name = 'product';
}
function changeIframeHomeScreen() {
    var homeScreen = parent.document.getElementById("homeScreen");
    homeScreen.src = './customer/home.php'
    homeScreen.name = 'homeScreen'
}
function changeIframeCart() {
    var homeScreen = parent.document.getElementById("homeScreen");
    homeScreen.src = './customer/cart/cart.php'
    homeScreen.name = 'cart'
}
function changeIframeContact() {
    var homeScreen = parent.document.getElementById("homeScreen");
    homeScreen.src = './customer/contact.php'
    homeScreen.name = 'cart'
}
function changeIframeHistoryCart() {
    var homeScreen = parent.document.getElementById("homeScreen");
    homeScreen.src = './customer/historyCart.php'
    homeScreen.name = 'cart'
}
function changeIframeAccount() {
    var homeScreen = parent.document.getElementById("homeScreen");
    homeScreen.src = './customer/account.php'
    homeScreen.name = 'cart'
}

