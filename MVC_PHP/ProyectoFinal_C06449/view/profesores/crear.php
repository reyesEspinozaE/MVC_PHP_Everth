<?php
require 'view/header.php';
require 'view/menu.php';

?>

<div class="container-fluid row" id="contenedorprincipal">
    <h1><?php echo $this->mensaje; ?></h1>
    <form class="form-control" action="<?php echo constant('URL'); ?>profesores/insertarProfesor" method="POST">
        <?php require 'form.php'; ?>
    </form>
</div>
<?php
require 'view/footer.php';