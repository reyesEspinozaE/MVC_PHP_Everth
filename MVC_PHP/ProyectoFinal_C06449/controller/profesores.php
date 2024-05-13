<?php
class Profesores extends Controller{
    function __construct(){
        parent::__construct();
        parent::connectionSession(); //método que hereda, ya que la clase controller hereda de sesion
                                    // (session->controller->Profesores)
        $this->view->datos = []; //para que se cree el array cuando se haga una instancia de la clase y se inicialice
        $this->view->mensaje = "Sección profesores";
        $this->view->mensajeResultado = ""; 
        $this->view->grupos = [];    
        
        if (!parent::isAuthenticated()) {
            header("Location: " . constant('URL') . "");
            exit(); // Detener la ejecución del método actual
        }
    }

    function render(){
        $datos = $this->model->getProfesores(); 
        $this->view->datos = $datos;
        $this->view->render('profesores/index');
    }

    function crear(){   //para ver la vista de crear un profesor            
        $this->view->datos = []; //iguala el array a vacio
        $this->view->mensaje = "Crear profesores";
        $this->view->render('profesores/crear');
    }

    //método para registrar en la bd
    function insertarProfesor(){
        //var_dump($_POST);
       
        if ($this->model->insertarProfesor($_POST)){ //este método de es del módelo se encarga de hacer el INSERT en la bd, devuelve true o false
            $mensajeResultado = '
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    Nuevo Registro
                </div>';
        }else{
            $mensajeResultado = '
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    No se Registro
                </div>';
        }
        $this->view->mensajeResultado = $mensajeResultado;        
        $this->render();
    }

   
    function verProfesores( $param = null ){        
        $id = $param[0];
        
        $datos = $this->model->verProfesores($id);   
        $this->view->datos = $datos; 
        $grupos = $this->model->getGrupos();               
        $this->view->grupos = $grupos;

        $this->view->mensaje = "Detalle profesor";
        $this->view->render('profesores/detalle');
    }

    //actualizarprofesor
    function actualizarProfesores(){
        //var_dump($_POST);
        if ($this->model->actualizarProfesores($_POST)){ 

            $datos = new classProfesores();

            foreach ($_POST as $key => $value) { 
                # code...
                $datos->$key= $value; 
            }
            $mensajeResultado = '
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <button type="button" class="btn-close"  data-bs-dismiss="alert" aria-label="Close"></button>
                    Actualización de Registro
                </div>';
        }else{
            $mensajeResultado = '
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    No se actualizó el Registro
                </div>';
        }
        $this->view->datos = $datos;
        $this->view->mensaje = "Detalle profesores";
        $this->view->mensajeResultado = $mensajeResultado;        
        $this->view->render('profesores/detalle');
    } 
       


    //eliminarprofesor
    function eliminarProfesores( $param = null ){   
        $id = $param[0];
        if ($this->model->eliminarProfesores($id)){
            $mensajeResultado = '
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    Se elimino el Registro
                </div>';
        }else{
            $mensajeResultado = '
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    No se elimino el Registro
                </div>';
        }
        $this->view->mensajeResultado = $mensajeResultado;        
        $this->render();
    }
}
