<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Pesquisar</title>
</head>

<body>

    <?php 
        $pesquisa = $_POST['busca'] ?? '';

        include "conexao.php";

        $sql = "SELECT * FROM pessoas WHERE nome LIKE '%$pesquisa%'";

        $dados = mysqli_query($conn, $sql);

        // while( $linha = mysqli_fetch_assoc($dados)){
        //     foreach($linha as $key => $value){
        //         echo "$key: $value<br>";
        //     }
        //     echo "<hr>";
        // }
    ?>

    <div class='container'>
        <div class="row">
            <nav class="navbar bg-body-tertiary">
                <div class="container-fluid">
                    <form class="d-flex justify-content-around" role="search" action="pesquisa.php" method="post"
                        name="busca">
                        <h1>Pesquisar</h1>
                        <input class="form-control me-2" type="search" name="busca" placeholder="Nome"
                            aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </div>
            </nav>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">Endereco</th>
                        <th scope="col">Telefone</th>
                        <th scope="col">Email</th>
                        <th scope="col">Data Nascimento</th>
                        <th scope="col">Funções</th>
                    </tr>
                </thead>
                <tbody>

                    <?php 
                        while( $linha = mysqli_fetch_assoc($dados)){
                            $cod_pessoa = $linha['cod_pessoa'];
                            $nome = $linha['nome'];
                            $endereco = $linha['endereco'];
                            $telefone = $linha['telefone'];
                            $email = $linha['email'];
                            $data = $linha['data_nascimento'];
                            $data = mostraData($data);
                            echo "
                            <tr>
                                <th scope='row'>$nome</th>
                                <td>$endereco</td>
                                <td>$telefone</td>
                                <td>$email</td>
                                <td>$data</td>
                                <td><a href='paginaEdicao.php?id=$cod_pessoa' class='btn btn-success btn-sm'>Editar</a></td>
                                <td><a href='#' class='btn btn-danger btn-sm'>Excluir</a></td>

                            </tr>";
                        }
                        ?>

                </tbody>
            </table>
        </div>
    </div>

</body>

</html>