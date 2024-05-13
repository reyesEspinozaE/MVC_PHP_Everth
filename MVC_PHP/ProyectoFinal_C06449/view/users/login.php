<?php
require 'view/header.php';
require 'view/menu.php';
?>
<div class="container-fluid " id="contenedorprincipal">

  <div class="tab-content">
    <div class="row">

      <div class="col-md-4"></div>

      <div class="col-md-4">
        <?php echo $this->mensajeResultado ?>
        <h3 class="m-4 text-center">Iniciar sesión</h3>

        <form action="<?php echo constant('URL'); ?>users/autenticar" method="POST" class="m-4">

          <!-- Email input -->
          <div class="form-outline mb-4 ">
            <label class="" for=""> Email</label>
            <input type="email" name="email" id="email" class="form-control" placeholder="example@example.com"
              required />
          </div>

          <!-- Password input -->
          <div class="form-outline mb-4">
            <label class="" for=""> Password</label>
            <input type="password" id="password" name="password" class="form-control" placeholder="" required />
          </div>

          <!-- 2 column grid layout -->
          <div class="row mb-4">
            <div class="col-md-6 d-flex justify-content-center">
              <!-- Checkbox -->
              <div class="form-check mb-3 mb-md-0">

                <input class="form-check-input" type="checkbox" value="" id="loginCheck"  />
                <label class="form-check-label" for="loginCheck"> Remember me </label>
              </div>
            </div>

            <div class="col-md-6 d-flex justify-content-center">
              <!-- Simple link -->
              <a href="#!">Forgot password?</a>
            </div>
          </div>
          <div class="text-center">
              <button type="submit" class="btn btn-primary btn-block">Iniciar sesión</button>
          </div>

          <p class="my-2">No tiene una cuenta? <a href="<?php echo constant('URL'); ?>users/verRegistro" class="">Register</a></p>

        </form>
      </div>
    </div>
  </div>
  <div class="col-md-4"></div>
</div>

<?php
require 'view/footer.php';
?>