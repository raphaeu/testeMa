<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?=(\Core\Auth::getUserSession())?'/contato':'/'?>">Igenda</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <?php if (\Core\Auth::getUserSession()) { ?>
                <ul class="nav navbar-nav navbar-right">
                  <li><a href="/contato">Contatos</a></li>
                  <li><a href="/logout">Sair</a></li>
                </ul>
            <?php } else { ?>
                <form method="POST" action="/login" id="formLogin" class="navbar-form navbar-right">
                    <div class="form-group">
                        <input type="email" name="email" class="form-control" id="inputEmail1" placeholder="E-mail">
                    </div>
                    <div class="form-group">
                        <input type="password" name="senha" class="form-control" id="inputPassword1" placeholder="Senha">
                    </div>
                    <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Entrar</button>
                </form>
            <?php } ?>
        </div>
    </div>
</nav>

