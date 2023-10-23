<?php

require_once 'Config/config.php';

abstract class Model {
    private static $bdd;

    protected function executeRequest(string $sql, ?array $params = null): PDOStatement {
        if ($params === null) {
            $result = self::getBdd()->query($sql);
        } else {
            $result = self::getBdd()->prepare($sql);
            $result->execute($params);
        }
        return $result;
    }

    private static function getBdd(): PDO {
        // Check if the connection to the database has already been established
        if (self::$bdd === null) {
            // Get the connection settings from the configuration file
            $dsn = Configuration::get("dsn");
            $login = Configuration::get("login");
            $password = Configuration::get("password");
            // Create a connection to the database
            self::$bdd = new PDO($dsn, $login, $password, 
                array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        }
        return self::$bdd;
    }
}
