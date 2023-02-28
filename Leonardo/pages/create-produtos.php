<?php require_once('../start/start.php'); ?>
<!DOCTYPE html>
<html lang="pt_br">

<body>
  <?php COMPONENTS::headerPage('cadastrar viagem'); ?>

  <div class="row justify-content-center">
    <div class="col-10">
      <div class="input-group mt-3">
        <input type="text" name="nome" id="nome-produto" placeholder="Nome" class="form-control form-control-lg">
      </div>
      <div class="input-group mt-3">
        <?php COMPONENTS::listaCategorias(); ?>
      </div>
      <button type="button" class="btn btn-outline-success btn-lg mt-3" id="create-produto">Cadastrar</button>
    </div>
  </div>
</body>

</html>

<script>
  function eventoCadastrarProduto() {
    $('#create-produto').off('click').on('click', function() {
      $('#create-produto').attr('disabled', 'disabled');

      let nomeProduto = $('#nome-produto').val();
      let categoria = $('#categoria').val();

      cadastrarProduto(nomeProduto, categoria);
    })
  }

  function cadastrarProduto(nomeProduto, categoria) {
    $.post("../post/acao-create-produto.php", {
      nomeProduto,
      categoria
    }, function(result) {
      if (result.trim() == 'OK') {
        Swal.fire(
          'Produto adicionado com sucesso!',
          '',
          'success'
        ).then((close) => {
          $('#create-produto').removeAttr('disabled');
          location.reload();
        });
      } else {
        Swal.fire(
          'Não foi possível adicionar o produto!',
          '',
          'danger'
        ).then((close) => {
          $('#create-produto').removeAttr('disabled');
        });
      }
    });
  }

  $(document).ready(function() {
    eventoCadastrarProduto();
  })
</script>