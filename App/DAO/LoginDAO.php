<?php

class LoginDAO {

    private $conexao;
    
    public function __construct() {
        $dsn = 'mysql:host=db;dbname=database';
        $username = 'devuser';
        $password = 'devpass';

        try {
            $this->conexao = new PDO($dsn, $username, $password);
            $this->conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }

    }
    
    public function insert(LoginModel $model) {
        $sql = "INSERT INTO login (email, senha) VALUES (?, ?)";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $model->email);
        $stmt->bindValue(2, $model->senha);
        $stmt->execute();
        return $this->conexao->lastInsertId();
    }
    
    public function update(LoginModel $model) {
        $sql = "UPDATE login SET email = ?, senha = ? WHERE id = ?";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $model->email);
        $stmt->bindValue(3, $model->senha);
        $stmt->bindValue(3, $model->id);
        $stmt->execute();
    }
    
    public function delete(int $id) {
        $sql = "DELETE FROM login WHERE id = ?";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();
    }
    
    public function getById(int $id) {
        include_once 'Model/LoginModel.php';
        $sql = "SELECT * FROM login WHERE id = ?";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $stmt->fetchObject("LoginModel");
    }
    
    public function selectByEmail(string $email) {
        include_once 'Model/LoginModel.php';
        $sql = "SELECT * FROM login WHERE email = ?";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $email);
        $stmt->execute();
        return $stmt->fetchObject("LoginModel");
    }
    
}

