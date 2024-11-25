<?php
require_once('servicios.php');
class Personas {

    protected $id;
    protected $nombres;
    protected $apellidos;
    protected $identificacion;
    protected $nacionalidad;
    protected $direccion;
    protected $telefono;
    protected $email;
    protected $arrServiciosId;
    protected $arrservicio;
    private $conexion;

    function __construct() {
        $this->conexion = new mysqli('localhost', 'root', '', 'registros');
        }
        function setId($id) {
            $this->id = $id;
        }
        function setNombres($nombres){
            $this->nombres = $nombres;
        }
        function setApellidos($apellidos){
            $this->apellidos = $apellidos;
        }
        function setIdentificacion($identificacion){
            $this->identificacion = $identificacion;
        }
        function setnacionalidad($nacionalidad){
            $this->nacionalidad = $nacionalidad;
        }
        function setDireccion($direccion){
            $this->direccion = $direccion;
        }
        function setTelefono($telefono){
        $this->telefono = $telefono;
        }
        function setEmail($email){
        $this->email = $email;
        }
        function setArrServiciosId($arrServiciosId) {
            $this->arrServiciosId = $arrServiciosId;
        }
        function setServicio($servicio) {
            $servicioTemp = new Servicios();
            $servicioTemp->setServicio($servicio);
            $this->arrServicio[] = $servicioTemp;
        }
        function getId() {
            return $this->id;
        }
        function getNombres(){
            return $this->nombres;
        }
        function getApellidos(){
            return $this->apellidos;
        }
        function getIdentificacion(){
            return $this->identificacion;
        }
        function getNacionalidad(){
            return $this->nacionalidad;
        }
        function getDireccion(){
            return $this->direccion;
        }
        function getTelefono(){
            return $this->telefono;
        }
        function getEmail(){
            return $this->email;
        }
        function getServicio() {
            return $this->arrservicio;
        }
        function getServiciosId() {
            return $this->arrServiciosId;
        }
        function mostrarServicios() {
            $lista = '';
            $lista .= '<ul>';
            foreach($this->getServicio() as $servicio) {
                $lista .= '<li>'.$servicio->getServicio() .'</li>';
            }
            $lista .= '</ul>';
            return $lista;
        }

    function save(){
        $sql = "insert into personas(nombres, apellidos, identificacion, nacionalidad, direccion, telefono, email) values(?, ?, ?, ?, ?, ?, ?)";
        $declaracion = $this->conexion->prepare($sql);
        $nombres = $this->getNombres();
        $apellidos = $this->getApellidos();
        $identificacion = $this->getIdentificacion();
        $nacionalidad = $this->getNacionalidad();
        $direccion = $this->getDireccion();
        $telefono = $this->getTelefono();
        $email = $this->getEmail();
        $declaracion->bind_param('ssissis', $nombres, $apellidos, $identificacion, $nacionalidad, $direccion, $telefono, $email);
        $declaracion->execute();
        $personasId = $declaracion->insert_id;
        foreach ($this->getServiciosId() as $serviciosId) {
           $sql = "insert into personas_servicios(personasId, serviciosId)values(?,?)";
           $sql = $this->conexion->prepare($sql);
           $declaracion->bind_param('ss', $personasId, $serviciosId);
           $declaracion->execute();
        }
    }
function buscarTodo() {
    $sql = "select * from personas";
    $declaracion = $this->conexion->prepare($sql);
    $declaracion->execute();
    $result = $declaracion->get_result();
    $arrPersonas = [];

    while($data = $result->fetch_array()) {
        $personaTemp = new Personas();
        $personaTemp->setId($data['id']);
        $personaTemp->setNombres($data['nombres']);
        $personaTemp->setApellidos($data['apellidos']);
        $personaTemp->setIdentificacion($data['identificacion']);
        $personaTemp->setNacionalidad($data['nacionalidad']);
        $personaTemp->setDireccion($data['direccion']);
        $personaTemp->setTelefono($data['telefono']);
        $personaTemp->setEmail($data['email']);
        $sql = 'select * from personas_servicios inner join servicio on personas_servicios.serviciosId = servicios.id where personasId = ?';
        $declaracion = $this->conn->prepare($sql);
        $declaracion->bind_param('i', $data['id']);
        $declaracion->execute();
        $resultServicios = $declaracion->get_result();
        while($dataServicio = $resultServicios->fetch_array()) {
            $servicioTemp = new Servicios();
            $personaTemp->setServicio($dataServicio['servicio']);
        }
        $arrPersonas[] = $personaTemp;
    }
    return $arrPersonas;
  }
 }
?>
