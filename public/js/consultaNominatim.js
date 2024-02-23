// https://nominatim.openstreetmap.org/search.php?street=1775+Floriano+Peixoto&city=Santa+Maria&state=RS&country=Brasil&format=jsonv2
// https://nominatim.openstreetmap.org/search.php?street=1775Rua+Marechal+Floriano+Peixoto&city=Santa+Maria&state=RS&country=Brasil&format=jsonv2&limit=1

function limpa_formulario() {

    // Limpa valores do formulário de cep.
    $("#latitude").val("");
    $("#longitude").val("");
}

//Quando o campo cep perde o foco.
$("#numero").blur(function() {
    
    // Variáveis
    var n = $(this).val();
    var street = $("#logradouro").val().replace(/\s+/g, '+');
    var city = $("#cidade").val().replace(/\s+/g, '+');
    var state = $("#uf").val();

    //Verifica se campo cep possui valor informado.
    if ((street != "") &&  (n != "")) {

        //Preenche os campos com "..." enquanto consulta API.
        $("#latitude").val("...");
        $("#longitude").val("...");

        $.getJSON('https://nominatim.openstreetmap.org/search.php?street=' + n + '+' + street + '&city=' + city + '&state=' + state + '&country=Brasil&format=jsonv2&limit=1', function(dados) {

            if (dados) {

                // Atualiza os campos com os valores da consulta.
                $("#latitude").val(dados[0].lat);
                $("#longitude").val(dados[0].lon);

            } else {

                // Valor não encontrado
                limpa_formulario();
                alert("Local não encontrado.");
            }
        });
    }

    else {
        //cep sem valor, limpa formulário.
        limpa_formulario();
    }
});