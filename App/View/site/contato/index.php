<?php
include(ROOT_VIEW . '/site/layout/header.php');
?>
<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modalContato">
    Novo
</button>


<div class="alert" id="messageContato" role="alert" style="display: none"></div>
<table class="table" id="contatos-table"> 
    <caption>Relacao de contatos</caption> 
    <thead> 
        <tr> 
            <th>#</th> 
            <th>Nome</th> 
            <th>E-mail</th> 
            <th>Telefone</th> 
        </tr> 
    </thead> 

</table>

<!-- Modal -->
<div class="modal fade" id="modalContato" tabindex="-1" role="dialog" aria-labelledby="ModalLabel">
    <form method="POST" action="/contato" id="formContato">
        <input type="hidden" value="" name="id"  />
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="ModalLabel">Contato</h4>
                </div>
                <div class="modal-body">
                    <div class="alert" id="message" role="alert" style="display: none"></div>
                    <div class="form-group">
                        <label for="inputNome1">Nome</label>
                        <input type="text" name="nome" class="form-control" id="inputNome1" placeholder="Nome">
                    </div>
                    <div class="form-group">
                        <label for="inputEmail2">E-mail</label>
                        <input type="email" name="email" class="form-control" id="inputEmail2" placeholder="E-mail">
                    </div>
                    <div class="form-group">
                        <label for="inputTelefone1">Telefone</label>
                        <input type="text" name="telefone" class="form-control" id="inputTelefone1" placeholder="Telefone">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
            </div>
        </div>
    </form>
</div>

<?php
include(ROOT_VIEW . '/site/layout/footer.php');
?>

<script>
    $(document).ready(function () {




        $("#formContato").on('submit', function () {

            // Validando campos
            var type = $(this).find('[name=id]').val() == "" ? 'POST' : 'PUT';
            var self = this;
            // enviando dados via ajax
            $.ajax({
                url: $(this).attr('action'), // url where to submit the request
                type: type, // type of action POST || GET
                contentType: "application/json; charset=utf-8",
                dataType: "json",
                data: JSON.stringify(ConvertFormToJSON($(this))),
                encode: true,
                success: function (result) {
                    $('#messageContato').addClass('alert-success');
                    $('#messageContato').html(result.message);
                    $('#messageContato').show();
                    $('#modalContato').modal('toggle');
                    renderTableContacts();
                },
                error: function (xhr, resp, text) {
                    $(self).find('#message').removeClass('alert-success');
                    $(self).find('#message').addClass('alert-danger');
                    $(self).find('#message').html('<b>' + xhr.responseJSON.message + '</b></br>');
                    $.each(xhr.responseJSON.body, function (index, value) {
                        $(self).find('#message').append(value + '</br>');
                    });
                    $(self).find('#message').show();
                }
            })
            // cancelando o submit
            event.preventDefault();

        });


        $('body').on('click', '.editar-btn', function (e) {
            var id = $(this).data('id');
            $.ajax({
                url: '/contato/editar/' + id, // url where to submit the request
                type: 'GET', // type of action POST || GET
                contentType: "application/json; charset=utf-8",
                dataType: "json",
                encode: true,
                success: function (result) {
                    var contato = result.body;
                    $('#formContato [name=nome]').val(contato.nome);
                    $('#formContato [name=email]').val(contato.email);
                    $('#formContato [name=telefone]').val(contato.telefone);
                    $('#modalContato').modal('toggle');
                },
                error: function (xhr, resp, text) {

                }
            });
        });

        $('body').on('click', '.excluir-btn', function (e) {
            var id = $(this).data('id');
            if (confirm('Tem certeza que deseja excluir o contato?')) {
                $.ajax({
                    url: '/contato/' + id, // url where to submit the request
                    type: 'DELETE', // type of action POST || GET
                    contentType: "application/json; charset=utf-8",
                    dataType: "json",
                    encode: true,
                    success: function (result) {
                        $('#messageContato').addClass('alert-success');
                        $('#messageContato').html(result.message);
                        $('#messageContato').show();
                    },
                    error: function (xhr, resp, text) {
                        $(self).find('#message').removeClass('alert-success');
                        $(self).find('#message').addClass('alert-danger');
                        $(self).find('#message').html('<b>' + xhr.responseJSON.message + '</b></br>');
                        $.each(xhr.responseJSON.body, function (index, value) {
                            $(self).find('#message').append(value + '</br>');
                        });
                        $(self).find('#message').show();
                    }
                });
            }
        });

        function renderTableContacts()
        {
            $('#contatos-table tbody').html('');
            $.ajax({
                url: '/contato/listar/<?= $userId ?>', // url where to submit the request
                type: 'GET', // type of action POST || GET
                contentType: "application/json; charset=utf-8",
                dataType: "json",
                encode: true,
                success: function (result) {

                    var trHTML = '';
                    $.each(result.body, function (index, value) {
                        trHTML +=
                                '<tr><td scope="row">' + value.id +
                                '</td><td>' + value.nome +
                                '</td><td>' + value.email +
                                '</td><td>' + value.telefone +
                                '</td><td><button class="btn btn-success editar-btn" data-id="' + value.id + '">Editar</button>' +
                                '<button class="btn btn-danger excluir-btn" data-id="' + value.id + '">Excluir</button></td>' +
                                '</tr>';
                    });
                    $('#contatos-table').append(trHTML);

                },
                error: function (xhr, resp, text) {

                }
            });
        }

        renderTableContacts();


    });




</script>

