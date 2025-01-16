<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tela de login</title>
  <link rel="icon" href="img/logo.png">
  <style>
    body {
      font-family: Arial, Helvetica, sans-serif;
      background-image: url(img/ttt.jpg);
      background-size: cover;
      background-attachment: fixed;
    }

    .area-login {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .login {
      display: flex;
      flex-direction: column;
      align-items: center;
      background-color: #260041;
      padding: 70px;
      border: #8652b5 solid 4px;
      border-radius: 30px;
    }

    .login form {
      display: flex;
      width: 112%;
      flex-direction: column;
    }

    .login input {
      margin-top: 14px;
      background-color: #351e4b;
      color: #CBD0F7;
      border: none;
      padding-left: 20px;
      outline: none;
      height: 55px;
      border-radius: 8px;
    }

    .login img {
      width: 200px;
      height: auto;
    }

    input::placeholder {
      color: #CBD0F7;
      font-size: 14px;
    }

    form [type='submit'] {
      display: block;
      background-color: #663399;
      font-size: 20px;
      text-transform: uppercase;
      font-weight: bold;
      cursor: pointer;
      border: none;
      color: white;
      padding: 10px 20px;
      transition: background-color 0.3s ease;
    }

    form [type='submit']:hover {
      background-color: #b496cc;
    }

    p {
      color: white;
    }

    a {
      color: blue;
      text-decoration: none;
      margin-left: 8px;
    }

    h1 {
      display: flex;
      justify-content: center;
      color: white;
      font-size: 30px;
    }

    .erro {
      color: red;
    }
  </style>
</head>

<body>
  <section class="area-login">
    <div class="login">
      <div>
        <img src="img/usuario.png" alt="Ícone de Usuário">
      </div>

      <form method="post">
        <h1>LOGIN</h1>
        <input type="text" name="nome" placeholder="Nome de usuário" autofocus>
        <input type="text" name="turma" placeholder="Turma">
        <input type="password" name="senha" placeholder="Sua senha">
        <input type="submit" value="Entrar">
        <p>Ainda não tem uma conta? <a href="cadastro.php">Criar uma conta</a></p>

        <?php
          // Incluindo o arquivo de conexão com o banco de dados
          include('conexao.php');

          // Verificando se os dados do formulário foram enviados
          if (isset($_POST['nome']) || isset($_POST['senha']) || isset($_POST['turma'])) {

              // Verificação de campo vazio: Nome
              if (strlen($_POST['nome']) == 0) {
                  echo "<p class='erro'>Preencha seu Nome de usuário</p>";
              } 
              // Verificação de campo vazio: Senha
              else if (strlen($_POST['senha']) == 0) {
                  echo "<p class='erro'>Preencha sua senha</p>";
              } 
              // Verificação de campo vazio: Turma
              else if (strlen($_POST['turma']) == 0) {
                  echo "<p class='erro'>Preencha sua turma</p>";
              } 
              else {
                  // Protegendo os dados recebidos do formulário contra SQL Injection
                  $nome = $mysqli->real_escape_string($_POST['nome']);
                  $senha = $mysqli->real_escape_string($_POST['senha']);
                  $turma = $mysqli->real_escape_string($_POST['turma']);

                  // Montando a query SQL para verificar a existência do usuário com o nome, senha e turma informados
                  $sql_code = "SELECT * FROM usuarios WHERE nome = '$nome' AND senha = '$senha' AND turma = '$turma'";

                  // Executando a consulta SQL
                  $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);

                  // Verificando a quantidade de registros retornados
                  $quantidade = $sql_query->num_rows;

                  // Se houver exatamente um usuário com as credenciais corretas
                  if ($quantidade == 1) {
                      // Obtendo os dados do usuário
                      $usuario = $sql_query->fetch_assoc();

                      // Iniciando a sessão caso não tenha sido iniciada ainda
                      if (!isset($_SESSION)) {
                          session_start();
                      }

                      // Salvando as informações do usuário na sessão
                      $_SESSION['id'] = $usuario['id'];     // ID do usuário
                      $_SESSION['nome'] = $usuario['nome']; // Nome do usuário
                      $_SESSION['turma'] = $usuario['turma']; // Turma do usuário

                      // Redirecionando para a página home.html
                      header("Location: home.html");
                  } else {
                      // Se não encontrar o usuário com as credenciais corretas
                      echo "<p class='erro'>Falha! Nome de usuário, senha ou turma incorretos</p>";
                  }
              }
          }
        ?>
      </form>
    </div>
  </section>
</body>

</html>
