<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tela de login</title>
  <style>
      body {
        font-family: Arial, Helvetica, sans-serif;
        background-image: url(img/303.jpg);
        background-size: cover;
        background-attachment: fixed;
  }

  .area-login {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    justify-content: center;
    align-items: center;
  }

  .login {
    display: flex;
    flex-direction: column;
    align-items: center;
    background-color: #1c0032;
    padding: 80px;
    border-radius: 30px;

  }

  .login form {
    display: flex;
    width: 120%;
    flex-direction: column;


  }

  .login input {
    margin-top: 14px;
    background-color: #252A34;
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
    background-color: #7639d7bf;
    font-size: 20px;
    text-transform: uppercase;
    font-weight: bold;
    cursor: pointer;
  }

  p {
    color: white;
  }

  a {
    color: blue;
    text-decoration: none;
    margin-left: 8px;
  }
  h1{
    display: flex;
    justify-content: center;
    color: white;
  }


    .erro {
      color: red;
    }
  .acerto{
    color: green;
  }
  .ja{
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
            <h1>CADASTRO DE USUARIO</h1>
                <input type="text" name="email" placeholder="Email de usuario" autofocus>
                <input type="password" name="senha" placeholder="Sua senha">

                <input type="submit" value="cadastrar">



                <p>Você ja tem uma conta? <a href="index.php">Entrar em uma conta</a></p>
                <?php
                  include('conexao.php');

                  if(isset($_POST['email']) && isset($_POST['senha'])) {
                    
                    $email = $_POST['email'];
                    $senha = $_POST['senha'];

                    // Verifica se o e-mail já está cadastrado
                    $sql_verifica_email = "SELECT * FROM usuarios WHERE email = '$email'";
                    $resultado_verifica_email = $mysqli->query($sql_verifica_email);

                    if($resultado_verifica_email->num_rows > 0) {
                      echo "<p class='ja'>Email ja cadastrado</p>";
                    } else {
                        // Insere o novo usuário no banco de dados
                        $sql_code = "INSERT INTO usuarios (email, senha) VALUES ('$email', '$senha')";
                        $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);

                        if($sql_query) {
                          echo "<p class='acerto'>Usuario cadastrado com sucesso!</p>";
                            // Aqui você pode redirecionar o usuário para a página desejada após o cadastro
                          } else {
                            echo "<p class='erro'>Falha! E-mail ou senha incorretos</p>";
                        }
                    }
                  }
                  ?>



            </form>
            
        </div>
    </section>

</body>

</html>