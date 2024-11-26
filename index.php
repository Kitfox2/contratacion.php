<?php
require_once('clases/personas.php');
$disabled = '';
$personas = new Personas();
$personasId = '';
$nombres = '';
$apellidos = '';
$identificacion = '';
$nacionalidad = '';
$direccion = '';
$telefono = '';
$email = '';

if(isset($_GET['accion'])) {
    $accion = $_GET['accion'];
    $personasId = $_GET['personasId'];
    $disabled = 'disabled';
    if($accion == 'editar') {
        $serviciosId = unserialize($_GET['serviciosId']);
    }
    $personas->buscarPorId($personasId);
    $nombres = $personas->getNombres();
    $apellidos = $personas->getApellidos();
    $identificacion = $personas->getIdentificacion();
    $nacionalidad = $personas->getNacionalidad();
    $direccion = $personas->getDireccion();
    $telefono = $personas->getTelefono();
    $email = $personas->getEmail();
} else {
    $accion = 'guardar';
}
?>

<!DOCTYPE html> 
<html lang="en"> 
<head> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device=width, initial-scale=1.0">  
    <title>formulario</title> 
</head> 
<body> 
    <h1><center>REGISTRO</center></h1>
<form action="procesar.php"  method="POST" id="form" onsubmit="return validarInfo()">
     
    <label for="nombres">nombres:</label>
    <input type="text" id="nombres" name="nombres" value="<?php echo $nombres;?>"> <br>

        <br>

    <label for="apellidos">apellidos:</label>
    <input type="text" id="apellidos" name="apellidos" value="<?php echo $apellidos;?>"> <br> 

        <br>

    <label for="identificacion">identificacion:</label>
    <input type="text" id='identificacion' name='identificacion' value="<?php echo $identificacion;?>"> <br>

        <br>

    <label for="nacionalidad">nacionalidad:</label>

    <select name="nacionalidad" value="<?php echo $nacionalidad;?>">
    <option value="vnzl">venezolano</option>
    <option value="extr">extranjero</option>
    </select>
        <br>

        <br>

    <label for="direccion">direccion:</label>
    <input type="text" id="direccion" name="direccion" value="<?php echo $direccion;?>"> <br>
        <br>

        <label for="telefono">telefono</label>
    <input type="text" id="telefono" name="telefono" value="<?php echo $telefono;?>"> <br>   
         <br>

    <label for="email">email:</label>
    <input type="email" id="email" name="email" value="<?php echo $email;?>"> <br>

         <br>

    seleccione los servicios a contratar.

         <br>

        <?php 
            require_once('clases/servicios.php');
            $servicios = new Servicios();
                $listadoServicios = $servicios->buscarTodo();
                if ($listadoServicios->num_rows > 0) {
                    while($arrServicio = $listadoServicios->fetch_array()) {
                        $checked = '';
                        if ($disabled === 'disabled') {
                            foreach ($serviciosId as $key => $id) {
                                if ($arrServicio['id'] === $id) {
                                    $checked = 'checked';
                                    break;
                                }
                            }
                        }
                      echo ' 
                        <label>
                        <input
                            type="checkbox"
                            id="chck"
                            name="chck[]"
                            value="'.$arrServicio['id'].'"
                            '.$checked.'
                            '.$disabled.'
                        >
                            '.$arrServicio['servicio'].'
                        </label><br>
                        ';
                    }
                }
        ?>
         <br>

        <br>
    <input type="hidden" value="<?php echo $personasId; ?>" name="personasId"> 
    <button type="submit" name="accion" value="<?php echo $accion?>">Enviar</button>

    <br>

</form> 
 
<h4>contratos</h4>
<hr>
<?php
    include('contratos.php');
?>

<script src="script.js"></script>
</body> 
</html>
