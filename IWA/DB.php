<?php
namespace IWA;

use \PDO;

class DB
{
    private static function connect()
    {
        $host = "localhost";
        $user = "root";
        $pass = "";
        $db = "iwa_2019_zb_projekt";

        try {
            $connection = new PDO('mysql:host='.$host.';dbname='.$db.'', $user, $pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }

        return $connection;
    }

    public static function executeQuery($query, $attribtes = null)
    {
        $connection = self::connect();
        if ($connection) {
            $query = $connection->prepare($query);
            $query->execute($attribtes);
            self::close($connection);
        }
        return $query;
    }

    private static function close(&$connection)
    {
        $connection = null;
    }
}
