<?php require_once('../start/start.php'); ?>
<?php
$userId = VALS::sessionG('user_id');
$userName = VALS::sessionG('user_name');

if (!$userId) {
  header('Location: ../index.php');
  exit;
}
?>

<body class="cor-fundo-principal">
  <?php include('../sidebar/sidebar.php'); ?>

  <div class="row justify-content-center">
    <div class="col-7">
      <div id="mostrar_conteudo"></div>
    </div>
  </div>
</body>

<script type="text/javascript" src="../styles/script_style.js"></script>
<script>
  function openPage() {
    $('.page-link').off('click').on('click', function() {
      const pageLink = $(this).attr('page-link');

      $("#mostrar_conteudo").load(pageLink);
    });
  }

  function logout() {
    $("#logout").click(function() {
      $.post("../login/logout.php", function(result) {
        if (result) {
          window.location.href = "../index.php";
        }
      });
    });
  }

  $(document).ready(function() {
    openPage();
    logout();
  });
</script>