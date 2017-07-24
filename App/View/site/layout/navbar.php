<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"><B>Igenda</b></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Home</a></li>
                <li><a href="#login">Login</a></li>
                <li><a href="#registrar">Registrar</a></li>
            </ul>
            <?php if (\Core\Session::getUserSession()) { ?>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="/logout">Sair</a></li>
            </ul>
            <?php } ?>
        </div>
        
    </div>
</nav>
