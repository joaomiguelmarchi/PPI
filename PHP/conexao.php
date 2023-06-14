<?php
    $usuario = 'root';
    $senha = '170205joao';
    $database = 'PPI';
    $host = 'localhost';

    $mysqli = new mysqli($host, $usuario, $senha, $database);

    if($mysqli->error){
        die();
    }
?>