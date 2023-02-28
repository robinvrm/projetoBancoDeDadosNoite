<?php session_start(); ?>
<?php session_destroy(); ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="./styles/css/bootstrap.min.css" rel="stylesheet">
  <script src="./styles/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="./styles/fonts/css/all.min.css">
  <link rel="stylesheet" href="./styles/styles.css">
  <script src="./styles/fonts/js/all.min.js"></script>
  <script type="text/javascript" src="./js/jquery.min.js"></script>
  <link rel="icon" href="./styles/images/mv_icon_removebg.png">
  <script src="./js/sweetalert2.all.min.js"></script>
  <title>Login</title>
</head>

<body class="cor-fundo-principal">
  <div class="container mt-4 mt-5">
    <div class="row align-items-center justify-content-center">
      <div class="col-md-10 mx-auto col-lg-5">
        <div class="p-4 p-md-5 border rounded-3 cor-fundo-secundarias">
          <div class="form-floating mb-3">
            <input type="text" name="usuario" id="user" class="form-control cor-fundo-input" placeholder="Usuário">
            <label for="user"><i class="fa-solid fa-user"></i> Usuário</label>
          </div>
          <div class="form-floating mb-3">
            <input type="password" name="senha" id="password" class="form-control cor-fundo-input" placeholder="Senha">
            <label for="password">
              <i id="password-icon" class="fa-solid fa-lock"></i> Senha
            </label>
          </div>
          <div class="form-floating mb-3">
            <button id="visualizar-senha" class="btn btn-sm btn-secondary">
              <i class="fa-solid fa-eye"></i>
              Visualizar senha
            </button>
          </div>
          <div class="form-floating mb-3">
            <button id="login" type="submit" class="btn btn-success">ENTRAR</button>
          </div>
          <div class="form-floating mb-3 d-none">
            <button id="create_user" type="button" class="btn btn-warning">CRIAR USUÁRIO</button>
          </div>
        </div>
      </div>
    </div>
  </div>

</body>

</html>

<script type="text/javascript" src="./styles/script_style.js"></script>

<script>
  function efetuarLogin(data) {
    $.post("./login/login.php", data, function(result) {
      if (result.trim() == 'ok') {
        $("#password-icon").addClass('fa-solid fa-unlock');
        window.location.href = "./menu/menu.php";
      } else {
        Swal.fire(
          'Usuário e/ ou senha informadas inválidas!',
          '',
          'error'
        ).then((close) => {
          location.reload();
        });
      }
    });
  }

  function eventClickLogin() {
    $('#login').off('click').on('click', function() {
      const user = $("#user").val();
      const password = $("#password").val();

      const data = {
        user,
        password
      };

      if ((!password) || (!user)) {
        notFoundUserPassword();
        return false;
      }

      efetuarLogin(data);
    })
  }

  function eventEnterLogin() {
    $('#password').keypress(function(event) {
      if (event.key === 'Enter') {
        $('#login').click();
        return false;
      }
    });

    $('#user').keypress(function(event) {
      if (event.key === 'Enter') {
        $('#login').click();
        return false;
      }
    });
  }

  function notFoundUserPassword() {
    Swal.fire(
      'Favor informar usuário e senha!',
      '',
      'warning'
    ).then((close) => {
      location.reload();
    });
  }

  function visualizarSenha() {
    $('#visualizar-senha').off('click').on("click", function() {
      if ($(this).children().hasClass('fa-eye')) {
        $(this).children().removeClass('fa-eye');
        $(this).children().addClass('fa-eye-low-vision');
        $('#password').attr('type', 'text');
      } else {
        $(this).children().removeClass('fa-eye-low-vision');
        $(this).children().addClass('fa-eye');
        $('#password').attr('type', 'password');
      }
    });
  }

  $(document).ready(function() {
    eventClickLogin();
    eventEnterLogin();
    visualizarSenha();
  });
</script>