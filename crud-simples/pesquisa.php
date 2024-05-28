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
                        <th scope="col"></th>
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
                                <td><a href='#' class='btn btn-danger btn-sm ' data-bs-toggle='modal' data-bs-target='#confirma'
                                onclick=" .'"' ."pegarDados($cod_pessoa,'$nome')" .'"'.">Excluir</a></td>

                            </tr>";
                        }
                        ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="confirma" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Confirmação de exclusão</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="excluir.php" method="post">
                        <p>Deseja realmente excluir <b id="nome-pessoa">Nome pessoa</b>?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Não</button>
                    <input type="hidden" name="id" id="cod_pessoa" value="">
                    <input type="hidden" name="nome" id="nome_pessoa" value="">
                    <input type="submit" class="btn btn-danger" value="Sim">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
    function pegarDados(id, nome) {
        document.getElementById('nome-pessoa').innerHTML = nome;
        document.getElementById('cod_pessoa').value = id;
        document.getElementById('nome_pessoa').value = nome;
    }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>
</body>

</html>