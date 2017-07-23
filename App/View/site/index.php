<?php
include(ROOT_VIEW . '/site/layout/header.php');
?>
<!-- Main component for a primary marketing message or call to action -->
<div class="jumbotron">
    <h1>Navbar example</h1>
    <p>This example is a quick exercise to illustrate how the default, static and fixed to top navbar work. It includes the responsive CSS and HTML, so it also adapts to your viewport and device.</p>
    <p>To see the difference between static and fixed top navbars, just scroll.</p>
    <p>
        <a class="btn btn-lg btn-primary" href="../../components/#navbar" role="button">View navbar docs &raquo;</a>
    </p>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Login</h3>
            </div>
            <div class="panel-body">
                <form method="POST" action="/login" id="formLogin">
                    <div class="alert" id="message" role="alert" style="display: none">
                    
                </div>
                    <div class="form-group">
                        <label for="inputEmail1">E-mail</label>
                        <input type="email" name="email" class="form-control" id="inputEmail1" placeholder="E-mail">
                    </div>
                    <div class="form-group">
                        <label for="inputPassword1">Senha</label>
                        <input type="password" name="senha" class="form-control" id="inputPassword1" placeholder="Senha">
                    </div>
                    <button type="submit" class="btn btn-default">Entrar</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Registrar</h3>
            </div>
            <div class="panel-body">                
                
                <form method="POST" action="/registrar" id="formRegritrar">
                    <div class="alert" id="message" role="alert" style="display: none">
                    
                </div>
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
                    <div class="form-group">
                        <label for="inputSenha2">Senha</label>
                        <input type="password"  name="senha" class="form-control" id="inputSenha2" placeholder="Senha">
                    </div>
                    <div class="form-group">
                        <label for="inputSenhaConfirma1">Confirma</label>
                        <input type="password"  name="senhaConfirma" class="form-control" id="inputSenhaConfirma1" placeholder="Confirmar senha">
                    </div>
                    <button type="submit" class="btn btn-default">Registrar</button>
                </form>
            </div>
        </div>
    </div>
</div>


<?php
include(ROOT_VIEW . '/site/layout/footer.php');
?>
<script>
    $(document).ready(function () {
        // click on button submit
        $("#formRegritrar").on('submit', function () {

            // Validando campos

            var self = this;
            // enviando dados via ajax
            $.ajax({
                url: $(this).attr('action'), // url where to submit the request
                type: $(this).attr('method'), // type of action POST || GET
                contentType: "application/json; charset=utf-8",
                dataType: "json",
                data: JSON.stringify(ConvertFormToJSON($(this))),
                encode: true,
                success: function (result) {
                    $(self).find('#message').removeClass('alert-danger');
                    $(self).find('#message').addClass('alert-success');
                    $(self).find('#message').html(result.message);
                    $(self).find('#message').show();

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
        
        // click on button submit
        $("#formLogin").on('submit', function () {

            // Validando campos

            var self = this;
            // enviando dados via ajax
            $.ajax({
                url: $(this).attr('action'), // url where to submit the request
                type: $(this).attr('method'), // type of action POST || GET
                contentType: "application/json; charset=utf-8",
                dataType: "json",
                data: JSON.stringify(ConvertFormToJSON($(this))),
                encode: true,
                success: function (result) {
                   window.location.replace("/contato");

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
    });


    function ConvertFormToJSON(form) {
        var array = jQuery(form).serializeArray();
        var json = {};

        jQuery.each(array, function () {
            json[this.name] = this.value || '';
        });
        return json;
    }
</script>
