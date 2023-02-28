<?php require_once('../start/start.php'); ?>

<?php
$listaClientes = Users::getAllUsers();
?>

<?php if ($listaClientes) { ?>
  <table class="table table-sm table-bordered" id="lista-clientes">
    <thead class="text-uppercase bg-secondary text-white">
      <tr>
        <td class="align-middle text-left">nome</td>
        <td class="align-middle text-center">cpf</td>
        <td class="align-middle text-center">data nascimento</td>
        <td class="align-middle text-center">ação</td>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($listaClientes as $cliente) { ?>
        <?php $titleSitucaoCliente = ($cliente['ativo']) ? "Desativar cliente" : "Ativar cliente"; ?>
        <?php $corBotao = ($cliente['ativo']) ? "btn-danger" : "btn-success"; ?>
        <tr>
          <td class="align-middle text-left text-uppercase"><?php echo STRINGS::encode($cliente['nome']); ?></td>
          <td class="align-middle text-center"><?php echo ($cliente['cpf']) ? $cliente['cpf'] : "---"; ?></td>
          <td class="align-middle text-center"><?php echo ($cliente['nascimento']) ? DATES::mysql_to_date($cliente['nascimento']) : "//"; ?></td>
          <td class="align-middle text-center">
            <button class="btn btn-alterar-estado-cliente <?php echo $corBotao; ?>" data-cliente='<?php echo $cliente['id']; ?>' title="<?php echo $titleSitucaoCliente; ?>">
              <i class='<?php echo ($cliente['ativo']) ? "bx bx-minus" : "bx bx-plus"; ?>'></i>
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
  function alterarEstadoCliente(clienteId) {
    $.post("../post/acao-desativar-cliente.php", {
      clienteId
    }, function(result) {
      if (result.trim() == 'OK') {
        Swal.fire(
          'Atualizado estado de cliente!',
          '',
          'success'
        ).then((close) => {
          $('.btn-alterar-estado-cliente').removeAttr('disabled');
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

  function eventoAlterarEstadoCliente() {
    $('.btn-alterar-estado-cliente').off('click').on('click', function() {
      $('.btn-alterar-estado-cliente').attr('disabled', 'disabled');
      let clienteId = $(this).attr('data-cliente');

      alterarEstadoCliente(clienteId);
    });
  }

  $(document).ready(function() {
    eventoAlterarEstadoCliente();
    $('#lista-clientes').DataTable();
  })
</script>