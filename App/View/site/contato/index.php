<?php
include(ROOT_VIEW . '/site/layout/header.php');
?>

<div class="container">
    <div class="row">
        <div class="col-xs-6">
            <h2>Contatos</h2>
        </div>
        <div class="col-xs-6">
            <button class="btn btn-primary pull-right h2" data-toggle="modal" data-target="#modalContato">
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Novo Contato
            </button>     
        </div>
    </div>
    <div class="alert " id="messageContato" role="alert" style="display: none"></div>
    <?php include(ROOT_VIEW . '/site/contato/list.php') ?>

    <?php include(ROOT_VIEW . '/site/contato/form.php') ?>

</div>
<?php
include(ROOT_VIEW . '/site/layout/footer.php');
?>

<script>
    $(document).ready(function () {


        $('#modalContato').on('hidden.bs.modal', function () {
            $('#formContato [name=id]').val('');
            $("#formContato")[0].reset();
        });

        $('#modalContato').on('shown.bs.modal', function () {
            $('#formContato [name=nome]').focus();
        });

        $("#formContato").on('submit', function () {
            var idContato = $(this).find('[name=id]').val();
            // Validando campos
            var type = idContato == "" ? 'POST' : 'PUT';
            var self = this;
            // enviando dados via ajax
            $.ajax({
                url: $(this).attr('action') + '/' + idContato, // url where to submit the request
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
                url: '/contato/' + id, // url where to submit the request
                type: 'GET', // type of action POST || GET
                contentType: "application/json; charset=utf-8",
                dataType: "json",
                encode: true,
                success: function (result) {
                    var contato = result.body;
                    $('#formContato [name=id]').val(contato.id);
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
            bootbox.confirm({
                message: "Tem certeza que deseja excluir o contato?",
                buttons: {
                    confirm: {
                        label: 'Yes',
                        className: 'btn-success'
                    },
                    cancel: {
                        label: 'No',
                        className: 'btn-danger'
                    }
                },
                callback: function (result) {
                    if (result){
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
                      });
                      
                    }
                }
            });            
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
                                '<tr>' +
                                '<td>' + value.nome +
                                '</td><td>' + value.email +
                                '</td><td>' + value.telefone +
                                '</td><td><div class="pull-right"><button class="btn btn-success btn-xs editar-btn" data-id="' + value.id + '"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>  Editar</button>' +
                                '&nbsp;<button class="btn btn-danger btn-xs excluir-btn" data-id="' + value.id + '"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Excluir</button></div></td>' +
                                '</tr>';
                    });
                    trHTML = trHTML ? trHTML : '<tr><td colspan="4">Nenhum contato cadastrado.</td></tr>';
                    $('#contatos-table').append(trHTML);

                },
                error: function (xhr, resp, text) {

                }
            });
        }

    

        renderTableContacts();
    });
    




</script>

