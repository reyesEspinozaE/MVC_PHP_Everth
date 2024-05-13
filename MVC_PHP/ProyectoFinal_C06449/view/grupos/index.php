<?php
require 'view/header.php';
require 'view/menu.php';
?>
<div class="container-fluid" id="contendorprincipal">
    <h1><?php echo $this->mensaje; ?></h1>

    <?php echo $this->mensajeResultado ?>
    <div class="table-responsive">
        <table class="table table-striped
        table-hover	
        table-borderless
        table-secondary
        align-middle">
            <thead class="table-light">
                <caption><?php echo $this->mensaje; ?></caption>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                <?php
                foreach ($this->datos as $row) {

                    $datos = new classGrupos();
                    $datos = $row;
                    # code..
                    echo ' <tr class="table-secondary" >
                                    <td scope="row">' . $datos->id . '</td>
                                    <td>' . $datos->nombre . '</td>                                  
                                    <td>
                                        <a name="eliminar" id="eliminar" class="btn btn-danger" href="' . constant('URL') . 'grupos/eliminargrupo/' . $datos->id . '" role="button">Eliminar</a>
                                        ||
                                        <a name="editar" id="editar" class="btn btn-primary" href="' . constant('URL') . 'grupos/verGrupos/' . $datos->id . '" role="button">Editar</a>
                                    </td>
                                </tr>';
                }
                ?>
            </tbody>
            <tfoot>

            </tfoot>
        </table>
    </div>
</div>
<?php
require 'view/footer.php';
?>