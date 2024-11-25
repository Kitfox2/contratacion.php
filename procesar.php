<?php

require_once("clases/personas.php");
$personas = new Personas();
        if(isset($_POST['nombres'])) {
         $personas->setNombres($_POST['nombres']);
        }
        if(isset($_POST['apellidos'])) {
            $personas->setApellidos($_POST['apellidos']);
        }
        if(isset($_POST['identificacion'])) {
            $personas->setIdentificacion($_POST['identificacion']);
        }
        if(isset($_POST['direccion'])) {
            $personas->setDireccion($_POST['direccion']);
           }
        if(isset($_POST['nacionalidad'])) {
            $personas->setNacionalidad($_POST['nacionalidad']);
           }
        if(isset($_POST['telefono'])) {
            $personas->setTelefono($_POST['telefono']);
           }
        if(isset($_POST['email'])) {
            $personas->setEmail($_POST['email']);
           }
        if(isset($_POST['chck'])) {
            $personas->setArrServiciosId($_POST['chck']);
        }
        if(isset($_POST['accion'])) {
            $accion = $_POST['accion'];
        } else {
        if(isset($_GET['accion'])) {
                $accion = $_GET['accion'];
            } else {
            $accion = '';
        }
    }
        if($accion == 'guardar') {
            $personas->save();
            echo "registro guardado";
        }
            echo '<a href="index.php">volver</a>'
?> 
