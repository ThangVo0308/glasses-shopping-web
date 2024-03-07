var newAddressContainer = document.getElementById('newAddessContainer');
newAddressContainer.onclick = function(e) {
    if (e.target == newAddressContainer) {
        newAddressContainer.style.display = 'none';
    }
}