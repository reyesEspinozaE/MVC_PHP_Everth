<?php
    class view{
        function _construct(){

        }

        function render($nombre){
            require 'view/'.$nombre.'.php';
        }
    }
?>