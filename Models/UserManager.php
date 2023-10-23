<?php

class UserManager extends Model {

    public function userExists($username) {
        $sql = "SELECT * FROM users WHERE username = :username";
        $params = array(':username' => $username);
        $result = $this->executeRequest($sql, $params);
        return $result->rowCount() > 0;
    }

   
    public function createUser($username, $password, $email) {
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        $sql = "INSERT INTO users (username, password, email) VALUES (:username, :password, :email)";
        $params = array(':username' => $username, ':password' => $hashedPassword, ':email' => $email);
        $this->executeRequest($sql, $params);
    }


    public function checkUserCredentials($username, $password) {
        $sql = "SELECT * FROM users WHERE username = :username";
        $params = array(':username' => $username);
        $result = $this->executeRequest($sql, $params);
        if ($result->rowCount() === 1) {
            $userData = $result->fetch(PDO::FETCH_ASSOC);
            if (password_verify($password, $userData['password'])) {
                return true;
            }
        }
        return false;
    }

    public function getUserRole($username) {
        $sql = "SELECT role FROM users WHERE username = :username";
        $params = [':username' => $username];
        $result = $this->executeRequest($sql, $params);
        if ($result->rowCount() === 1) {
            $userData = $result->fetch(PDO::FETCH_ASSOC);
            return $userData['role'];
        }
        return null; 
    }

    public function getUserId($username) {
        $sql = "SELECT id FROM users WHERE username = :username";
        $params = [':username' => $username];
        $result = $this->executeRequest($sql, $params);
        if ($result->rowCount() === 1) {
            $userData = $result->fetch(PDO::FETCH_ASSOC);
            return $userData['id'];
        }
        return null;
    }
}
