<?php require_once('../start/start.php'); ?>

<?php
$listaCategorias = Categorias::getAllCategorias();
?>

<?php if ($listaCategorias) { ?>
  <table class="table table-sm table-bordered" id="lista-clientes">
    <thead class="text-uppercase bg-secondary text-white">
      <tr>
        <td class="align-middle text-left">nome</td>
        <td class="align-middle text-center">data criação</td>
        <td class="align-middle text-center">ação</td>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($listaCategorias as $categoria) { ?>
        <?php $titleSitucaoCategoria = ($categoria['ativo']) ? "Desativar categoria" : "Ativar categoria"; ?>
        <?php $corBotao = ($categoria['ativo']) ? "btn-danger" : "btn-success"; ?>
        <tr>
          <td class="align-middle text-left text-uppercase"><?php echo STRINGS::encode($categoria['nome']); ?></td>
          <td class="align-middle text-center"><?php echo ($categoria['created_at']) ? DATES::mysql_to_date($categoria['created_at']) : "//"; ?></td>
          <td class="align-middle text-center">
            <button class="btn btn-alterar-estado-categoria <?php echo $corBotao; ?>" data-cliente='<?php echo $categoria['id']; ?>' title="<?php echo $titleSitucaoCategoria; ?>">
              <i class='<?php echo ($categoria['ativo']) ? "bx bx-minus" : "bx bx-plus"; ?>'></i>
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
  function alterarEstadoCategoria(categoriaId) {
    $.post("../post/acao-desativar-categoria.php", {
      categoriaId
    }, function(result) {
      if (result.trim() == 'OK') {
        Swal.fire(
          'Atualizado estado de cliente!',
          '',
          'success'
        ).then((close) => {
          $('.btn-alterar-estado-categoria').removeAttr('disabled');
          parent.buscarClientes();
        });
      } else {
        Swal.fire(
          'Não foi possível atualizar estado do cliente!',
          '',
          'warning'
        ).then((close) => {
          $('#create-user').removeAttr('disabled');
        });
      }
    });
  }

  function eventoAlterarEstadoCategoria() {
    $('.btn-alterar-estado-categoria').off('click').on('click', function() {
      $('.btn-alterar-estado-categoria').attr('disabled', 'disabled');
      let categoriaId = $(this).attr('data-cliente');

      alterarEstadoCategoria(categoriaId);
    });
  }

  $(document).ready(function() {
    eventoAlterarEstadoCategoria();
    $('#lista-clientes').DataTable();
  })
</script>