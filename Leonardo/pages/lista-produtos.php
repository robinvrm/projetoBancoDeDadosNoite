<?php require_once('../start/start.php'); ?>

<?php COMPONENTS::headerPage("lista produtos"); ?>

<hr>

<div id="mostrar-lista-produtos"></div>

<script>
  function buscarProdutos() {
    loaderPage('mostrar-lista-produtos');
    _loadPage('mostrar-lista-produtos', 'load-lista-produtos', {}, function() {
      $('#button-gen').removeAttr('disabled');
    });
  }

  $(document).ready(function() {
    buscarProdutos();
  });
</script>