<?php

require_once('clases/personas.php');
$personas = new Personas();

        if(isset($_POST['personasId'])) {
            $personas->setId($_POST['personasId']);
        }
        if(isset($_GET['personasId'])) { 
            $personas->setId($_GET['personasId']);
        }
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
            echo '<h3>registro guardado</h3><br><a href="index.php"><h3>volver</h3></a>';
        }
        if($accion == 'editar') {
            $personas->update();
            echo '<h3>registro editado</h3><br><a href="index.php"><h3>volver</h3></a>';
        }
        if($accion == 'eliminar') {
            $personas->delete();
            echo '<h3>registro eliminado</h3><br><a href="index.php"><h3>volver</h3></a>';
        }
    

?> 
