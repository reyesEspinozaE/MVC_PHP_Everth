<?php
class Users extends Controller
{

  function __construct()
  {
    parent::__construct();
    parent::connectionSession();

    $this->view->datos = [];
    $this->view->mensaje = "Seccion Usuarios";
    $this->view->mensajeResultado = "";
  }

  function render()
  {
    if (!parent::isAuthenticated()) {
      // Redirigir al inicio de sesión o mostrar un mensaje de error
      header("Location: " . constant('URL') . "users/verLogin");
      exit();
    }

    $datos = $this->model->getUsers();
    $this->view->datos = $datos;
    $this->view->render('users/index');
  }

  function crear() //para ver la vista de crear
  {
    if (!parent::isAuthenticated()) {
      // Redirigir al inicio de sesión o mostrar un mensaje de error
      header("Location: " . constant('URL') . "users/verLogin");
      exit();
    }

    $this->view->datos = [];
    $this->view->mensaje = "Crear User";
    $this->view->render('users/crear');
  }

  function insertarUser()
  {
    if ($this->model->insertarUser($_POST)) {
      $mensajeResultado = '
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        Nuevo Registro
      </div>';
    } else {
      $mensajeResultado = '
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        No se registro
      </div>';
    }

    $this->view->mensajeResultado = $mensajeResultado;
    //var_dump($mensajeResultado);
    $this->render();

  }

  function verUsers($param = null)
  {
    if (!parent::isAuthenticated()) {
      // Redirigir al inicio de sesión o mostrar un mensaje de error
      header("Location: " . constant('URL') . "users/verLogin");
      exit();
    }
    $id = $param[0];

    $datos = $this->model->verUsers($id);
    $this->view->datos = $datos;
    $this->view->mensaje = "Detalle del user";
    $this->view->render('users/detalle');
  }

  function actualizaruser()
  {
    if ($this->model->actualizaruser($_POST)) {
      $datos = new classUsers();
      foreach ($_POST as $key => $value) {
        # code...
        $datos->$key = $value;
      }
      $mensajeResultado = '
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        Se actualizo el registro
      </div>';
    } else {
      $mensajeResultado = '
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        No se actualizo el registro
      </div>';
    }
    $this->view->datos = $datos;
    $this->view->mensajeResultado = $mensajeResultado;
    $this->render();
  }

  function eliminaruser($param = null)
  {
    $id = $param[0];
    if ($this->model->eliminaruser($id)) {
      $mensajeResultado = '
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        Se elimino el Registro
      </div>';
    } else {
      $mensajeResultado = '
      <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        No se elimino el registro
      </div>';
    }
    $this->view->mensajeResultado = $mensajeResultado;
    $this->render();

  }


  function verLogin()
  {
    $this->view->render('users/login');
  }

  function autenticar()
  {
    $arreglo =
      [
        'email' => $_POST['email'],
        'password' => $_POST['password']
      ];

    $user = $this->model->autenticar($arreglo);
    if (isset($user->id)) {
      //session_start();
      $_SESSION['id'] = $user->id;
      $_SESSION['name'] = $user->name;

      $this->view->render('main/index');
    } else {
      $mensajeResultado = '
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    Datos incorrectos
                </div>';
      $this->view->mensajeResultado = $mensajeResultado;
      $this->view->render('users/login');
    }
  }

  function cerrarSesion(){
    session_destroy();
    session_write_close();

    // Redireccionar a la página principal
    header("Location: " . constant('URL') . "");
    exit();
  }

  function verRegistro()
  {
    $this->view->render('users/register');
  }

  function registrar()
  {
    if ($_POST['password'] != $_POST['confirmpassword']) {
      $mensajeResultado = '
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    Las contraseñas no coinciden
                </div>';
      $this->view->mensajeResultado = $mensajeResultado;
      $this->view->render('users/register');
      exit();
    } else {
      $arreglo =
        [
          'name' => $_POST['name'],
          'email' => $_POST['email'],
          'password' => $_POST['password']
        ];

      if ($this->model->registrar($arreglo)) {
        $mensajeResultado = '
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    Registro exitoso
                </div>';
        $this->view->mensajeResultado = $mensajeResultado;
        $this->view->render('users/login');
      } else {
        $mensajeResultado = '
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    No se registro
                </div>';
                $this->view->mensajeResultado = $mensajeResultado;
      $this->view->render('users/register');
      }

    }
  }

}
