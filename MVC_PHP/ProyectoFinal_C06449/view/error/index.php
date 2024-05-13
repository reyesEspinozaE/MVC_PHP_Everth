<?php
  require 'view/header.php';
  require 'view/menu.php';
?>

<div class="container-fluid" id="contenedorprincipal">
    <div class="alert alert-primary alert-dismissible fade show" role="alert">
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      No existe el recurso
    </div>
    
    <script>
      var alertList = document.querySelectorAll('.alert');
      alertList.forEach(function (alert) {
        new bootstrap.Alert(alert)
      })
    </script>
    
</div>

<?php
    require 'view/footer.php';
?>