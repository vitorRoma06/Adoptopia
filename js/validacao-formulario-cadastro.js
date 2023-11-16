const form = document.getElementById('form-cadastro');
const campos = document.querySelectorAll('.required');
const spans = document.querySelectorAll('.span-required');
const emailRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/;

form.addEventListener('submit', (event) => {
    var isValid = true;

    if (!nameValidate()) {
        isValid = false;
    }
    if (!emailValidate()) {
        isValid = false;
    }
    if (!senhaValidate()) {
        isValid = false;
    }
    if (!telefoneValidate()) {
        isValid = false;
    }
    if (!dataNascimentoValidate()) {
        isValid = false;
    }

    if (!isValid) {
        event.preventDefault();
    }
});


function setError(index) {
    campos[index].style.border = '2px solid #e63636';
    spans[index].style.display = 'block';
}

function removeError(index) {

    campos[index].style.border = '2px solid #71d344';
    spans[index].style.display = 'none';
}

function nameValidate() {
    if (campos[0].value.length < 3) {
        setError(0);
        return false;
    } else {
        removeError(0);
        return true;
    }
}

function emailValidate() {
    if (!emailRegex.test(campos[1].value)) {
        setError(1);
        return false;
    } else {
        removeError(1);
        return true;
    }
}

function senhaValidate() {
    if (campos[2].value.length < 16) {
        setError(2);
        return false;
    } else {
        removeError(2);
        return true;
    }
}

function telefoneValidate() {
    var valorNumerico = campos[3].value.replace(/\D/g, '');
    if (valorNumerico.length < 11) {
        setError(3);
        return false;
    } else {
        removeError(3);
        return true;
    }
}


function dataNascimentoValidate() {
    var dataNascimento = $("#dataNascimento").val();
    if (!dataNascimento || dataNascimento.length < 10) {
        setError(4);
        return false;
    }
    var partesData = dataNascimento.split("/");
    var data = new Date(partesData[2], partesData[1] - 1, partesData[0]);
    var idade = calcularIdade(data);

    if (idade < 13 || idade > 100) {
        setError(4);
        return false;
    } else {
        removeError(4);
        return true;
    }
}



$(document).ready(function () {
    $('.cidade').select2();
    $('#dataNascimento').mask('00/00/0000');
    $('#telefone').mask('(00) 00000-0000');

});

function calcularIdade(dataNascimento) {
    var dataAtual = new Date();
    var idade = dataAtual.getFullYear() - dataNascimento.getFullYear();
    var m = dataAtual.getMonth() - dataNascimento.getMonth();

    if (m < 0 || (m === 0 && dataAtual.getDate() < dataNascimento.getDate())) {
        idade--;
    }

    return idade;
}


$(window).resize(function () {
    $('.cidade').each(function () {
        $(this)
            .select2('destroy')
            .select2({
                width: 'resolve'
            });
    });
});




