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
                $endereco = $_POST['endereco'];
                $tel = $_POST['tel'];
                $email = $_POST['email'];
                $data = $_POST['dt'];

                // $sql = "INSERT INTO `pessoas`(`nome`, `endereco`, `telefone`, `email`, `data_nascimento`) VALUES ('$nome','$endereco','$tel','$email','$data')";
                
                $sql = "UPDATE pessoas set nome='$nome', endereco='$endereco', telefone='$telefone', email='$email', data_nascimento='$data' WHERE cod_pessoa=$id";
                
                if(mysqli_query($conn, $sql)){
                    mensagem('alteração feito com sucesso','success');
                }else{
                    mensagem('não foi possível aplicar as alterações','danger');
                }
            ?>

            <a href="index.php" class="btn btn-primary">Voltar</a>
        </div>
    </div>

</body>

</html>