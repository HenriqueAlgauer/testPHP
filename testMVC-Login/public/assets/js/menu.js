function menuLogin() {
  const codHTML = `
  <header>
  <nav>
  <ul>
      <li><img class="logo" src="http://localhost/testphp/testMVC-Login/public/assets/img/php3d.png" alt="" /></li>
      <li><a href='http://localhost/testphp/testMVC-Login/public/'>Home</a></li>
      <li><a href='#'>naosei</a></li>
      <li><a href='http://localhost/testphp/testMVC-Login/public/sobre'>Sobre</a></li>
  </ul>
  <div>
      <a href='http://localhost/testphp/testMVC-Login/public/login'>
        <button type='button' class='nav-button' id='login'>Login</button>
      </a>
      <a href='http://localhost/testphp/testMVC-Login/public/register'>
        <button type='button' class='nav-button' id='register'>Registrar</button>
      </a>
      <a href='http://localhost/testphp/testMVC-Login/public/logout'>
          <button type='button' class='nav-button' id='logout'>Logout</button>
      </a>
  </div>
</nav>
</header>

    `;
  const menu = document.getElementById("menu");

  menu.innerHTML = codHTML;
}

menuLogin();
