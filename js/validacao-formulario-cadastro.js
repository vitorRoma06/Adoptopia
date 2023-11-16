document.querySelector('.form-register-principal').addEventListener('submit', function (e) {
    var password = document.querySelector('input[name="senha"]').value;
    if (password.length < 16) {
        e.preventDefault();
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'A senha deve conter pelo menos 16 caracteres.',
        });
        return false;
    }
});


$(document).ready(function () {
    $('.cidade').select2();
    $('#dataNascimento').mask('00/00/0000');
    $('#telefone').mask('(00) 0000-0000');
    $(".form-register-principal").submit(function (e) {
        var dataNascimento = $("#dataNascimento").val();
        var partesData = dataNascimento.split("/");
        var data = new Date(partesData[2], partesData[1] - 1, partesData[0]);
        var idade = calcularIdade(data);

        if (idade < 13 || idade > 100) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Desculpe, mas você deve ter entre 13 e 100 anos.',
            });
            e.preventDefault();
        }
    });
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
