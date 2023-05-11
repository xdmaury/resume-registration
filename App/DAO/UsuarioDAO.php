<?php

class UsuarioDAO {

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
    
    public function insert(UsuarioModel $model) {
        $sql = "INSERT INTO usuarios (login_id, nome, cpf, data_nascimento, sexo, estado_civil, escolaridade) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $model->login_id);
        $stmt->bindValue(2, $model->nome);
        $stmt->bindValue(3, $model->cpf);
        $stmt->bindValue(4, $model->data_nascimento);
        $stmt->bindValue(5, $model->sexo);
        $stmt->bindValue(6, $model->estado_civil);
        $stmt->bindValue(7, $model->escolaridade);
        $stmt->execute();
        
    }
    
    public function update(UsuarioModel $model) {
        $sql = "UPDATE usuarios SET login_id = ?, nome = ?, cpf = ?, data_nascimento = ?, sexo = ?, estado_civil = ?, escolaridade = ? WHERE id = ?";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $model->login_id);
        $stmt->bindValue(2, $model->nome);
        $stmt->bindValue(3, $model->cpf);
        $stmt->bindValue(4, $model->data_nascimento);
        $stmt->bindValue(5, $model->sexo);
        $stmt->bindValue(6, $model->estado_civil);
        $stmt->bindValue(7, $model->escolaridade);
        $stmt->bindValue(8, $model->id);
        $stmt->execute();
    }
    
    public function delete(int $id) {
        $sql = "DELETE FROM usuarios WHERE id = ?";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();
    }

    public function select(){
        $sql = "SELECT * FROM usuarios";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS);        
    }

    public function selectById(int $id) {
        include_once 'Model/UsuarioModel.php';
        $sql = "SELECT * FROM usuarios WHERE id = ?";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $stmt->fetchObject("UsuarioModel");
    }
    
    public function selectByLoginId(int $login_id) {
        include_once 'Model/UsuarioModel.php';
        $sql = "SELECT * FROM usuarios WHERE login_id = ?";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $login_id);
        $stmt->execute();
        return $stmt->fetchObject("UsuarioModel");
    }
    
}

