<?php
require "vendor/autoload.php";
$url="http://192.168.56.101/webservice/ws.php?wsdl";
$cliente=new nusoap_client($url,'wsdl');
$error=$cliente->getError();
if ($error) {
    echo "Error de conexion en el webservice $error";
}
$parametros=array("username"=>$_POST["username"],"password"=>$_POST["password"]);
$resultado=$cliente->call('login',$parametros);
//print_r($resultado);
if ($resultado["level"]!=0) {
    echo "
        <h1>ID: {$resultado["id_user"]}</h1>
        <h1>Nombre: {$resultado["fullname"]}</h1>
        <h1>Email: {$resultado["email"]}</h1>
        <h1>Level: {$resultado["level"]}</h1>
    ";
} else {
    echo "<h1>{$resultado["msg"]}</h1>";
}