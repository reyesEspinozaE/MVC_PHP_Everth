<?php
  // session_start();

  // $_SESSION['idUser']= '001';

  // var_dump($_SESSION);

  require_once 'libs/database.php';
  require_once 'libs/session.php';
  require_once 'libs/controller.php';
  require_once 'libs/model.php';
  require_once 'libs/view.php';
  require_once 'libs/app.php';

  require_once 'config/config.php';
   
  $app = new App();
?>