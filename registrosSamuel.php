<?php
if (isset($_POST["idalu"])) {
    require "vendor/autoload.php";
    $url="http://192.168.56.101/webservice/wsLaboratorio.php?wsdl";
    $cliente=new nusoap_client($url,'wsdl');
    $error=$cliente->getError();
    if ($error) {
        echo "Error en conexion con el webservice: $error";
    }
    $parametros=array("idalu"=>$_POST["idalu"], "nombre"=>$_POST["nombre"], "laboratorio1"=>$_POST["laboratorio1"], "laboratorio2"=>$_POST["laboratorio2"], "parcial"=>$_POST["parcial"], "promedio"); 
    //print_r($parametros);
    $resultado=$cliente->call('registros',$parametros);
    echo $cliente->getError();
    if ($resultado["idalu"]!=0) {
        echo "
            <h1>Id Alumno: {$resultado["idalu"]}</h1>
            <h1>Nombre: {$resultado["nombre"]}</h1>
            <h1>Laboratorio 1: {$resultado["laboratorio1"]}</h1>
            <h1>Laboratorio 2: {$resultado["laboratorio2"]}</h1>
            <h1>Parcial: {$resultado["parcial"]}</h1>
            <h1>Promedio: {$resultado["promedio"]}</h1>
        ";
    } else {
        echo "<h1>{$resultado["msg"]}</h1>";
    }
    //print_r($resultado);
} else {
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Registros</title>
    </head>
    <body>
        <form action="" method="post">
            Digite el Id del alumno: <input type="int" name="idalu" id="idalu"><br>
            Digite el nombre del alumno: <input type="text" name="nombre" id="nombre"><br>
            Digite la nota del Laborotorio 1: <input type="float" name="laboratorio1" id="laboratorio1"><br>
            Digite la nota del Laborotorio 2: <input type="float" name="laboratorio2" id="laboratorio2"><br>
            Digite la nota del Parcial: <input type="float" name="parcial" id="parcial"><br>
            <input type="submit" value="Enviar">
        </form>
    </body>
    </html>
<?php 
}
?>
