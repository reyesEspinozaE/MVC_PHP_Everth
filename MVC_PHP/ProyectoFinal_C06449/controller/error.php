<?php
    //$controller = new Errores(); 
    class Errores extends Controller
    {
        function __construct()
        {
            parent::__construct();
            $this->view->render('error/index');
        }
    }
?>