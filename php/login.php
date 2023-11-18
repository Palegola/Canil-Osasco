<?php
session_start();
ob_start();
include_once '../php/conexao.php';
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/png" href="../img/pawprint.png" />
  <link rel="stylesheet" type="text/css" href="../CSS/global.css" media="screen" />
  <link rel="stylesheet" type="text/css" href="../CSS/navBar.css" media="screen" />
  <link rel="stylesheet" type="text/css" href="../css/login.css" media="screen" />
  <link rel="stylesheet" type="text/css" href="../CSS/footer.css" media="screen" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>canil osasco</title>
</head>

<body>
  <!-- NavBar -->
  <header id="header">

    <div class="flex">

      <nav class="menuDesktop">

        <h2 class="nomeDesk">
          <a href="/index.html">
            Canil<span class="nomeOsasco">Osasco</span>
          </a>
        </h2>

        <ul class="listaNav">

          <li>
            <a href="../index.html" rel="noopener noreferrer">Home</a>
          </li>

          <li>
            <a href="../html/quemsomos.html" rel="noopener noreferrer">Quem somos</a>
          </li>

          <li>
            <a href="../html/pets.html" rel="noopener noreferrer" class="pagina-atual">Quero Adotar</a>
          </li>

          <li>
            <a href="../html/voluntarios.html" rel="noopener noreferrer">Voluntário</a>
          </li>
          <li>
            <a href="../html/feiraadocao.html" rel="noopener noreferrer">Feira de Adoção</a>
          </li>

          <li class="liButton">
            <button class="button-entrar" type="button" onclick="window.location.href='php/login.php'">Entrar</button>
          </li>

        </ul>

      </nav>

      <div class="nomeMobilediv">
        <h2 class="nomeMobile">
          <a href="../index.html">
            Canil<span class="nomeOsasco">Osasco</span>
          </a>
        </h2>


        <div id="menu-hamburguer">
          <div class="bar"><img src="../img/menu.png" /></div>
        </div>
      </div>

      <div id="menu-lateral">
        <span id="fechar-menu" class="fechar-menu"><img src="../img/close.png" /></span>
        <ul>

          <li>
            <div class="button-header">
              <button type="button">Entrar</button>
            </div>
          </li>

          <li>
            <a href="./quemsomos.html" rel="noopener noreferrer">Quem Somos</a>
          </li>

          <li>
            <a href="./doacaopets.html" rel="noopener noreferrer">Quero Adotar</a>
          </li>

          <li>
            <a href="./voluntarios.html" rel="noopener noreferrer">Voluntário</a>
          </li>

          <li>
            <a href="./politicaprivacdade.html" rel="noopener noreferrer">Política de Privacidade</a>
          </li>

        </ul>
      </div>

    </div>

  </header>
  <!-- NavBar -->


  <main>

    <div class='container'>
      <div class='card'>
        <h1> Acesse sua conta </h1>

        <?php

        $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

        if (!empty($dados['SendLogin'])) {
          //var_dump($dados);
          $query_usuario = "SELECT id,nome,usuario, senha_usuario FROM usuarios WHERE usuario =:usuario LIMIT 1 ";
          $result_usuario = $conn->prepare($query_usuario);
          $result_usuario->bindParam(':usuario', $dados['usuario'], PDO::PARAM_STR);

          $result_usuario->execute();

          if (($result_usuario) and ($result_usuario->rowCount() != 0)) {
            $row_usuario = $result_usuario->fetch(PDO::FETCH_ASSOC);
            // var_dump($row_usuario);

            if (password_verify($dados['senha_usuario'], $row_usuario['senha_usuario'])) {
              echo "Usuário logado";
              $_SESSION['id'] = $row_usuario['id'];
              $_SESSION['nome'] = $row_usuario['nome'];
              header("Location: ../html/pets.html ");
            } else {

              $_SESSION['msg'] = "<p style='color: #FF0000'>Erro: E-mail ou senha inválidos!</p>";
            }
          } else {

            $_SESSION['msg'] = "<p style='color: #FF0000'>Erro: E-mail ou senha inválidos!</p>";
          }
        }
        if (isset($_SESSION['msg'])) {
          echo $_SESSION['msg'];
          unset($_SESSION['msg']);
        }
        ?>

        <form method="POST" action="">
          <div id='msgError'></div>

          <div class='label-float'>
            <input type='text' name="usuario" id='usuario' paceholder='' value="<?php if (isset($dados['usuario'])) {
                                                                                  echo $dados['usuario'];
                                                                                } ?>" required>
            <label id='userLabel' for='usuario'>Digite seu e-mail</label>
          </div>

          <div class='label-float'>
            <input type='password' name="senha_usuario" id='senha' paceholder='' value="<?php if (isset($dados['senha_usuario'])) {
                                                                                          echo $dados['senha_usuario'];
                                                                                        } ?>" required>
            <label id='senhaLabel' for='senha'>Digite sua senha</label>
            <i class="fa fa-eye" aria-hidden="true"></i>
          </div>

          <div class="bottom">
            <div class="esquerda">
              <input type="checkbox" id="remember" name="remember">
              <label for="remember">Mantenha-me conectado</label>

            </div>
            <div class="direita">
              <label><a href="../php/recuperar_senha.php">Esqueci minha senha</a></label>
            </div>
          </div>

          <div class='justify-center'>
            <input class="btnacessar" type="submit" name="SendLogin" value="Entrar">
          </div>
        </form>

        <div class='justify-center'>
          <hr>
        </div>

        <p> Não tem uma conta?
          <a href="../php/cadastro.php">Cadastre-se </a>
        </p>

      </div>
    </div>
  </main>

  <!-- FOOTER -->
  <div class="footer">
    <div class="footer-informacao">
      <div class="footer-redes-sociais">
        <h3>Redes sociais</h3>

        <div class="footer-redes-sociais-images">
          <a href="https://www.instagram.com/canilosasco/"><img src="../img/instagram.png" alt="Instagram"></a>
          <a href="https://api.whatsapp.com/send/?phone=5511974157221&text=Quero+adotar+um+animal%21&type=phone_number&app_absent=0"><img src="../img/whatsapp.png" alt="WhatsApp"></a>
          <img src="../img/gmail.png" alt="Gmail">
        </div>

      </div>

      <div class="ajuda">
        <h3>como ajuda?</h3>
        <ul>
          <li><a href="../html/doacaopets.html">quero adotar</a></li>
          <li><a href="../html/voluntarios.html">quero ser voluntario</a></li>
          <li><a href="../html/feiraadocao.html">onde posso estar adotando ?</a></li>
        </ul>
      </div>

      <div>
        <h3>ficou alguma dúvida?</h3>
        <ul>
          <li><a href="../html/politicaprivacidade.html">Política de privacidade</a></li>
          <li><a href="../html/quemsomos.html">Sobre nós</a></li>
        </ul>
      </div>
    </div>

    <div class="footer-info">
      <p>
        Projeto Desenvolvido Em Parceria com um grupo de Alunos do 3° Ano do Curso De Desenvolvimento De Sistemas
        Da
        ETEC Dr.Celso Giglio
      </p>
    </div>

    <div class="footer-dois">
      <p>&copy; 2023 Canil Osasco. Todos os direitos reservados.</p>
    </div>
  </div>

  <!-- FOOTER -->
  <script src="../java/login.js"></script>
</body>

</html>