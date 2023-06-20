<?php 
include('conexao.php');

if(!isset($_GET['id'])){
    die();
}


$id = $_GET['id'];

deletarUsuario($id);
header('Location: home.php');

?>