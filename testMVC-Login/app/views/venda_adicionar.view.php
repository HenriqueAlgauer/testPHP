<?php 
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="<?= ROOT ?>/assets/img/php3d.png" type="image/x-icon" />
    <title>Adicionar Venda</title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/style.css" />
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/financeiro.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
</head>

<body class="container">
    <?= menu() ?>
    <main class="mx-auto ">
        <?php if (isset($error) && !empty($error)): ?>
        <div class="w-50 mb-4 mx-auto alert alert-danger">
            <?= $error ?>
        </div>
        <?php endif; ?>

        <?php if (isset($success) && !empty($success)): ?>
        <div class="w-50 mb-4 mx-auto alert alert-success">
            <?= $success ?>
        </div>
        <?php endif; ?>
        <div class="shadow rounded py-5">
            <form id="vendaForm" class="px-5 d-flex justify-content-between" method="post">
                <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">
                <div class="d-flex flex-column justify-content-end align-items-center gap-5 ">
                    <button class="btn btn-danger shadow" type="button" onclick="removeLastItem()">Remover
                        Item</button>
                </div>

                <div class="d-flex flex-column justify-content-between align-items-center">
                    <div>
                        <h2>Produtos Selecionados</h2>
                    </div>
                    <div class="d-flex flex-column justify-content-between align-items-center"
                        id="produtos-selecionados">
                        <ul id="selectedProductsList" class="list-group w-100"></ul>
                    </div>
                </div>
                <div class="w-25 d-flex flex-column justify-content-between">
                    <div class="d-flex align-items-center gap-2 mb-5">
                        <label for="formaPagamento">Forma De Pagamento</label>
                        <select style='max-width:120px' class="form-select" name="formaPagamento" id="formaPagamento"
                            aria-label="Default select example">
                            <option value="credito">Credito</option>
                            <option value="debito">Debito</option>
                            <option value="dinheiro">Dinheiro</option>
                        </select>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <strong>Total: R$ <span id="totalPrice">0.00</span></strong>
                        </div>
                        <button class="btn btn-success shadow" onclick="submitVendaForm()" type="submit">Finalizar
                            Venda</button>
                    </div>
                </div>
            </form>

            <div class="px-5 d-flex flex-column justify-content-center align-items-start">
                <!-- <form class="mt-5" method="post">
                    <div class="input-group mb-3">
                        <input class="form-control" type="search" placeholder="nome do produto" id="buscarProduto"
                            name="buscarProduto">
                        <button class="btn btn-outline-secondary" type="submit">Buscar</button>
                    </div>
                </form> -->

                <table class="border border-1 shadow-sm table table-hover mt-5 mx-auto">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Preço</th>
                            <th>Estoque</th>
                            <th>Informe a quantidade</th>
                        </tr>
                    </thead>
                    <tbody id="productTableBody">
                        <?php if (isset($produtos) && is_array($produtos) && count($produtos) > 0): ?>
                        <?php foreach ($produtos as $produto): ?>
                        <tr>
                            <td><strong><?php echo $produto->id; ?></strong></td>
                            <td><?php echo $produto->nome; ?></td>
                            <td>R$ <?php echo $produto->preco; ?></td>
                            <td><?php echo $produto->estoque; ?></td>
                            <td>
                                <div class="d-flex pe-5 justify-content-between">
                                    <input style="max-width: 120px;" class="form-control" type="number"
                                        name="quantidade" placeholder="Qnt." min="1">
                                    <button type="button" class="btn btn-primary"
                                        onclick="addProduct(<?php echo $produto->id; ?>, '<?php echo $produto->nome; ?>', <?php echo $produto->preco; ?>, this.previousElementSibling.value)">Adicionar</button>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                        <?php else: ?>
                        <tr>
                            <td colspan="5">Nenhum produto encontrado.</td>
                        </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>

    </main>
    <a class="ms-5" href="<?= ROOT ?>/venda">Voltar para dashboard</a>

    <?= footer() ?>

    <script>
    function addProduct(id, nome, preco, quantidade) {
        if (quantidade <= 0) {
            alert('Por favor, insira uma quantidade válida.');
            return;
        }

        const product = {
            id,
            nome,
            preco,
            quantidade
        };
        const productItem = document.createElement('li');
        productItem.className =
            'list-group-item w-100 my-1 d-flex justify-content-between align-items-center item';
        productItem.innerHTML = `
            <div>
                <strong>ID:</strong> ${product.id} |
                <strong>Nome:</strong> ${product.nome} |
                <strong>Preço:</strong> R$${product.preco.toFixed(2)} |
                <strong>Quantidade:</strong> ${product.quantidade}
            </div>
            <input type="hidden" name="valor${id}" value="${preco}">
            <input type="hidden" name="quantidade${id}" value="${quantidade}">
        `;
        document.getElementById('selectedProductsList').appendChild(productItem);
        calculateTotal();
    }

    function calculateTotal() {
        const items = document.querySelectorAll('.item');
        let total = 0;

        items.forEach(item => {
            const valor = item.querySelector('[name^="valor"]').value;
            const quantidade = item.querySelector('[name^="quantidade"]').value;

            if (valor && quantidade) {
                total += parseFloat(valor) * parseInt(quantidade);
            }
        });
        document.getElementById('totalPrice').textContent = total.toFixed(2);
    }

    function removeLastItem() {
        const list = document.getElementById('selectedProductsList');
        if (list.lastElementChild) {
            list.removeChild(list.lastElementChild);
            calculateTotal();
        }
    }

    function submitVendaForm() {
        const form = document.getElementById('vendaForm');
        const selectedProducts = document.querySelectorAll('.item');
        const formaPagamento = document.getElementById('formaPagamento').value;
        const totalPrice = document.getElementById('totalPrice').textContent;

        const vendaData = {
            formaPagamento,
            totalPrice,
            items: []
        };

        selectedProducts.forEach(item => {
            const id = item.querySelector('input[name^="valor"]').name.replace('valor', '');
            const valor = item.querySelector('input[name^="valor"]').value;
            const quantidade = item.querySelector('input[name^="quantidade"]').value;

            vendaData.items.push({
                id,
                valor,
                quantidade
            });
        });

        const input = document.createElement('input');
        input.type = 'hidden';
        input.name = 'vendaData';
        input.value = JSON.stringify(vendaData);
        form.appendChild(input);

        form.submit();
    }
    </script>
</body>

</html>