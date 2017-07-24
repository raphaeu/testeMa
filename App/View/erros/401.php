<?php
include(ROOT_VIEW . '/site/layout/header.php');
?>
<div class="container">
    <h1>401</h1>
    <h4><span class="glyphicon glyphicon-lock" aria-hidden="true"></span> Ops! Voce nao tem permissao de acesso, talvez precise fazer o login!</h4>
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