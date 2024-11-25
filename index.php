<?php
if(isset($_GET['accion'])) {
    $accion = $_GET['accion'];
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
     
    <label>nombres:</label>
    <input type="text" id="nombres" name="nombres"> <br>

        <br>

    <label>apellidos:</label>
    <input type="text" id="apellidos" name="apellidos"> <br> 

        <br>

    <label>identificacion:</label>
    <input type="text" id='identificacion' name='identificacion'> <br>

        <br>

    <label>nacionalidad:</label>

    <select name="nacionalidad">
    <option value="vnzl">venezolano</option>
    <option value="extr">extranjero</option>
    </select>
        <br>

        <br>

    <label>direccion:</label>
    <input type="text" id="direccion" name="direccion"> <br>
        <br>

        <label>telefono</label>
    <input type="text" id="telefono" name="telefono"> <br>   
         <br>

    <label>email:</label>
    <input type="email" id="email" name="email"> <br>

         <br>

    seleccione los servicios a contratar.

         <br>

        <?php 
            require_once('clases/servicios.php');
            $servicios = new Servicios();
                $listadoServicios = $servicios->buscarTodo();
                if ($listadoServicios->num_rows > 0) {
                    while($arrServicio = $listadoServicios->fetch_array()) {
                      echo ' 
                        <label>
                        <input
                            type="checkbox"
                            id="chck"
                            name="chck[]"
                            value="'.$arrServicio['id'].'"
                        >
                            '.$arrServicio['servicio'].'
                        </label><br>
                        ';
                    }
                }
        ?>

         <br>

        <br>

    <button type="submit" name="accion" value="<?php echo $accion?>">Enviar</button>

    <br>

</form> 
<script src="script.js"></script> 

<h4>contratos</h4>
<hr>
<?php
    include('contratos.php');
?>
</body> 
</html>
