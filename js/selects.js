$(document).ready(function () {
    function select2WithLanguage(selector) {
        $(selector).select2({
            language: {
                noResults: function () {
                    return "Nenhum resultado encontrado";
                }
            }
        });
    }


    select2WithLanguage('.cidade');
    select2WithLanguage('.tipo-animal');
    select2WithLanguage('.porte');
    select2WithLanguage('.vacinado');
    select2WithLanguage('.castrado');
    select2WithLanguage('.sexo');
});
