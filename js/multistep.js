const steps = Array.from(document.querySelectorAll("form .step"));
const nextBtn = document.querySelectorAll("form .prox-button-register");
const prevBtn = document.querySelectorAll("form .voltar-button-register");
const form = document.querySelector("form");
nextBtn.forEach((button) => {
    button.addEventListener("click", () => {
        changeStep("next");
    });
});
prevBtn.forEach((button) => {
    button.addEventListener("click", () => {
        changeStep("prev");
    });
});
form.addEventListener("submit", (e) => {
    const inputs = [];
    form.querySelectorAll("input").forEach((input) => {
        const { name, value } = input;
        inputs.push({ name, value });
    });
    console.log(inputs);

});
function changeStep(btn) {
    let index = 0;
    const active = document.querySelector(".active");
    index = steps.indexOf(active);
    steps[index].classList.remove("active");
    if (btn === "next") {
        index++;
    }
    else if (btn === "prev") {
        index--;
    }
    steps[index].classList.add("active");

}