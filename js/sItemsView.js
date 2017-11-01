
$(document).ready(function () {

    let sortSelect = $('#sort-select');

    let selectedSortOption = getUrlParameter('sort');
    if (selectedSortOption === undefined) {
        selectedSortOption = 'popularity';
    }
    sortSelect.val(selectedSortOption);

    sortSelect.change(function () {
        let sort = getUrlParameter('sort');
        let option = $(this).find(':selected').attr('value');
        let currentUrl = window.location.href;
        if (sort === undefined) {
            window.location.href = currentUrl + '?sort=' + option;
        } else {
            window.location.href = replaceUrlParam(currentUrl, 'sort', option);
        }
    });

});

var getUrlParameter = function getUrlParameter(sParam) {
    var sPageURL = decodeURIComponent(window.location.search.substring(1)),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : sParameterName[1];
        }
    }
};

function replaceUrlParam(url, paramName, paramValue){
    if(paramValue === null)
        paramValue = '';
    let pattern = new RegExp('\\b('+paramName+'=).*?(&|$)');
    if(url.search(pattern)>=0){
        return url.replace(pattern,'$1' + paramValue + '$2');
    }
    url = url.replace(/\?$/,'');
    return url + (url.indexOf('?')>0 ? '&' : '?') + paramName + '=' + paramValue;
}