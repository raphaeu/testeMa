<?php
include(ROOT_VIEW . '/site/layout/header.php');
?>
<?php if (!\Core\Auth::getUserSession()) { ?>

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <h1>Igenda!</h1>
                    <p>This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and three supporting pieces of content. Use it as a starting point to create something more unique.</p>
                    <p><a class="btn btn-primary btn-lg" href="/sobre" role="button">Saiba Mais &raquo;</a></p>
                </div>
                <div class="col-md-5">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Registre-se</h3>
                        </div>
                        <div class="panel-body">                

                            <form method="POST" action="/registrar" id="formRegistrar">
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
                                    <label for="inputSenha2">Senha</label>
                                    <input type="password"  name="senha" class="form-control" id="inputSenha2" placeholder="Senha">
                                </div>
                                <div class="form-group">
                                    <label for="inputSenhaConfirma1">Confirma</label>
                                    <input type="password"  name="senhaConfirma" class="form-control" id="inputSenhaConfirma1" placeholder="Confirmar senha">
                                </div>
                                <button type="submit" class="btn btn-primary pull-right"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Registrar</button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

<?php } ?>

<div class="container">

    <!-- Example row of columns -->
    <div class="row">
        <div class="col-md-4">
            <h2><span class="glyphicon glyphicon-flash " aria-hidden="true"></span> Rapido</h2>
            <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
        </div>
        <div class="col-md-4">
            <h2><span class="glyphicon glyphicon-sunglasses " aria-hidden="true"></span> Facil</h2>
            <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
        </div>
        <div class="col-md-4">
            <h2><span class="glyphicon glyphicon-piggy-bank" aria-hidden="true"></span> Gratuito</h2>
            <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
        </div>
    </div>



</div>
<?php
include(ROOT_VIEW . '/site/layout/footer.php');
?>
<script>
    $(document).ready(function () {
        // click on button submit
        $("#formRegistrar").on('submit', function () {

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
                    $(self)[0].reset();
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
                    $(self)[0].reset();
                    window.location.replace("/contato");
                },
                error: function (xhr, resp, text) {
                    alert(xhr.responseJSON.message);
                }
            })

            // cancelando o submit
            event.preventDefault();

        });
    });

</script>
