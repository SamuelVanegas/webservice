<?php
if (isset($_POST["usuario"])) {
    require "vendor/autoload.php";
    $url="http://192.168.56.101/webservice/ws.php?wsdl";
    $cliente=new nusoap_client($url,'wsdl');
    $error=$cliente->getError();
    if ($error) {
        echo "Error de conexion en el webservice $error";
    }
    $parametros=array("usuario"=>$_POST["usuario"]);
    $resultado=$cliente->call('hola',$parametros);
    print_r($resultado);
} else {
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Hola Mundo</title>
    </head>
    <body>
        <form action="" method="post">
            Digite su nombre: <input type="text" name="usuario" id="usuario"><br>
            <input type="submit" value="Enviar">
        </form>
    </body>
    </html>
<?php 
}
?>