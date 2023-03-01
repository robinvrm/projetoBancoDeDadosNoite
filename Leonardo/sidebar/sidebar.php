<?php require_once('../start/start.php'); ?>
<?php
$userName = VALS::sessionG('user_name');
$typeUser = VALS::sessionG('user_type');
?>
<!DOCTYPE html>
<html>

<body>
  <div class="sidebar">
    <div class="logo-details">
      <i class='bx bx-menu'></i>
      <span class="logo-name text-uppercase">menu</span>
    </div>
    <ul class="nav-link">
      <?php include('../menu/include_menu/menu_users.php'); ?>
      <?php include('../menu/include_menu/menu_produtos.php'); ?>
      <?php include('../menu/include_menu/menu_categorias.php'); ?>
      <?php include('../menu/include_menu/menu_logout.php'); ?>
    </ul>
  </div>
</body>

</html>

<?php require_once('../start/end.php'); ?>