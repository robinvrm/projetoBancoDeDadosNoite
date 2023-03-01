<?php require_once('../start/start.php'); ?>

<?php COMPONENTS::headerPage("lista categorias"); ?>

<hr>

<div id="mostrar-lista-categorias"></div>

<script>
  function buscarClientes() {
    loaderPage('mostrar-lista-categorias');
    _loadPage('mostrar-lista-categorias', 'load-lista-categorias', {}, function() {
      $('#button-gen').removeAttr('disabled');
    });
  }

  $(document).ready(function() {
    buscarClientes();
  });
</script>