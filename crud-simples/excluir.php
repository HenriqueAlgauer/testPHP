<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Alteração de Cadastro</title>
</head>

<body>
    <div class='container'>
        <div class="row">
            <?php 
                include "conexao.php";
                $id = $_POST['id'];
                $nome = $_POST['nome'];
                $sql = "DELETE FROM pessoas WHERE cod_pessoa=$id";
                
                if(mysqli_query($conn, $sql)){
                    mensagem("$nome excluido com sucesso",'success');
                }else{
                    mensagem("não foi possível excluir $nome",'danger');
                }
            ?>

            <a href="index.php" class="btn btn-primary">Voltar</a>
        </div>
    </div>

</body>

</html>