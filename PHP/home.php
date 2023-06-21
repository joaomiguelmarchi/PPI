<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="home.css">
</head>
<body>
<main>

    <h1>Usuários</h1>
    
    <table class='tabela'>
    <form method="GET" action="pesquisa.php" >
    <div id="search">
        <div id="search-box">
            <div class="search-field">
            <input name="pesquisa" placeholder="Digite um email" class="input" type="text">
                <div type="submit" class="search-box-icon">
                    <button class="btn-icon-content">Pesquisar</button>
                </div>
            </div>
        </div>
    </div>  

    <div class="lista"> 
    </form> 
        <tr>
            <th>Code</th>
            <th>Email</th>
            <th>Senha</th>
            <th>Ações</th>
        </tr>

        <?php
include_once "conexao.php";
session_start();

// Verificar se a pesquisa foi realizada
if (isset($_SESSION['resultado'])) {
    $pesquisa = $_SESSION['resultado'];

    // Verificar se a pesquisa não está vazia
    if (!empty($pesquisa)) {
        // A pesquisa retornou resultados
        foreach ($pesquisa as $row) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>" . $row['senha'] . "</td>";
            echo "<td><a class='linkF ' href='edit.php?id=" . $row['id'] . "'><button  class='button E'>Edit</button></a> | <a class='linkF ' href='delete.php?id=" . $row['id'] . "'><button class='button D'>Delete</button></a></a></td>";
            echo "</tr>";
        }
    } else {
        // A pesquisa não retornou resultados
        echo "Nenhum resultado encontrado.";
    }
} else {
    // A pesquisa não foi realizada, exibir todos os dados da tabela
    $resultado = recuperaALL();

    // Verificar se o resultado não está vazio
    if (!empty($resultado)) {
        // A função retornou resultados
        foreach ($resultado as $row) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>" . $row['senha'] . "</td>";
            echo "<td><a class='linkF ' href='edit.php?id=" . $row['id'] . "'><button  class='button E'>Edit</button></a> | <a class='linkF' href='delete.php?id=" . $row['id'] . "'><button class='button D'>Delete</button></a></td>";
            echo "</tr>";
        }
    } else {
        // A função não retornou resultados
        echo "Nenhum resultado encontrado.";
    }
}
?>

    </table> 


        <a href="criar.php">Adicionar++</a>  
    </div>
    
</main>

    
</body>
</html>