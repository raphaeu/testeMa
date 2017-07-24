<?php
include(ROOT_VIEW . '/site/layout/header.php');
?>
<div class="container">

    <h1>
        Erro de desenvolvimento
    </h1>
    <?php if (DEBUG == 1) { ?>
        <h4>Debug</h4>
        <?php echo $e->getMessage() ?>; 

    <?php } ?>
</div>
<?php
include(ROOT_VIEW . '/site/layout/footer.php');
?>