<?php 

include('conexao.php');

if(isset($_POST['email']) || isset($_POST['senha']) ||  isset($_POST['id'])){
    
    $id = $_POST['id'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    if(strlen($email) == 0 && strlen($senha) == 0){
    }else if(strlen($email) == 0){
        echo "<script>alert('Preencha seu e-mail');</script>";
    } else if(strlen($senha) == 0){
        echo "<script>alert('Preencha sua senha');</script>";
    }else{
          editarUsuario($id, $email, $senha);
          header('Location: home.php');
    }

}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="php.css">
    <title>Document</title>
</head>
<style>
    body{
        height: 98vh;
        width: 98vw;
        background-color: lightblue;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    #botoes{
        display: flex;
        align-items: center;
        justify-content: space-around;
        flex-direction: column;
    }
    p{
        display: flex;
        align-items: center;
        justify-content: center;
    }
    #email{
        margin-top: 35px;
    }
    #senha{
        margin-top: 25px;
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
    #botao{
        background-color: yellow;
        border-radius: 5%;
        width: 100px;
        height: 25px;
        border: 0px;
        margin-bottom: 15px;
        margin-top: 15px;
    }
</style>
<body>
<?php

            $id = $_GET['id'];

        // Chame a função para obter os dados do usuário por ID
        $usuario = recuperaUsuario($id);
        // Verifique se o usuário foi encontrado
        if ($usuario) {
            $email = $usuario['email'];
            $senha = $usuario['senha'];
        } else {
            // Usuário não encontrado, faça o tratamento adequado
            // ...
        }
    ?>

    <div id='form'> 
    <h1>Alterar Cadastro</h1>

        <form action='' method='POST'> 
            <input type="hidden" name="id" value="<?php echo $id; ?>">
           
            <div class="campos um">

                <div id='email'>
                    <label>Email</label>
                    <input type='text' name='email' value='<?php echo $email; ?>' required=""/>
                    		
                </div>

            </div>

                <div id='senha'>
                    <label>Senha</label>
                    <input type='text' name='senha' value='<?php echo $senha; ?>' required=""/>
                </div>
                <div id="botoes">
                  <input id="botao" type='submit' value='Confirmar' class='btn'>  
                </div>
            </div>
            
        </form>
    </div>

    
</body>
</html>