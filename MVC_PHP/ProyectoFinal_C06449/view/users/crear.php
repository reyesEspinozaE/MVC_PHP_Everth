<?php
require 'view/header.php';
require 'view/menu.php';
?>

<div class="container-fluid" id="contenedorprincipal">
    <h1><?php echo $this->mensaje; ?></h1>

    <form class="form-control" action="<?php echo constant("URL"); ?>users/insertaruser" method="POST">
        <?php
        $ocultarId = true; // Variable para ocultar el campo "id"
        require 'form.php';
        ?>
    </form>
</div>

<?php
require 'view/footer.php';
?>