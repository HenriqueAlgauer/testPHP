function mostrar() {
  const codHTML = `
  <nav>
  <ul>
      <li><img class="logo" src="http://localhost/testphp/testMVC/public/assets/img/php3d.png" alt="" /></li>
      <li><a href="http://localhost/testphp/testMVC/public/">Home</a></li>
      <li><a href="#">naosei</a></li>
      <li><a href="http://localhost/testphp/testMVC/public/sobre">Sobre</a></li>
  </ul>
  <div>
      <a href="http://localhost/testphp/testMVC-Login/public/login">
        <button type="button" class="nav-button" id="login">Login</button>
      </a>
      <a href="http://localhost/testphp/testMVC/public/login">
        <button type="button" class="nav-button" id="register">Registrar</button>
      </a>
  </div>
</nav>
    `;
  const menu = document.getElementById("menu");

  menu.innerHTML = codHTML;
}

mostrar();
