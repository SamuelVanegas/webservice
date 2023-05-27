<?php
require "vendor/autoload.php";
$server=new nusoap_server;
$server->configureWSDL('server','urn:server');
$server->wsdl->schemaTargetNamespace='urn:server';

$server->wsdl->addComplexType(
    'Registros',
    'complexType',
    'struct',
    'all',
    '',
    array(
        'idalu'=>array('name'=>'idalu','type'=>'xsd:int'),
        'nombre'=>array('name'=>'nombre','type'=>'xsd:string'),
        'laboratorio1'=>array('name'=>'laboratorio1','type'=>'xsd:int'),
        'laboratorio2'=>array('name'=>'laboratorio2','type'=>'xsd:int'),
        'parcial'=>array('name'=>'parcial','type'=>'xsd:int'),
        'promedio'=>array('name'=>'promedio','type'=>'xsd:float')
    )
);

$server->register(
    'registros',
    array('idalu'=>'xsd:int','nombre'=>'xsd:string', 'laboratorio1'=>'xsd:int', 'laboratorio2'=>'xsd:int', 'parcial'=>'xsd:int'),
    array('return'=>'tns:Registros'),
    'urn:server',
    'urn:server#registrosServer',
    'rpc',
    'encoded',
    'Funcion para validar credenciales'
);

function registros($idalu,$nombre,$laboratorio1,$laboratorio2,$parcial) {
    $total=($laboratorio1*0.25)+($laboratorio2*0.25)+($parcial*0.50);
    
    //Conexión a la Base de Datos
       
        $conexion= new mysqli("localhost","root","catolica","REGISTRO_SAMUEL");

        $conexion->query("insert into ALUMNOS_SAMUEL values (Null, '$nombre', '$laboratorio1', '$laboratorio2', '$parcial')");
        //echo $conexion->error;
        /*function saveAlumnos($nombre, $laboratorio1, $laboratorio2, $parcial) {
            $this->conexion->query("insert into ALUMNOS_SAMUEL values ('$nombre', '$laboratorio1', '$laboratorio2', '$parcial')");
        }

        function add() {
            $this->alumnos->saveAlumnos($_POST["nombre"],$_POST["laboratorio1"],$_POST["laboratorio2"],$_POST["parcial"]);
            $info=array('success'=>true,'msg'=>"Alumno guardado con exito");
        }*/
    //Fin de la conexión a la Base de Datos

    $valor=array(
        'idalu'=>$idalu,
        'nombre'=>$nombre,
        'laboratorio1'=>$laboratorio1,
        'laboratorio2'=>$laboratorio2,
        'parcial'=>$parcial,
        'promedio'=>$total
    );
    return $valor;
}

$server->service(file_get_contents("php://input"));
