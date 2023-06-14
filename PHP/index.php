<?php
 include('conexao.php');

if(isset($_POST['email']) || isset($_POST['senha'])){
    
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    if(strlen($email) == 0){
        echo "Preencha seu e-mail";
    } else if(strlen($senha) == 0){
        echo "Preencha sua senha";
    }else{
          echo "adsad";
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>ACESSE SUA CONTA</h1>
    <form action="" method="POST">
        <p>
           <label for="email">EMAIL</label>  
          <input type="text" name="email"> 
        </p>
        <p>
           <label for="senha">Senha</label>  
          <input type="password" name="senha"> 
        </p>
        <p>
            <button type="submit">Entrar</button>
        </p>
    </form>
</body>
</html>