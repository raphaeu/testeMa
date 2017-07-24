<?php
include(ROOT_VIEW . '/site/layout/header.php');
?>
<div class="container">
    <h1>403</h1>
    <h4><span class="glyphicon glyphicon-thumbs-down" aria-hidden="true"></span>Ops!  Você não tem acesso a esse recurso!</h4>
    <a href="/">Pagina princial</a>
    <?php if (DEBUG == 1) { ?>
        <hr>
        <h4>Debug</h4>
        <?php echo $e->getMessage() ?>; 
    <?php } ?>
</div>
<?php
include(ROOT_VIEW . '/site/layout/footer.php');
?>