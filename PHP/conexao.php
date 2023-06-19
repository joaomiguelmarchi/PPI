<?php

function conectaBD(){
    $usuario = 'root';
    $senha = '170205joao';
    $database = 'PPI';
    $host = 'localhost';

    $con=new PDO("mysql:host=$host;dbname=$database","$usuario","$senha");

    return $con;

}

function editarUsuario($id, $nome, $email,$senha, $novaData,$telefone){
    try {
    $con = conectaBD();
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "UPDATE usuarios SET nome=?, email=?, senha=?, data_nascimento=?, telefone=? WHERE id=?";
    $stm = $con->prepare($sql);
    $stm->bindParam(1, $nome);
    $stm->bindParam(2, $email);
    $stm->bindParam(3, $senha);
    $stm->bindParam(4, $novaData);
    $stm->bindParam(5, $telefone);
    $stm->bindParam(6, $id);
    $stm->execute();
} catch (PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}
}

function insereUsuario($nome,$email,$senha){
    try{
    $con=conectaBD();
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql="INSERT INTO usuarios(nome,email,senha) VALUES (?,?,?)";
    $stm=$con->prepare($sql);
    $stm->bindParam(1,$nome);
    $stm->bindParam(2,$email);
    $stm->bindParam(3,$senha);
    $stm->execute();
    } catch(PDOException $e){
        echo 'ERRO: '.$e->getMessage();
    }
    return $con->lastInsertId();
}


function deletarUsuario($id){
    $con=conectaBD();
    $sql="DELETE FROM usuarios WHERE id=?";
    try {
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stm=$con->prepare($sql);
        $stm->bindParam(1,$id);
        $stm->execute();
    } catch (PDOException $e) {
        echo 'ERRO:' .$e->getMessage();
    }
}

    function recuperaUsuarioID($id){
    $con=conectaBD();
    $sql="SELECT * FROM usuarios WHERE id=?";
    $stm=$con->prepare($sql);
    $stm->bindParam(1,$id);
    $stm->execute();
    $result=$stm->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function recuperaAll(){
    $con=conectaBD();
    $sql="SELECT * FROM usuarios";
    $stm=$con->prepare($sql);

    $stm->execute();
    $result=$stm->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function verificaLoginSenha($email, $senha) {
    $con=conectaBD();
   
    $sql = "SELECT * FROM usuarios WHERE email = ? AND senha = ?";
    $stm= $con->prepare($sql);
    $stm->bindParam(1,$email);
    $stm->bindParam(2,$senha);
    $stm->execute();
    $result = $stm->fetchAll(PDO::FETCH_ASSOC);
    
   
    if (count($result) > 0) {
        header('Location: home.php');
    } else {
        echo "<script>alert('Usuario invalido, verifique suas credenciais ou inscreva-se!');</script>";
    }
}

?>