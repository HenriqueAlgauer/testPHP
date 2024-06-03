<?php 
function show($f){
    echo "<pre>";
    print_r($f);
    echo "</pre>";
}

function esc($str){
    return htmlspecialchars($str);
}

function redirect($path){
    header("Location: ".ROOT."/".$path);
    die;
}

function menu(){
    $nome = $_SESSION['LOGIN']->login;
    echo "
    <header>
        <nav>
        <ul>
            <li><img class='logo' src='http://localhost/testphp/testMVC-Login/public/assets/img/php3d.png' alt='' /></li>
            <li><a href='http://localhost/testphp/testMVC-Login/public/dashboard'>Dashboard</a></li>
            <li><a href='http://localhost/testphp/testMVC-Login/public/produto'>Produtos</a></li>
            <li><a href='http://localhost/testphp/testMVC-Login/public/financeiros'>Financeiro</a></li>
            <li><a href='http://localhost/testphp/testMVC-Login/public/venda'>Vendas</a></li>
        </ul>
        <div class='header-button'>
            <h2>Olá, $nome</h2>
            <a href='http://localhost/testphp/testMVC-Login/public/logout'>
                <button type='button' class='nav-button' id='logout'>Logout</button>
            </a>
        </div>
      </nav>
      </header>
    ";
}

function menuExterno(){
    
    echo "
    <header>
        <nav>
        <ul>
        <li><img class='logo' src='http://localhost/testphp/testMVC-Login/public/assets/img/php3d.png' alt='' /></li>
            <li><a href='http://localhost/testphp/testMVC-Login/public/'>Home</a></li>
            <li><a href='#'>naosei</a></li>
            <li><a href='http://localhost/testphp/testMVC-Login/public/sobre'>Sobre</a></li>
        
        ";
    if(empty($_SESSION['LOGIN'])){
        echo "
        </ul>
        <div>
            <a href='http://localhost/testphp/testMVC-Login/public/login'>
              <button type='button' class='nav-button' id='login'>Login</button>
            </a>
            <a href='http://localhost/testphp/testMVC-Login/public/register'>
              <button type='button' class='nav-button' id='register'>Registrar</button>
            </a>
        ";
    }else{
        $nome = $_SESSION['LOGIN']->login;
        echo "
            <li><a href='http://localhost/testphp/testMVC-Login/public/dashboard'>Painel</a></li>
        </ul>
        <div class='header-button'>
            <h2>Olá, $nome</h2>
            <a href='http://localhost/testphp/testMVC-Login/public/logout'>
            <button type='button' class='nav-button' id='logout'>Logout</button>
            </a>
        ";
    }
    echo "
        </div>
      </nav>
      </header>
    ";
}

function contentBox($title, $img, $text){
    echo "
    <div class='content-box'>
    <div class='content-image'>
    <img src='http://localhost/testphp/testMVC-Login/public/assets/img/$img.png' alt='' />
    </div>
    <div class='content-box-text blur'>
    <h3>$title</h3>
    <p>
    $text
    </p>
    </div>
    </div>
    ";
}

function footer(){
    echo "
    <footer id='footer'>
        <p>&copy; PROJETO PHP</p>
    </footer>
    ";
}