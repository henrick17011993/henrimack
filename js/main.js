$(function() {  
    $("#btnButton").on("click", function() {
        enviar();
    });

    $("#btnAtualizar").on("click", function () {
        const id = $(this).attr("data-id");
        AtualizaDados(id);
    });


    $("[id^=btnD_]").on ("click", function () {
        if(confirm("tem certeza ? ")){
            const id = $(this).attr("data-id");
            deletaDados(id);
        }
    })
});

function enviar() {
    dados = {
        "tipo" :  $("#Tipo").val(),
        "modelos":  $("#Modelos").val(),
        "cor":  $("#Cor").val(),
        "valor":  $("#Valor").val(),
    }

    $.ajax({
        type: "POST",
        url: "php/funcoes.php?funcao=insere",
        data: dados,
            success: function (ret) {
                if(!ret){
                    location.href = "index.php"
                } else {
                    alert(ret);
                }           
        }
    });
}

function deletaDados(id){
    $.ajax({
        type: "POST",
        url: "php/funcoes.php?funcao=Deleta",
        data: {"id": id},
        success: function (ret) {
            if (!ret){
                $("#btnD_" + id).closest("tr").remove();
            } else {
                alert(ret)
            }        
        }
    });
}

function AtualizaDados(id){
    dados = {
        "id": id,
        "tipo" :  $("#Tipo").val(),
        "modelos": $("#Modelos").val(),
        "cor":  $("#Cor").val(),
        "valor":   $("#Valor").val(),
    }
    $.ajax({
        type: "POST",
        url: "php/funcoes.php?funcao=editar",
        data: dados,
        success: function (ret) {
            if (!ret){
                location.href = "index.php"
            } else {
                alert(ret)
            }          
        }
    });
}