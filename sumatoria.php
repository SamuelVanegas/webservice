<?php
if (isset($_POST["v1"])) {
    require "vendor/autoload.php";
    $url="http://192.168.56.101/webservice/ws.php?wsdl";
    $cliente=new nusoap_client($url,'wsdl');
    $error=$cliente->getError();
    if ($error) {
        echo "Error en conexion con el webservice: $error";
    }
    $parametros=array("v1"=>$_POST["v1"], "v2"=>$_POST["v2"]);
    $resultado=$cliente->call('sumatoria',$parametros);
    print_r($resultado);
} else {
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <form action="" method="post">
            Digite el primer numero: <input type="int" name="v1" id="v1"><br>
            Digite el segundo numero: <input type="int" name="v2" id="v2"><br>
            <input type="submit" value="Enviar">
        </form>
    </body>
    </html>
<?php 
}
?>
