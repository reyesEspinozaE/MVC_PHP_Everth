<?php
    class Main extends Controller
    {
        function __construct()
        {
            parent::__construct();
            parent::connectionSession();

            $this->view->mensaje = "";
            $this->view->mensajeResultado = "";
        }

        function render(){
            $this->view->render('users/login');
           // $this->view->render('main/index');
        }
    }
