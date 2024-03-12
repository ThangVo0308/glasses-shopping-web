var btnSearch = document.getElementById('btnSearch');
var searchValue = document.getElementById('searchValue');
var searchParent = searchValue.parentElement;

btnSearch.onclick = function () {
    var computedStyle = window.getComputedStyle(searchValue);
    var searchDisplayStyle = computedStyle.getPropertyValue('display');

    if (searchDisplayStyle === 'none') {
        searchValue.style.display = 'block';
        setTimeout(function () {
            searchValue.style.width = '170px';
            searchValue.style.opacity = '1';
            searchValue.style.transition = 'all 0.5s ease';

            searchParent.style.width = '170px';
            searchParent.style.transition = 'all 0.5s ease';
        }, 100);
    } else {
        searchValue.style.width = '27px';
        searchValue.style.transition = 'all 0.5s ease';
        searchValue.style.opacity = '0';

        searchParent.style.width = '27px';
        searchParent.style.transition = 'all 0.5s ease';
        setTimeout(function () {
            searchValue.style.display = 'none';
        }, 500);
    }
}

var btnUser = document.getElementById('userLogin');
var userOptions = parent.document.getElementById('userOptions');

