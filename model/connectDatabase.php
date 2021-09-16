<?php
function connectaBD()
{
    $host = '127.0.0.1'; //or localhost
    $database = 'mysql';
    $port = 3306;
    $user = 'root';
    $password = '';
try{
        $connexio = new PDO($database . ":host=" . $host . ';port=' . $port, $user, $password);
        $connexio->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $connexio;
    } catch (PDOException $e) {
        //echo $e->getMessage();
    }
}

function connectDbSQL(){
    $host = '127.0.0.1'; //or localhost
    $database = 'gestio_contractacio_bd';
    $user = 'root';
    $password = '';
    $enlace = mysqli_connect($host, $user, $password, $database);

    if (!$enlace) {
        echo "Error: Couldn't connect to MySQL." . PHP_EOL;
        echo "Error: " . mysqli_connect_error() . PHP_EOL;
        exit;
    }
    return ($enlace);

}



