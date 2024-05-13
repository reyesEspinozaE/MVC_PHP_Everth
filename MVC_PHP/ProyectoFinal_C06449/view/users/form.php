<div style="max-width:50%; margin:auto; padding:auto;">
    <?php if (!$ocultarId) : ?>
        <div class="mb-3">
            <label for="id" class="form-label">Id</label>
            <input type="text" class="form-control" name="id" id="id" value="<?php echo isset($this->datos->id) ? $this->datos->id : ''; ?>" readonly style="background-color: #e9ecef;">
            <small id="helpId" class="form-text text-muteHelp textd"></small>
        </div>
    <?php endif; ?>
    <div class="mb-3">
        <label for="" class="form-label">Nombre</label>
        <input type="text" required class="form-control" name="name" id="name" aria-describedby="helpId" placeholder="Ingrese el nombre de curso" value="<?php echo isset($this->datos->name) ? $this->datos->name : ""; ?>" required>
        <small id="helpId" class="form-text text-muted">Nombre del usuario</small>
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Email</label>
        <input type="email" required class="form-control" name="email" id="email" aria-describedby="helpId" placeholder="Ingrese la email del usuario" value="<?php echo isset($this->datos->email) ? $this->datos->email : ""; ?>" required>
        <small id="helpId" class="form-text text-muted">Email del usuario</small>
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Contraseña</label>
        <input type="password" required class="form-control" name="password" id="password" aria-describedby="helpId" placeholder="Ingrese la contraseña" value="<?php echo isset($this->datos->password) ? $this->datos->password : ""; ?>" required>
        <small id="helpId" class="form-text text-muted">Contranseña</small>
    </div>

    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Enviar</button>
        <a href="<?php echo constant('URL'); ?>users" class="btn btn-secondary">Volver</a>
    </div>
</div>