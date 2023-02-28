<?php require_once('../start/start.php'); ?>

<?php
$listaProdutos = Produtos::getAllProdutos();
?>

<?php if ($listaProdutos) { ?>
  <table class="table table-sm table-bordered" id="lista-clientes">
    <thead class="text-uppercase bg-secondary text-white">
      <tr>
        <td class="align-middle text-left">nome</td>
        <td class="align-middle text-left">categoria</td>
        <td class="align-middle text-center">data criação</td>
        <td class="align-middle text-center">ação</td>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($listaProdutos as $produto) { ?>
        <?php $titleSitucaoProduto = ($produto['ativo']) ? "Desativar categoria" : "Ativar categoria"; ?>
        <?php $corBotao = ($produto['ativo']) ? "btn-danger" : "btn-success"; ?>
        <tr>
          <td class="align-middle text-left text-uppercase"><?php echo STRINGS::encode($produto['nome']); ?></td>
          <td class="align-middle text-left text-uppercase"><?php echo STRINGS::encode($produto['nome_categoria']); ?></td>
          <td class="align-middle text-center"><?php echo ($produto['created_at']) ? DATES::mysql_to_date($produto['created_at']) : "//"; ?></td>
          <td class="align-middle text-center">
            <button class="btn btn-alterar-estado-produto <?php echo $corBotao; ?>" data-produto='<?php echo $produto['id']; ?>' title="<?php echo $titleSitucaoProduto; ?>">
              <i class='<?php echo ($produto['ativo']) ? "bx bx-minus" : "bx bx-plus"; ?>'></i>
            </button>
          </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
<?php } else { ?>
  <?php COMPONENTS::alert('Sem dados'); ?>
<?php } ?>

<script>
  function alterarEstadoCategoria(produtoId) {
    $.post("../post/acao-desativar-produto.php", {
      produtoId
    }, function(result) {
      if (result.trim() == 'OK') {
        Swal.fire(
          'Atualizado estado do produto!',
          '',
          'success'
        ).then((close) => {
          $('.btn-alterar-estado-produto').removeAttr('disabled');
          parent.buscarProdutos();
        });
      } else {
        Swal.fire(
          'Não foi possível atualizar estado do produto!',
          '',
          'warning'
        ).then((close) => {
          $('#create-user').removeAttr('disabled');
        });
      }
    });
  }

  function eventoAlterarEstadoCategoria() {
    $('.btn-alterar-estado-produto').off('click').on('click', function() {
      $('.btn-alterar-estado-produto').attr('disabled', 'disabled');
      let produtoId = $(this).attr('data-produto');

      alterarEstadoCategoria(produtoId);
    });
  }

  $(document).ready(function() {
    eventoAlterarEstadoCategoria();
    $('#lista-clientes').DataTable();
  })
</script>