$(document).ready(function() {

    // Esconde os botões edit e delete
    $('#btn-submit-edit').hide();
    $('#btn-delete').hide();
    // exibir mensagem depois da pagina carregada
    Message()

    $('input[name="customCheckBoxname"]').on('change', function() {
                if (this.checked) {
                    // Desmarque todos os outros checkboxes
                    $('input[name="customCheckBoxname"]').not(this).prop('checked', false);
                    // Exiba o valor do checkbox selecionado
                    var id = $(this).val()
                    var url = `http://localhost:8000/api/ersistemas/${id}`
                    GETANDDELETE_AJAX(url,"GET")
                    $('#name').val(id);
                    $('#btn-submit').hide();
                    $('#btn-submit-edit').show();
                    $('#btn-delete').show();
                    console.log('Valor do checkbox selecionado:', id,url);
                }
            });
});

$("#btn-submit").on("click",function(e) {
    e.preventDefault();
    var id = $('#id').val()
    var url = `http://localhost:8000/api/ersistemas/create`
    dataForm = {
        name: $('#name').val(),
        whatsapp: $('#whatsapp').val(),
        telefone: $('#telefone').val(),
        cpf: $('#cpf').val(),
        cep: $('#cep').val(),
        opcao: $('#opcao').val()
    }
    POSTANDPUT_AJAX(url,"POST",dataForm)
})

$("#btn-submit-edit").on("click",function(e) {
    e.preventDefault();
    var id = $('#id').val()
    var url = `http://localhost:8000/api/ersistemas/update/${id}`
    dataForm = {
        name: $('#name').val(),
        whatsapp: $('#whatsapp').val(),
        telefone: $('#telefone').val(),
        cpf: $('#cpf').val(),
        cep: $('#cep').val(),
        opcao: $('#opcao').val()
    }
    POSTANDPUT_AJAX(url,"PUT",dataForm)
})

$("#btn-delete").on("click",function(e) {
    e.preventDefault();
    var id = $('#id').val()
    var url = `http://localhost:8000/api/ersistemas/delete/${id}`
    GETANDDELETE_AJAX(url,"DELETE")
})

$("#dark-mode-element").on("click",function(e){
    e.preventDefault();
    console.log(true)
     if(this.checked) {
        $('.mode').attr('id', 'dark-mode');
    }
})

function Message() {
    var msg = localStorage.getItem("message");
    if(msg != "") {
        //toastr.success(msg);
        //storage.clear();
    }
}
function POSTANDPUT_AJAX(url,type,data){
    // Enviando os dados via AJAX
    console.log(data)
    $.ajax({
        type: type,
        url: url,
        data: JSON.stringify(data),
        contentType: 'application/json',
        success: function(response) {
            alert('true')
        },
        error: function(xhr, status, error) {
            console.log(error,status)
        }
    });
}

function GETANDDELETE_AJAX(url,type) {
    $.ajax({
        url: url,
        type: type,
        success: function(item) {
            if(type == "GET") {
                console.log(item)
                $('#id').val(item.id);
                $('#name').val(item.name);
                $('#whatsapp').val(item.phone);
                $('#telefone').val(item.phone2);
                $('#cpf').val(item.cpf);
                $('#cep').val(item.cep);
                $('#opcao').val(item.opcao);
            } else {
                //storage.setItem("message", "Deletado com sucesso");
                window.location.reload();
            }
        }
    });
};

