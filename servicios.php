<?php
    class Servicios{
        protected $id;
        protected $servicio;
        private $con;

            function __construct() {
                $this->con = new mysqli('localhost', 'root', '', 'registros');
            }
            function setServicio($servicio) {
                $this->servicio = $servicio;
            }
            function getServicio() {
                return $this->servicio;
            }
                function buscarTodo() {
                    $sql = 'select * from servicios';
                    $declaracion = $this->con->prepare($sql);
                    $declaracion->execute();
                    $result = $declaracion->get_result();
                    return $result;
                }
            }
?>
