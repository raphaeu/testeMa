<?php
include(ROOT_VIEW . '/site/layout/header.php');
?>
<div class="container">
    <h1>500</h1>
    <h4><span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span> Vixi! Ocorreu um erro inesperado no sistema! :(</h4>
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