<?php

function conectaBD(){
    $usuario = '';
    $senha = '';
    $database = '';
    $host = '';

    $con=new PDO("mysql:host=$host;dbname=$database","$usuario","$senha");

    return $con;

}

function editarUsuario($id, $email,$senha){
    try {
    $con = conectaBD();
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "UPDATE usuarios SET email=?, senha=? WHERE id=?";
    $stm = $con->prepare($sql);
    $stm->bindParam(1, $email);
    $stm->bindParam(2, $senha);
    $stm->bindParam(3, $id);
    $stm->execute();
} catch (PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}
}

function insereUsuario($email,$senha){
    try{
    $con=conectaBD();
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql="INSERT INTO usuarios(email,senha) VALUES (?,?)";
    $stm=$con->prepare($sql);
    $stm->bindParam(1,$email);
    $stm->bindParam(2,$senha);
    $stm->execute();
    } catch(PDOException $e){
        echo 'ERRO: '.$e->getMessage();
    }
    return $con->lastInsertId();
}

function recuperaUsuario($id) {
    $con = conectaBD();
    $sql = "SELECT * FROM usuarios WHERE id = ?";
    $stm = $con->prepare($sql);
    $stm->bindParam(1, $id);
    
    try {
        $stm->execute();
        $result = $stm->fetchAll(PDO::FETCH_ASSOC);
        if ($result && count($result) > 0) {
            return $result[0];
        } else {
            return null; // Retorna null se nenhum resultado for encontrado
        }
    } catch (PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
        return null;
    }
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

?>
