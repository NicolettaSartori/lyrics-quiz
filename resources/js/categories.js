'use strict'

//window.onload = init;

function init() {
    let destroys = document.getElementsByClassName('destroy');

    Array.from(destroys).forEach(function(destroy) {
        destroy.addEventListener('click', popUp);
    });
}


function popUp() {
    alert('Are your sure you want to delete this Category?')
}
