<?php
 include('conexao.php');

if(isset($_POST['email']) || isset($_POST['senha'])){
    
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    if(strlen($email) == 0 && strlen($senha) == 0){
    }else if(strlen($email) == 0){
        echo "<script>alert('Preencha seu e-mail');</script>";
    } else if(strlen($senha) == 0){
        echo "<script>alert('Preencha sua senha');</script>";
    }else{
          verificaLoginSenha($email, $senha);
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
<style>
    body{
        height: 98vh;
        width: 98vw;
        background-color: lightblue;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    #botoes{
        display: flex;
        align-items: center;
        justify-content: space-around;
    }
    p{
        display: flex;
        align-items: center;
        justify-content: center;
    }
    #email{
        margin-top: 25px;
    }
    #senha{
        margin-bottom: 35px;
    }
    #form{
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        width: 450px;
        height: 450px;
        border: solid black 1px;
    }
    button{
        background-color: yellow;
        border-radius: 5%;
        width: 100px;
        height: 25px;
        border: 0px;
    }
</style>
<body>
    <div id="form">
        <h1>ACESSE SUA CONTA</h1>
        <form action="" method="POST">
            <p id="email">
                <label for="email">EMAIL</label>  
                <input type="text" name="email"> 
            </p>
            <p id="senha">
                <label for="senha">Senha</label>  
                <input type="password" name="senha"> 
            </p>
            <div id="botoes">
                <button id="sign">Inscrever-se</button>
                <button type="submit">Entrar</button>
            </div>
        </form>
    </div> 
</body>
</html>