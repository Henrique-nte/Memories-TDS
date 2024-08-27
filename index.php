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
    background-color: #181920;
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
    width: 175px;
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
  </style>
</head>

<body>
<section class="area-login">
        <div class="login">

            <div>
                <img src="img/usuario.png">
                
            </div>

            <form method="post">
            <h1>LOGIN DE USUARIO</h1>
                <input type="text" name="email" placeholder="Email de usuario" autofocus>
                <input type="password" name="senha" placeholder="Sua senha">

                <input type="submit" value="entrar">


                
                <p>Ainda não tem uma conta? <a href="cadastro.php">Criar uma conta</a></p>
                <?php
include('conexao.php');

if(isset($_POST['email']) || isset($_POST['senha'])) {

  if(strlen($_POST['email']) == 0) {
    echo "<p class='erro'>Preencha seu E-mail</p>";
  } else if(strlen($_POST['senha']) == 0) {
    echo "<p class='erro'>Preencha sua senha</p>";
  } else {

      $email = $mysqli->real_escape_string($_POST['email']);
      $senha = $mysqli->real_escape_string($_POST['senha']);

      $sql_code = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";
      $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);

      $quantidade = $sql_query->num_rows;

      if($quantidade == 1) {
          
          $usuario = $sql_query->fetch_assoc();

          if(!isset($_SESSION)) {
              session_start();
          }

          $_SESSION['id'] = $usuario['id'];
          $_SESSION['email'] = $usuario['email'];

          header("Location: home.html");

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