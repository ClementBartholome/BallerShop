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
        // Vérifiez si la connexion a déjà été créée
        if (self::$bdd === null) {
            // Récupérez les paramètres de configuration de la base de données
            $dsn = Configuration::get("dsn");
            $login = Configuration::get("login");
            $password = Configuration::get("password");
            // Créez la connexion à la base de données
            self::$bdd = new PDO($dsn, $login, $password, 
                array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        }
        return self::$bdd;
    }
}
