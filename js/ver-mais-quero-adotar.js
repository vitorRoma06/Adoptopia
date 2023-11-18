var verMaisButtons = document.querySelectorAll(".post-animal-button");
var overlay = document.getElementById('overlay');
var overlay2 = document.getElementById('overlay2');
var adotarButtons = document.querySelectorAll(".quero-adotar-button");

verMaisButtons.forEach(function (button) {
    button.addEventListener("click", function () {

        document.querySelectorAll('.main-popup-vermais.aberto').forEach(function (popup) {
            popup.classList.remove('aberto');
        });

        var popup = button.parentElement.nextElementSibling;
        popup.classList.add('aberto');

        overlay.style.display = 'block';
    });
});


var closeButtons = document.querySelectorAll(".close-vermais");
closeButtons.forEach(function (closeButton) {
    closeButton.addEventListener("click", function () {
        var popup = closeButton.closest('.main-popup-vermais');
        popup.classList.remove('aberto');

        overlay.style.display = 'none';
    });
});

adotarButtons.forEach(function (button) {
    button.addEventListener("click", function () {
        var popup = document.querySelector('.main-popup-adotar');
        popup.classList.add('aberto');

        var animalPopup = document.querySelector('.main-popup-vermais.aberto');
        if (animalPopup) {
            animalPopup.style.filter = 'blur(2px)';
        }

        overlay2.style.display = 'block';
    });
});

var closeButton2 = document.querySelector('.main-popup-adotar .close-vermais');
closeButton2.addEventListener('click', function () {
    var popup = closeButton2.closest('.main-popup-adotar');
    popup.classList.remove('aberto');

    var animalPopup = document.querySelector('.main-popup-vermais.aberto');
    if (animalPopup) {
        animalPopup.style.filter = 'none';
    }

    overlay2.style.display = 'none';
});


