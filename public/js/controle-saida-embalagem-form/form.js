// Evento para carregar as rotas do setor selecionado
$(document).on('change', '#setor_id', function (event) {
    // Recuperando o valor da data
    var idSetor   = $('#setor_id').val();

    // Requisição ajax
    jQuery.ajax({
        type: 'GET',
        url: laroute.route('rota.searchBySetor'),
        data: {'setor' : idSetor},
        datatype: 'json'
    }).done(function (jsonResponse) {
        if (jsonResponse.success) {
            // Html de retonro
            var html = '<option value="">Selecione uma rota</option>';

            // Recuperando as rotas
            var rotas = jsonResponse.data;

            // Percorrendo as rotas
            $.each(rotas, function(index, value) {
                html += '<option value="' + value.id + '">' + value.nome + '</option>';
            });

            // Carregando o html no select
            $('#rota_id').html(html);
        } else {
            // Mensagem de retorno caso ocorra algum problema
            bootbox.alert(jsonResponse.msg);
        }
    });
});

// Evento para carregar as escolas do rota selecionada
$(document).on('change', '#rota_id', function (event) {
    // Recuperando o valor da data
    var idRota   = $('#rota_id').val();

    // Requisição ajax
    jQuery.ajax({
        type: 'GET',
        url: laroute.route('escola.searchByRota'),
        data: {'rota' : idRota},
        datatype: 'json'
    }).done(function (jsonResponse) {
        if (jsonResponse.success) {
            // Html de retonro
            var html = '<option value="">Selecione uma escola</option>';

            // Recuperando as escolas
            var escolas = jsonResponse.data;

            // Percorrendo as escolas
            $.each(escolas, function(index, value) {
                html += '<option value="' + value.id + '">' + value.nome + '</option>';
            });

            // Carregando o html no select
            $('#escolas_id').html(html);
        } else {
            // Mensagem de retorno caso ocorra algum problema
            bootbox.alert(jsonResponse.msg);
        }
    });
});