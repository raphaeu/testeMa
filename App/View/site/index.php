<?php
include(ROOT_VIEW.'/site/layout/header.php');
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
                <form method="POST" action="/registrar/123">
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
                <div class="alert alert-danger" role="alert">
                    <strong>Oh snap!</strong> Change a few things up and try submitting again.
                </div>
                <div class="alert alert-success" role="alert">
                    <strong>Well done!</strong> You successfully read this important alert message.
                </div>
                <form method="POST" action="/registrar" id="formRegritrar">
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
include(ROOT_VIEW.'/site/layout/footer.php');
?>
<script>
    $(document).ready(function(){
        // click on button submit
        $("#formRegritrar").on('submit', function(){

            // Validando campos


            // enviando dados via ajax
            $.ajax({
                url: $(this).attr('action'), // url where to submit the request
                type : $(this).attr('method'), // type of action POST || GET
                contentType: "application/json; charset=utf-8",
                dataType: "json",
                data : JSON.stringify(ConvertFormToJSON($(this))),
                encode : true,
                success : function(result) {
                    // you can see the result from the console
                    // tab of the developer tools
                    console.log(result);
                },
                error: function(xhr, resp, text) {
                    console.log(xhr, resp, text);
                }
            })

            // cancelando o submit
            event.preventDefault();

        });
    });


    function ConvertFormToJSON(form){
        var array = jQuery(form).serializeArray();
        var json = {};

        jQuery.each(array, function() {
            json[this.name] = this.value || '';
        });
        return json;
    }
</script>
