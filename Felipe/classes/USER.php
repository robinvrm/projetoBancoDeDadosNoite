<?php
class User
{
    public static function getUsers()
    {
        require_once '../classes/CONNECTION.php';

        return Connection::query("
            SELECT
                *
            FROM
                tb_users
            WHERE TRUE
                AND ativo != '2'
            ORDER BY
                ativo DESC, id_user
        ");
    }

    public static function logout()
    {
        session_destroy();
        header("location: ./login.php");
        exit();
    }

    public static function register($newUserName, $newUserLogin, $newUserPassword, $newUserBirthday)
    {
        require_once '../classes/CONNECTION.php';

        return Connection::query("
            INSERT INTO tb_users
            (
                nome,
                login,
                senha,
                ativo,
                data_nascimento
            )
            VALUES
            (
                '{$newUserName}',
                '{$newUserLogin}',
                '{$newUserPassword}',
                '1',
                '{$newUserBirthday}'
            )
        ");
    }

    public static function edit($updateUserName, $updateUserLogin, $updateUserPassword, $updateUserStatus, $updateUserBirthday, $userId)
    {
        require_once '../classes/CONNECTION.php';

        return Connection::query("
            UPDATE
                tb_users
            SET
                nome = '{$updateUserName}',
                login = '{$updateUserLogin}',
                senha = '{$updateUserPassword}',
                ativo = '{$updateUserStatus}',
                data_nascimento = '{$updateUserBirthday}'
            WHERE TRUE
                AND id = '{$userId}'
        ");
    }
}
?>