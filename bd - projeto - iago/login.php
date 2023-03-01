<?php include 'Bootstrap.php' ?>
<?php include 'bd_conexao.php' ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    
    <title>login</title>
</head>

<body>
<!--
    you can substitue the span of reauth email for a input with the email and
    include the remember me checkbox
    -->
    <div class="container">
    <div class="card card-container">
        <!-- <img class="profile-img-card" src="//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" alt="" /> -->
        <img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" />
        <p id="profile-name" class="profile-name-card"></p>
        <form class="form-signin" action="valida_login.php" method="POST">
            <span id="reauth-email" class="reauth-email"></span>
            <input name="log" type="text" id="nome" class="form-control" placeholder="Nome" required autofocus>
            <input name="senha" type="password" id="senha" class="form-control" placeholder="Senha" required>
            <div id="remember" class="checkbox">
                <label>
                    <input type="checkbox" value="remember-me"> Lembre-se de mim
                </label>
            </div>
            <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Entrar</button>
        </form><!-- /form -->
        <a href="#" class="forgot-password">
            Esqueceu a senha?
        </a>
    </div><!-- /card-container -->
</div><!-- /container -->
</body>

</html>

