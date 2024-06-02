<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="<?= ROOT ?>/assets/img/php3d.png" type="image/x-icon" />
    <title>Dashboard</title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
</head>

<body class="container">
    <?= menu() ?>
    <main class="mx-auto ">
        <div class="text-center p-5">
            <h1>Adiocionar Vendas</h1>
        </div>
        <form class="p-5 d-flex justify-content-around align-items-start" method="post">
            <div class="w-25">
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
                    <button class="btn btn-success" type="submit">Finalizar Venda</button>
                </div>
            </div>

            <div class="w-50" id="itensContainer">
                <div class="row g-3 mb-2 item">
                    <div class="col-sm">
                        <input type="text" class="form-control" name="id1" placeholder="id produto">
                    </div>
                    <div class="col-sm">
                        <input type="number" class="form-control" name="valor1" placeholder="valor unidade" step="0.01"
                            oninput="calculateTotal()">
                    </div>
                    <div class="col-sm">
                        <input type="number" class="form-control" name="quantidade1" placeholder="quantidade"
                            step="0.01" oninput="calculateTotal()">
                    </div>
                </div>
            </div>
            <div class="d-flex flex-column justify-content-start gap-5 mb-2">
                <button class="btn btn-primary" type="button" onclick="addItem()">Adicionar Item</button>
                <button class="btn btn-danger" type="button" onclick="removeLastItem()">Remover Item</button>
            </div>

        </form>

        <form class="my-5" method="post">
            <label for="vendaItens">procure por produtos</label>
            <input type="search" placeholder="digite produto" id="buscarProduto" name="buscarProduto">
            <button type="submit">Buscar</button>
        </form>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Preço</th>
                    <th>Estoque</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    if (isset($produtos) && is_array($produtos) && count($produtos) > 0) {
                        foreach ($produtos as $produto) { ?>
                <tr>
                    <td><strong><?php echo $produto->id; ?></strong></td>
                    <td><?php echo $produto->nome; ?></td>
                    <td><?php echo $produto->preco; ?></td>
                    <td><?php echo $produto->estoque; ?></td>
                </tr>
                <?php }
                    } else {
                        echo "Nenhum produto encontrado.";
                    }
                    ?>
            </tbody>
        </table>
    </main>
    <?= footer() ?>
    <script>
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
        const itensContainer = document.getElementById('itensContainer');
        const items = itensContainer.querySelectorAll('.item');
        if (items.length > 1) {
            itensContainer.removeChild(items[items.length - 1]);
            calculateTotal();
        } else {
            alert("Não é possível remover o último item.");
        }
    }


    let itemIndex = 1;

    function addItem() {
        itemIndex++;

        const itensContainer = document.getElementById('itensContainer');
        const newItem = document.createElement('div');
        newItem.classList.add('item');
        newItem.classList.add('row');
        newItem.classList.add('mb-2');
        newItem.classList.add('g-3');
        newItem.innerHTML = `
                    <div class="col-sm">
                        <input type="text" class="form-control" name="id${itemIndex}" placeholder="id produto">
                    </div>
                    <div class="col-sm">
                        <input type="number" class="form-control" name="valor${itemIndex}" placeholder="valor unidade" oninput="calculateTotal()">
                    </div>
                    <div class="col-sm">
                        <input type="number" class="form-control" name="quantidade${itemIndex}" placeholder="quantidade" oninput="calculateTotal()">
                    </div>
            </div>
        `;
        itensContainer.appendChild(newItem);
    }
    </script>
</body>

</html>