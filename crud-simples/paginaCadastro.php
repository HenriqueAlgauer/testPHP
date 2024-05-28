<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Cadastro</title>
</head>

<body>
    <div class='container'>
        <div class="row">
            <div class="col">
                <h1>Cadastro</h1>
                <form action="cadastro.php" method="post">
                    <div class="mb-3">
                        <label for="nome" class="form-label">Nome</label>
                        <input type="text" name="nome" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="endereco" class="form-label">Endereço</label>
                        <input type="text" name="endereco" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="tel" class="form-label">Telefone</label>
                        <input type="tel" name="tel" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="dt" class="form-label">Data de nascimento</label>
                        <input type="date" name="dt" class="form-control">
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                <a class="btn btn-primary" href="index.php">Início</a>
            </div>
        </div>
    </div>

</body>

</html>