$(document).ready(function() {

    // Esconde os botões edit e delete
    $('#btn-submit-edit').hide();
    $('#btn-delete').hide();

    // ESCONDENDO BUTTON DARKMODE ON
    $(".fa-toggle-on").hide();
    // exibir mensagem depois da pagina carregada

    // AÇÃO PARA O BOTÃO DE CHECKBOX
    $('input[name="customCheckBoxname"]').on('change', function() {
        if (this.checked) {
            // Desmarque todos os outros checkboxes
            $('input[name="customCheckBoxname"]').not(this).prop('checked', false);
            // Exiba o valor do checkbox selecionado
            var id = $(this).val()
            var url = `http://localhost:8000/api/ersistemas/${id}`
            GETANDDELETE_AJAX(url, "GET")
            $('#name').val(id);
            $('#btn-submit').hide();
            $('#btn-submit-edit').show();
            $('#btn-delete').show();
        }
    });
});

// AÇÃO PARA BOTÕES CRIAR,EDITA E EXCLUIR

$("#btn-submit").on("click", function(e) {
    e.preventDefault();
    var url = `http://localhost:8000/api/ersistemas/create`
    dataForm = {
        name: $('#name').val(),
        phone: $('#whatsapp').val(),
        phone2: $('#telefone').val(),
        cpf: $('#cpf').val(),
        cep: $('#cep').val(),
        opcao: $('#opcao').val()
    }
    POSTANDPUT_AJAX(url, "POST", dataForm)
})

$("#btn-submit-edit").on("click", function(e) {
    e.preventDefault();
    var id = $('#id').val()
    var url = `http://localhost:8000/api/ersistemas/update/${id}`
    dataForm = {
        name: $('#name').val(),
        phone: $('#whatsapp').val(),
        phone2: $('#telefone').val(),
        cpf: $('#cpf').val(),
        cep: $('#cep').val(),
        opcao: $('#opcao').val()
    }
    POSTANDPUT_AJAX(url, "PUT", dataForm)
})

$("#btn-delete").on("click", function(e) {
    e.preventDefault();
    var id = $('#id').val()
    var url = `http://localhost:8000/api/ersistemas/delete/${id}`
    GETANDDELETE_AJAX(url, "DELETE")
})

// DARKMODE

$("#darkmodebuttonoff").on("click", function(e) {
    e.preventDefault();
    $(".fa-toggle-on").show();
    $(".fa-toggle-off").hide();
    $('.mode').attr('id', 'dark-mode');
})

$("#darkmodebuttonon").on("click", function(e) {
    e.preventDefault();
    $(".fa-toggle-on").hide();
    $(".fa-toggle-off").show();
    $('.mode').removeAttr('id');
})

// MESSAGE TOAST

function Message(msg, type) {
    if (type == "success") {
        toastr.success(msg);
    } else if (type == "warning") { toastr.warning(msg); } else if (type == "danger") {
        toastr.danger(msg);
    }
}


// FUNÇÃO DE REQUISIÇÃO AJAX
function POSTANDPUT_AJAX(url, type, data) {
    // Enviando os dados via AJAX
    $.ajax({
        type: type,
        url: url,
        data: JSON.stringify(data),
        dataType: "json",
        contentType: 'application/json',
        success: function(response) {
            Message(response.data, "success")
            setTimeout(() => {
                window.location.reload();
            }, 4000);
        },
        error: function(xhr, status, error) {
            Message(error, "danger")
            setTimeout(() => {
                window.location.reload();
            }, 4000);
        }
    });
}

function GETANDDELETE_AJAX(url, type) {
    $.ajax({
        url: url,
        type: type,
        dataType: "json",
        contentType: 'application/json',
        success: function(item) {
            if (type == "GET") {
                console.log(item)
                $('#id').val(item.id);
                $('#name').val(item.name);
                $('#whatsapp').val(item.phone);
                $('#telefone').val(item.phone2);
                $('#cpf').val(item.cpf);
                $('#cep').val(item.cep);
                $('#opcao').append(`<option value="${item.opcao}">${item.opcao}</option>`);
                $('#opcao').val(item.opcao).change();
            } else {
                Message("Deletado com sucesso", "success")

                setTimeout(() => {
                    window.location.reload();
                }, 4000);
            }
        }
    });
};