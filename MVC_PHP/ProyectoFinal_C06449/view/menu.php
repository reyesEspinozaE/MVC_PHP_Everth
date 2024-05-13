<?php
// $link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
// $ses = session_status();

// Verificar si la sesión está iniciada
if (isset($_SESSION['id']) && isset($_SESSION['name'])) {
  // La sesión está iniciada
  $isLoggedIn = true;
  $username = $_SESSION['name'];
} else {
  // La sesión no está iniciada
  $isLoggedIn = false;
}

?>

<nav class="navbar navbar-expand-sm navbar-light navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="<?php echo constant('URL'); ?>main">Proyecto Final</a>
    <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavId">
      <ul class="navbar-nav me-auto mt-2 mt-lg-0">

        <li class="nav-item">
          <a class="nav-link" href="<?php echo constant('URL'); ?>main">Home</a>
        </li>

        <?php if ($isLoggedIn) { ?>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Cursos</a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="<?php echo constant('URL'); ?>cursos">Consulta</a>
              <a class="dropdown-item" href="<?php echo constant('URL'); ?>cursos/crear">Crear</a>
            </div>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Estudiantes</a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="<?php echo constant('URL'); ?>estudiantes">Consulta</a>
              <a class="dropdown-item" href="<?php echo constant('URL'); ?>estudiantes/crear">Crear</a>
            </div>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Profesores</a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="<?php echo constant('URL'); ?>profesores">Consulta</a>
              <a class="dropdown-item" href="<?php echo constant('URL'); ?>profesores/crear">Crear</a>
            </div>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Grupos</a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="<?php echo constant('URL'); ?>grupos">Consulta</a>
              <a class="dropdown-item" href="<?php echo constant('URL'); ?>grupos/crear">Crear</a>
            </div>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Usuarios</a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="<?php echo constant('URL'); ?>users">Consulta</a>
              <a class="dropdown-item" href="<?php echo constant('URL'); ?>users/crear">Crear</a>
            </div>
          </li>
        <?php } ?>
      </ul>

      <ul class="navbar-nav ms-auto me-0">
        <?php if ($isLoggedIn) { ?>
          <li class="nav-item">
            <span class="nav-link">Hola, <?php echo $username; ?></span>
          </li>

          <li class="nav-item">
            <a href="<?php echo constant('URL'); ?>users/cerrarSesion" class="nav-link">Cerrar sesión</a>
          </li>

        <?php } else { ?>

          <li class="nav-item">
            <a href="<?php echo constant('URL'); ?>users/verLogin" class="nav-link">Iniciar sesión</a>
          </li>

          <li class="nav-item">
            <a href="<?php echo constant('URL'); ?>users/verRegistro" class="nav-link">Registrarme</a>
          </li>

        <?php } ?>
      </ul>
    </div>
  </div>
</nav>