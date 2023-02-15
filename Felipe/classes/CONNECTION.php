<?php
class Connection
{
    public static function query($sql)
    {
        require_once '../connection/conn.php';

        $query = $mysqli -> query($sql);

        return $query;
    }
}
?>