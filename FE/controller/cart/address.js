var addressIframe = parent.document.getElementById('addressIframe');
var addressForm = document.getElementById('ship-address');
var btnNewAddress = document.getElementById('btnNewAddress');
var newAddessContainer = document.getElementById('newAddessContainer');

window.onclick = function (e) {
    if (e.target == addressForm.parentElement) {
        addressIframe.style.display = 'none';
    }
    if (e.target == newAddessContainer) {
        newAddessContainer.style.display = 'none';
    }
    
}

btnNewAddress.onclick = function(){
    newAddessContainer.style.display = 'flex';
}