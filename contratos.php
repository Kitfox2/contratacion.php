<?php
    require_once('clases/personas.php');
    $personas = new Personas();
    $contratos = $personas->buscarTodo();
    if (count($contratos) == 0 ) {
        echo 'no existe el contrato.';
    } else {
        echo '<table border="1">
            <thead>
                <tr>
                    <td>
                        nombres
                    </td>
                    <td>
                        apellidos
                    </td>
                    <td>
                        identificacion
                    </td>
                    <td>
                        nacionalidad
                    </td>
                    <td>
                        direccion
                    </td>
                    <td>
                        telefono
                    </td>
                    <td>
                        email
                    </td>
                    <td>
                        servicios
                    </td>
                </tr>
            </thead>
            <tbody>    
        ';
        foreach ($contratos as $key => $personas) {
            echo '
                <tr>
                    <td>
                    '.$personas->getNombres().'
                    </td>
                    <td>
                    '.$personas->getApellidos().'
                    </td>
                    <td>
                    '.$personas->getIdentificacion().'
                    </td>
                    <td>
                    '.$personas->getNacionalidad().'
                    </td>
                    <td>
                    '.$personas->getDireccion().'
                    </td>
                    <td>
                    '.$personas->getTelefono().'
                    </td>
                    <td>
                    '.$personas->getEmail().'
                    </td>
                    <td>
                    '.$personas->mostrarServicios().'
                    </td>
                </tr>;
                 ';   
        }
        echo '</tbody>';
    }
    ?>
