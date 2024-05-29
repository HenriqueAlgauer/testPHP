const t1 =
  "Registro completo das vendas realizadas, com funcionalidades para adicionar novas vendas, consultar registros existentes, editar detalhes e excluir registros quando necessário";

const t2 =
  "Permite a inserção, visualização, atualização e exclusão de produtos no sistema. É possível gerenciar informações detalhadas como nome, descrição, preço e quantidade em estoque.";

const t3 =
  "Monitoramento das finanças do negócio, incluindo entradas e saídas. As operações de CRUD garantem que todas as transações financeiras sejam devidamente registradas e acessíveis para consultas futuras.";

function mostrar(title, img, text) {
  const codHTML = `
        <div class='content-box'>
        <div class='content-image'>
        <img src='http://localhost/testphp/testMVC-Login/public/assets/img/${img}.png' alt='' />
        </div>
        <div class='content-box-text blur'>
        <h3>${title}</h3>
        <p>
        ${text}
        </p>
        </div>
        </div>
        `;
  const box = document.getElementById("container-func");
  box.innerHTML += codHTML;
}

mostrar("CADASTRO DE PRODUTOS", "func3", t1);
mostrar("GESTÃO DE VENDAS", "func1", t2);
mostrar("CONTROLE FINANCEIRO", "func2", t3);
