<div style="max-width:50%; margin:auto; padding:auto;" class="">


    <div class="">
        <div class="mb-3" <?php echo isset($this->datos->id) ? "" : "hidden"; ?>>
            <label for="" class="form-label">Id</label>
            <!-- para pasar el valor, y la segunda validación para que solo se pueda leer -->
            <input value="<?php echo isset($this->datos->id) ? $this->datos->id : ""; ?>" type="text" name="id" id="id" <?php echo isset($this->datos->id) ? "readonly" : ""; ?> style="background-color: rgb(184, 184, 184);" class="form-control" placeholder="ingresar nombre del curso" aria-describedby="helpId">

        </div>

        <div class="mb-3">
            <label for="" class="form-label">Cédula</label>
            <input type="text" value="<?php echo isset($this->datos->cedula) ? $this->datos->cedula : ""; ?>" type="text" name="cedula" id="cedula" required class="form-control" placeholder="Cédula" aria-describedby="helpId">

        </div>

        <div class="mb-3">
            <label for="" class="form-label">Correo</label>
            <input type="email" name="correoelectronico" id="correoelectronico" value="<?php echo isset($this->datos->correoelectronico) ? $this->datos->correoelectronico : ""; ?>" required class="form-control" placeholder="Correo" aria-describedby="helpId">

        </div>
        <div class="mb-3">
            <label for="" class="form-label">Teléfono</label>
            <input type="number" name="telefono" id="telefono" value="<?php echo isset($this->datos->telefono) ? $this->datos->telefono : ""; ?>" required class="form-control" placeholder="Teléfono" aria-describedby="helpId">

        </div>
        <div class="mb-3">
            <label for="" class="form-label">Teléfono celular</label>
            <input type="number" name="telefonocelular" id="telefonocelular" value="<?php echo isset($this->datos->telefonocelular) ? $this->datos->telefonocelular : ""; ?>" required class="form-control" placeholder="Teléfono celula" aria-describedby="helpId">

        </div>
        <div class="mb-3">
            <label for="" class="form-label">Fecha nacimiento</label>
            <input type="date" name="fechanacimiento" id="fechanacimiento" value="<?php echo isset($this->datos->fechanacimiento) ? $this->datos->fechanacimiento : ""; ?>" required class="form-control" placeholder="Fecha nacimiento" aria-describedby="helpId">

        </div>
        <div class="mb-3">
            <label for="" class="form-label">Sexo</label>
            <input type="text" name="sexo" id="sexo" value="<?php echo isset($this->datos->sexo) ? $this->datos->sexo : ""; ?>" required class="form-control" placeholder="Sexo" aria-describedby="helpId">

        </div>
        <div class="mb-3">
            <label for="" class="form-label">Dirección</label>
            <input type="text" name="direccion" id="direccion" value="<?php echo isset($this->datos->direccion) ? $this->datos->direccion : ""; ?>" required class="form-control" placeholder="Dirección" aria-describedby="helpId">

        </div>

        <div class="mb-3">
            <label for="" class="form-label">Nombre</label>
            <input type="text" name="nombre" id="nombre" value="<?php echo isset($this->datos->nombre) ? $this->datos->nombre : ""; ?>" required class="form-control" placeholder="Nombre" aria-describedby="helpId">

        </div>

        <div class="mb-3">
            <label for="" class="form-label">Apellido paterno</label>
            <input type="text" name="apellidopaterno" id="apellidopaterno" value="<?php echo isset($this->datos->apellidopaterno) ? $this->datos->apellidopaterno : ""; ?>" required class="form-control" placeholder="Apellido paterno" aria-describedby="helpId">

        </div>
        <div class="mb-3">
            <label for="" class="form-label">Apellido materno</label>
            <input type="text" name="apellidomaterno" id="apellidomaterno" value="<?php echo isset($this->datos->apellidomaterno) ? $this->datos->apellidomaterno : ""; ?>" required class="form-control" placeholder="Apellido materno" aria-describedby="helpId">
            <small id="helpId" class="text-muted">Campo requerido</small>
        </div>

        <div class="mb-3">
            <label for="" class="form-label">Grupo </label>
            <select class="form-select form-select-md" value="" name="idCarreras" id="idCarreras">
                <option value=""> <?php echo isset($this->datos->idCarreras) ? $this->datos->idCarreras
                                        : "Seleccione un grupo"; ?></option>

                <?php
                foreach ($this->grupos as $row) {
                    $grupos = new classGrupos();
                    $grupos = $row;
                    var_dump($grupos->nombre);

                    echo '<option style="color:black;" value="' . $grupos->id . '"> 
                           ' . $grupos->nombre . '
                            </option>';
                }
                ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Nacionalidad</label>
            <input type="text" name="nacionalidad" id="nacionalidad" value="<?php echo isset($this->datos->nacionalidad) ? $this->datos->nacionalidad : ""; ?>" required class="form-control" placeholder="Nacionalidad" aria-describedby="helpId">

        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Salvar</button>
            <a type="reset" href="<?php echo constant('URL'); ?>profesores" class="btn btn-secondary">Volver</a>
        </div>
    </div>
</div>