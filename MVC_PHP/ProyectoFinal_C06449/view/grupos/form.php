<div class="mb-3" <?php echo isset($this->datos->id)? "" :"hidden";?>>
  <label for=""  class="form-label">Id</label>

  <input type="text" value="<?php echo isset($this->datos->id)? $this->datos->id :"";?>"
    class="form-control" name="id" id="id" aria-describedby="helpId" placeholder="">
  <small id="helpId" class="form-text text-muted"></small>
</div>
<div class="mb-3">
  <label for="" class="form-label">Nombre</label>
  <input type="text" value="<?php echo isset($this->datos->nombre)? $this->datos->nombre :"";?>"
    class="form-control" name="nombre" id="nombre" aria-describedby="helpId" placeholder="Ingrese el nombre del grupo">
  <small id="helpId" class="form-text text-muted">Ingrese el nombre del grupo</small>
</div>
<div class="mb-3">
  <button type="reset" class="btn btn-danger">Reset</button>
  ||
  <button type="submit" class="btn btn-primary">Submit</button>
</div>