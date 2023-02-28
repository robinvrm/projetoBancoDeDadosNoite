<?php require_once('../start/start.php'); ?>

<?php COMPONENTS::headerPage("Lista usuários"); ?>

<hr>

<div id="mostrar-lista-cliente"></div>

<script>
  function buscarClientes() {
    loaderPage('mostrar-lista-cliente');
    _loadPage('mostrar-lista-cliente', 'load-lista-users', {}, function() {
      $('#button-gen').removeAttr('disabled');
    });
  }

  $(document).ready(function() {
    buscarClientes();
  });
</script>