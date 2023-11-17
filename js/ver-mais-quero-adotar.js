var botao = document.querySelector('.post-animal-button');
var popup = document.querySelector('.main-popup-vermais');

botao.addEventListener('click', function() {
    popup.classList.add('aberto');
});

var fechar = document.querySelector('.close-vermais');

fechar.addEventListener('click', function() {
    popup.classList.remove('aberto');
});
