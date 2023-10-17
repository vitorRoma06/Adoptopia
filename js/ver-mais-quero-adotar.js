
var verMaisButtons = document.querySelectorAll(".post-animal-button");


verMaisButtons.forEach(function(button) {
  button.addEventListener("click", function(){
    var popup = button.parentElement.nextElementSibling;
    popup.style.display = 'flex';
  });
});


var closeButtons = document.querySelectorAll(".close-vermais");
closeButtons.forEach(function(closeButton) {
  closeButton.addEventListener("click", function(){
    var popup = closeButton.closest('.main-popup-vermais');
    popup.style.display = 'none';
  });
});
