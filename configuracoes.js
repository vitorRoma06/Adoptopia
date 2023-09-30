document.addEventListener("DOMContentLoaded", function() {
    const controleDeslizanteTamanhoFonte = document.getElementById("controle-deslizante-tamanho-fonte");
    const valorTamanhoFonte = document.getElementById("valor-tamanho-fonte");

    let estaArrastando = false;

    controleDeslizanteTamanhoFonte.addEventListener("mousedown", function(evento) {
        estaArrastando = true;
        atualizarTamanhoFonte(evento.clientX);
    });

    document.addEventListener("mouseup", function() {
        estaArrastando = false;
    });

    document.addEventListener("mousemove", function(evento) {
        if (estaArrastando) {
            atualizarTamanhoFonte(evento.clientX);
        }
    });

    function atualizarTamanhoFonte(x) {
        const retanguloControleDeslizante = controleDeslizanteTamanhoFonte.getBoundingClientRect();
        const offsetX = x - retanguloControleDeslizante.left;
        const porcentagem = (offsetX / retanguloControleDeslizante.width) * 100;
        const novoTamanho = Math.round((porcentagem / 100) * 50 + 10); // Faixa de tamanho da fonte de 10px a 60px
        document.body.style.fontSize = novoTamanho + "px";
        valorTamanhoFonte.innerText = novoTamanho;
    }
});
