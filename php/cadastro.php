<?php

session_start();

ob_start();

date_default_timezone_set('America/Sao_Paulo');

include_once "../php/conexao.php";

?>
<!DOCTYPE html>
<html lang=pt-br>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/png" href="../img/pawprint.png" />
  <link rel="stylesheet" type="text/css" href="../CSS/global.css" media="screen" />
  <link rel="stylesheet" type="text/css" href="../CSS/navBar.css" media="screen" />
  <link rel="stylesheet" type="text/css" href="../css/cadastro.css" media="screen">
  <link rel="stylesheet" type="text/css" href="../CSS/footer.css" media="screen" />
  <title>canil osasco</title>
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>

<body>

  <!-- NavBar -->
  <header id="header">

    <div class="flex">

      <nav class="menuDesktop">

        <h2 class="nomeDesk">
          <a href="../index.html">
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
            <a href="../html/doacaopets.html" rel="noopener noreferrer" class="pagina-atual">Quero Adotar</a>
          </li>

          <li>
            <a href="../html/voluntarios.html" rel="noopener noreferrer">Voluntário</a>
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
            <a href="../html/quemsomos.html" rel="noopener noreferrer">Quem Somos</a>
          </li>

          <li>
            <a href="../html/pets.html" rel="noopener noreferrer">Quero Adotar</a>
          </li>

          <li>
            <a href="../html/voluntarios.html" rel="noopener noreferrer">Voluntário</a>
          </li>

          <li>
            <a href="../htm/politicaprivacdade.html" rel="noopener noreferrer">Política de Privacidade</a>
          </li>

        </ul>
      </div>

    </div>

  </header>
  <!-- NavBar -->

  <main>
    <div class="container">



      <?php

      $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

      if (!empty($dados['SendCaduser'])) {
        var_dump($dados);

        $senha_cripto = password_hash($dados['senha_usuario'], PASSWORD_DEFAULT);

        $query_usuario = "INSERT INTO usuarios (nome, Sobrenome, CPF, Telefone, Celular, DataNasc, Genero, usuario, senha_usuario) 
        VALUES (:nome, :Sobrenome, :CPF, :Telefone, :Celular, :DataNasc, :Genero, :usuario, :senha_usuario)";

        $cad_usuario = $conn->prepare($query_usuario);

        $cad_usuario->bindParam(':nome', $dados['nome']);
        $cad_usuario->bindParam(':Sobrenome', $dados['usuario']);
        $cad_usuario->bindParam(':CPF', $dados['CPF']);
        $cad_usuario->bindParam(':Telefone', $dados['Telefone']);
        $cad_usuario->bindParam(':Celular', $dados['Celular']);
        $cad_usuario->bindParam(':DataNasc', $dados['DataNasc']);
        $cad_usuario->bindParam(':Genero', $dados['Genero']);
        $cad_usuario->bindParam(':usuario', $dados['usuario']);
        $cad_usuario->bindParam(':senha_usuario', $senha_cripto);

        $cad_usuario->execute();

        if ($cad_usuario->rowCount()) {

          $_SESSION['msg'] = "<p style='color: green'>Usuário cadastrado com sucesso!</p>";
          header("Location: login.php");
          exit();
        } else {

          $_SESSION['msg'] = "<p style='color: #f00'>Erro: Usuário não cadastrado com sucesso!</p>";
        }
      }

      if (isset($_SESSION['msg'])) {
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
      }
      ?>
      <div class="containerdois">
        <h1>Cadastre-se</h1>
        <div class="progress-bar">
          <div class="step">
            <p>Nome</p>
            <div class="bullet">
              <span>1</span>
            </div>
            <div class="check fas fa-check"></div>
          </div>
          <div class="step">
            <p>Contato</p>
            <div class="bullet">
              <span>2</span>
            </div>
            <div class="check fas fa-check"></div>
          </div>
          <div class="step">
            <p>Data</p>
            <div class="bullet">
              <span>3</span>
            </div>
            <div class="check fas fa-check"></div>
          </div>
          <div class="step">
            <p>Enviar</p>
            <div class="bullet">
              <span>4</span>
            </div>
            <div class="check fas fa-check"></div>
          </div>
        </div>
        <div class="form-outer">
          <form action="" method="POST">

            <div class="page slide-page">

              <div class="title">Informação básica:</div>
              <div class="field">
                <div class="label">Primeiro nome</div>
                <input type="text" id="nome" name="nome">
              </div>
              <div class="field">
                <div class="label">Sobrenome</div>
                <input type="text" id="sobrenome" name="Sobrenome">

              </div>
              <div class="field">
                <div class="label">CPF:</div>
                <input type="text" id="cpf" name="CPF" autocomplete="off" oninput="mascara(this)">
              </div>
              <div class="field">
                <button type="button" class="firstNext next">Próximo</button>
              </div>
            </div>
            <div class="page">
              <div class="title">Informações de contato</div>

              <div class="field">
                <div class="label">Número de telefone</div>
                <input type="text" name="Telefone" autocomplete="off" maxlength="15" OnKeyPress="formatar('(##) ####-####',this)">
              </div>
              <div class="field">
                <div class="label">Número de celular</div>
                <input type="text" name="Celular" id="celular" autocomplete="off" maxlength="15" OnKeyPress="formatar('(##) #####-####',this)">
              </div>
              <div class="field btns">
                <button type="button" class="prev-1 prev">Anterior</button>
                <button type="button" class="next-1 next">Próximo</button>
              </div>
            </div>

            <div class="page">
              <div class="title">Nascimento:</div>
              <div class="field">
                <div class="label">Data</div>
                <input type="date" id="data" name="DataNasc">
              </div>
              <div class="field">
                <div class="label">Gênero</div>
                <select name="Genero" id="genero">
                  <option value="selecionar">selecionar</option>
                  <option value="M">Masculino</option>
                  <option value="F">Feminino</option>
                  <option value="Outros">Outros</option>
                </select>
              </div>
              <div class="field btns">
                <button type="button" class="prev-2 prev">Anterior</button>
                <button type="button" class="next-2 next">Próximo</button>
              </div>
            </div>

            <div class="page">
              <div class="title">Detalhes de login:</div>
              <div class="field">
                <div class="label">E-mail</div>
                <input type="E-mail" id="email" name="usuario">
              </div>
              <div class="field">
                <div class="label">Senha</div>
                <input type="password" id="password" name="senha_usuario">

              </div>
              <div class="field">
                <div class="label">Confirme a sua senha</div>
                <input type="password" id="confirm_password">
              </div>
              <div class="field btns">
                <button type="button" class="prev-3 prev">Anterior</button>
                <button type="submit"class="submit" value="1" name="SendCaduser">Enviar</button>
              </div>
            </div>
          </form>
        </div>
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

  <script src="../java/cadastro.js"></script>
  <script src="../java/munu.js"></script>
  <script src="../java/mascara.js"></script>

</body>

</html>