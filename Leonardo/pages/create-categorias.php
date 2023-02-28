<?php require_once('../start/start.php'); ?>
<!DOCTYPE html>
<html lang="pt_br">

<body>
  <?php COMPONENTS::headerPage('cadastrar categoria'); ?>

  <div class="row justify-content-center">
    <div class="col-10">
      <div class="input-group mt-3">
        <div class="input-group-text"><i class='bx bxs-category'></i></div>
        <input type="text" name="name" id="name" placeholder="Nome" class="form-control form-control-lg">
      </div>
      <button type="button" class="btn btn-outline-success btn-lg mt-3" id="create-categorias">Cadastrar</button>
    </div>
  </div>
</body>

</html>

<script>
  function createUser(nameCategoria) {
    $.post("../post/acao-create-categorias.php", {
      nameCategoria
    }, function(result) {
      if (result.trim() == 'OK') {
        Swal.fire(
          'Cadastro realizado com sucesso!',
          '',
          'success'
        ).then((close) => {
          $('#create-categorias').removeAttr('disabled');
          location.reload();
        });
      } else if (result.trim() == 'exist') {
        Swal.fire(
          'Categoria já cadastrado!',
          ''
        ).then((close) => {
          $('#create-categorias').removeAttr('disabled');
        });
      } else {
        Swal.fire(
          'Não foi possível realizar o cadastro!',
          '',
          'warning'
        ).then((close) => {
          $('#create-categorias').removeAttr('disabled');
        });
      }
    });
  }

  function actionCreateUser() {
    $('#create-categorias').off('click').on('click', function() {
      $('#create-categorias').attr('disabled', 'disabled');

      let nameCategoria = $('#name').val();

      createUser(nameCategoria);
    });
  }

  $(document).ready(function() {
    actionCreateUser();
  })
</script>