<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tela de Cadastro</title>
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
      background-color: #1c0032;
      padding: 70px;
      border-radius: 30px;
      border: #925cb9 solid 4px;
    }

    .login form {
      display: flex;
      width: 107%;
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
      font-size: 27px;
    }

    .erro {
      color: red;
    }

    .acerto {
      color: green;
    }

    .ja {
      color: #4cb9fa;
    }
  </style>
</head>

<body>
  <section class="area-login">
    <div class="login">
      <div>
        <img src="img/usuario.png">
      </div>

      <form method="post">
        <h1>CADASTRO</h1>
        <input type="text" name="nome" placeholder="Nome de usuário" autofocus>
        <input type="text" name="turma" placeholder="Turma">
        <input type="password" name="senha" placeholder="Sua senha">
        <input type="submit" value="Cadastrar">
        <p>Você já tem uma conta? <a href="index.php">Entrar em uma conta</a></p>

        <?php
        // Inclui o arquivo de conexão com o banco de dados
        include('pages/conexao.php');

        // Verifica se os dados do formulário foram enviados (nome, senha e turma)
        if (isset($_POST['nome']) && isset($_POST['senha']) && isset($_POST['turma'])) {

          // Armazena os valores dos campos enviados no formulário
          $nome = trim($_POST['nome']);
          $senha = $_POST['senha'];
          $turma = trim($_POST['turma']);

          // Validação dos campos
          if (empty($nome) || empty($senha) || empty($turma)) {
            echo "<p class='erro'>Todos os campos são obrigatórios!</p>";
          } elseif (strlen($senha) < 6) {
            echo "<p class='erro'>A senha deve ter pelo menos 6 caracteres.</p>";
          } else {
            // Verifica se o nome de usuário já está cadastrado no banco de dados
            $stmt = $mysqli->prepare("SELECT * FROM usuarios WHERE nome = ?");
            $stmt->bind_param("s", $nome);
            $stmt->execute();
            $resultado_verifica_nome = $stmt->get_result();

            // Se o nome já estiver cadastrado, exibe uma mensagem de erro
            if ($resultado_verifica_nome->num_rows > 0) {
              echo "<p class='ja'>Nome já cadastrado</p>";
            } else {
              // Hash da senha
              $senha_hash = password_hash($senha, PASSWORD_DEFAULT);

              // Se o nome não estiver cadastrado, insere o novo usuário no banco de dados
              $stmt = $mysqli->prepare("INSERT INTO usuarios (nome, senha, turma) VALUES (?, ?, ?)");
              $stmt->bind_param("sss", $nome, $senha_hash, $turma);
              $stmt->execute();

              // Verifica se a inserção foi bem-sucedida
              if ($stmt->affected_rows > 0) {
                echo "<p class='acerto'>Usuário cadastrado com sucesso!</p>";
              } else {
                echo "<p class='erro'>Falha ao cadastrar. Tente novamente mais tarde.</p>";
              }
            }
          }
        }
        ?>

      </form>
    </div>
  </section>

</body>

</html>