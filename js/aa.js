const form = document.querySelector("form");
function validateForm() {
    const senhaInput = document.querySelector("input[name='new_pass']");
    const senhaValue = senhaInput.value;

    const senhaRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[#@$!%*?&])[A-Za-z\d#@$!%*?&]{8,}$/;

    // Verifica se a senha está vazia
    if (senhaValue.trim() === '') {
        return true; // Permite o envio se a senha estiver vazia
    }

    if (!senhaRegex.test(senhaValue)) {
        // Código de validação da senha antiga
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'A senha antiga deve conter pelo menos 8 caracteres, uma letra maiúscula, uma letra minúscula e um caractere especial.',
        });
        return false;
    }
    return true;
}
form.addEventListener("submit", (e) => {
    if (!validateForm()) {
    }
});