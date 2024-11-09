
$(document).ready(function() {
    $('#adicionar-categoria').on('click', function() {
        var categoria = $('.categoria-form').val();
        var categoriaTex = $('.categoria-form option:selected').text();

        var subcategoria = $('.subcategoria-form').val();
        var subcategoriaTex = $('.subcategoria-form option:selected').text();

        var categoriaSegmento = $('.segmento-form').val();
        var categoriaSegmentoTex = $('.segmento-form option:selected').text();

        if ( categoriaTex == "Selecione" || subcategoriaTex == "Selecione"  || categoriaSegmentoTex == "Selecione" ) {
            return false
        }

        $('.table').css('display', '')

        tr_table = '<tr><td><input type="hidden" name="categoria[]" value="' + categoria + '">' + categoriaTex + '</td>';
        tr_table += '<td><input type="hidden" name="subcategoria[]" value="' + subcategoria + '">' + subcategoriaTex + '</td>';
        tr_table += '<td><input type="hidden" name="segmento[]" value="' + categoriaSegmento + '">' + categoriaSegmentoTex + '</td>';
        tr_table += '<td id="remov"><button type="button" id="excluir" class="btn btn-danger"><i class="ion-trash-a"></i></button></td></tr>';
        $('.table tbody').append(tr_table);
    })

    //remove os itens da tabela de categoria
    $('.table tbody').on('click', ".btn-danger", function () {
        $(this).parent().parent().remove()  //remove o item em que ouver o click do botão
    });
})
