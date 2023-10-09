// Selecionar os elementos dos dois selects
const optionMenu1 = document.querySelector(".select-menu-1");
const selectBtn1 = optionMenu1.querySelector(".select-btn");
const options1 = optionMenu1.querySelectorAll(".option");
const sBtnText1 = optionMenu1.querySelector(".sBtn-text");

const optionMenu2 = document.querySelector(".select-menu-2");
const selectBtn2 = optionMenu2.querySelector(".select-btn");
const options2 = optionMenu2.querySelectorAll(".option");
const sBtnText2 = optionMenu2.querySelector(".sBtn-text");

// Adicionar eventos para cada select
selectBtn1.addEventListener("click", () => optionMenu1.classList.toggle("active"));
selectBtn2.addEventListener("click", () => optionMenu2.classList.toggle("active"));

options1.forEach(option => {
    option.addEventListener("click", () => {
        let selectedOption = option.querySelector(".option-text").innerText;
        sBtnText1.innerText = selectedOption;
        optionMenu1.classList.remove("active");
    });
});

options2.forEach(option => {
    option.addEventListener("click", () => {
        let selectedOption = option.querySelector(".option-text").innerText;
        sBtnText2.innerText = selectedOption;
        optionMenu2.classList.remove("active");
    });
});
