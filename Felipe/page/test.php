<?php require '../classes/USER.php'; ?>
<?php $usersData = USER::getUsers(); ?>
<?php
$i = 1;
foreach ($usersData AS $user) {
    $i++;
    echo $user['nome'] . $i . '<br>';
}

echo '<hr><hr><hr><hr><hr>';

$mysqli = new mysqli('localhost', 'root', '', 'projeto_cadastro');
$sql = "
    SELECT
        *
    FROM
        tb_users
    WHERE TRUE
        AND ativo != '2'
    ORDER BY
        ativo DESC, id_user
";
$query = $mysqli -> query($sql);

$j = 1;
foreach ($query AS $user) {
    $j++;
    echo $user['nome'] . $j . '<br>';
}
?>
<?php var_dump($usersData); die(); ?>