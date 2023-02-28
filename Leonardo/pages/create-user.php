<?php require_once('../start/start.php'); ?>
<!DOCTYPE html>
<html lang="pt_br">

<body>
  <?php COMPONENTS::headerPage('cadastrar usuario'); ?>

  <div class="row justify-content-center">
    <div class="col-10">
      <div class="input-group mt-3">
        <div class="input-group-text"><i class='bx bx-body'></i></div>
        <input type="text" name="name" id="name" placeholder="Nome" class="form-control form-control-lg">
      </div>
      <div class="input-group mt-3">
        <div class="input-group-text"><i class='bx bx-detail'></i></div>
        <input type="text" name="cpf" id="cpf" placeholder="CPF" class="form-control form-control-lg">
      </div>
      <div class="input-group mt-3">
        <div class="input-group-text"><i class='bx bxs-user'></i></div>
        <input type="text" name="login" id="login" placeholder="Login" class="form-control form-control-lg">
      </div>
      <div class="input-group mt-3">
        <div class="input-group-text"><i class='bx bxs-lock'></i></div>
        <input type="text" name="password" id="password" placeholder="Senha" class="form-control form-control-lg">
      </div>
      <div class="input-group mt-3">
        <div class="input-group-text"><i class='bx bxs-calendar'></i></div>
        <input type="text" name="birth-date" id="birth-date" placeholder="Data Nascimento" class="form-control form-control-lg cursor-pointer" data-date-format='d/m/Y'>
      </div>
      <button type="button" class="btn btn-outline-success btn-lg mt-3" id="create-user">Cadastrar</button>
    </div>
  </div>
</body>

</html>

<script>
  function createUser(nameUser, cpfUser, login, password, birthDateUser) {
    $.post("../post/acao-create-user.php", {
      nameUser,
      cpfUser,
      login,
      password,
      birthDateUser
    }, function(result) {
      if (result.trim() == 'OK') {
        Swal.fire(
          'Cadastro realizado com sucesso!',
          '',
          'success'
        ).then((close) => {
          $('#create-user').removeAttr('disabled');
          location.reload();
        });
      } else if (result.trim() == 'exist_user') {
        Swal.fire(
          'Usuário já cadastrado!',
          ''
        ).then((close) => {
          $('#create-user').removeAttr('disabled');
        });
      } else {
        Swal.fire(
          'Não foi possível realizar o cadastro!',
          '',
          'warning'
        ).then((close) => {
          $('#create-user').removeAttr('disabled');
        });
      }
    });
  }

  function actionCreateUser() {
    $('#create-user').off('click').on('click', function() {
      $('#create-user').attr('disabled', 'disabled');

      let nameUser = $('#name').val();
      let cpfUser = $('#cpf').val();
      let birthDateUser = $('#birth-date').val();
      let login = $('#login').val();
      let password = $('#password').val();

      createUser(nameUser, cpfUser, login, password, birthDateUser);
    });
  }

  function eventDate() {
    $('#birth-date').flatpickr({
      onClose: function() {
        $('#birth-date').val($('#birth-date').val());
        $('#birth-date').html('<span class=\'fas fa-calendar\'></span> ' + $('#birth-date').val());
      }
    });
  }

  $(document).ready(function() {
    actionCreateUser();
    eventDate();
    $('#birth-date').mask('00/00/0000');
    $('#phone').mask('00 00000-0000');
  })
</script>