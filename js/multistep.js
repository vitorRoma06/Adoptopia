const steps = Array.from(document.querySelectorAll("form .step"));
const nextBtn = document.querySelectorAll("form .prox-button-register");
const prevBtn = document.querySelectorAll("form .voltar-button-register");
const form = document.querySelector("form");
nextBtn.forEach((button) => {
    button.addEventListener("click", () => {
        if (validateForm()) {
            changeStep("next");
        }
    });
});

function validateForm() {
    const nomeInput = document.querySelector("input[name='nome']");
    const nomeValue = nomeInput.value.trim();
    

    const regex = /^[a-zA-Z\s]*$/;
    
    if (nomeValue.length < 1 || nomeValue.length > 70 || !regex.test(nomeValue)) {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Digite seu nome corretamente (apenas letras e espaços são permitidos).',
        });
        return false;
    }
    return true;
}

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