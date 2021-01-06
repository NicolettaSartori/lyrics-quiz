'use strict'

document.addEventListener('DOMContentLoaded', init)

function init() {
    let answers = document.getElementsByClassName('answer')
    for(let i = 0; i < answers.length; i++) {
        answers[i].addEventListener('click', answer)
    }
}



function answer() {
    this.style.backgroundColor = 'rgba(255, 133, 183, 0.15)';
    //border um alles $main-dark
}
