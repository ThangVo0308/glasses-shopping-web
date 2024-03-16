var alertForm = document.getElementById('alertForm');
var alertIframe = parent.document.getElementById('alert');
var btnClose = document.getElementById('btnClose');
window.onclick = function(e) {
    if (e.target == alertForm.parentElement) {
        alertIframe.style.display = 'none';
    }
}

btnClose.onclick = function() {
    alertIframe.style.display = 'none';
}