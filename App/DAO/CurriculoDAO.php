<?php

class CurriculoDAO {

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

    public function insert(CurriculoModel $model) {
        try {
            $sql = "INSERT INTO curriculos (usuario_id, pretensao_salarial) VALUES (?, ?)";
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(1, $model->usuario_id);
            $stmt->bindValue(2, $model->pretensao_salarial);
            $stmt->bindValue(3, $model->data_registro);
            $stmt->execute();
            $curriculoId = $conexao->lastInsertId();

            
            foreach ($model->cursos as $curso) {
                $stmt = $conexao->prepare("INSERT INTO cursos_especializacoes (nome, instituicao, data_inicio, data_conclusao) VALUES (?, ?, ?, ?)");
                $stmt->bindValue(1, ["nome"]);
                $stmt->bindValue(2, ["instituicao"]);
                $stmt->bindValue(3, ["dataInicio"]);
                $stmt->bindValue(4, ["dataConclusao"]);
                $stmt->execute();
                $cursoId = $conexao->lastInsertId();
                
                $stmt = $conexao->prepare("INSERT INTO curriculos_cursos (curriculo_id, curso_id) VALUES (?, ?)");
                $stmt->bindValue(1, $curriculoId);
                $stmt->bindValue(2, $cursoId);
                $stmt->execute();
            }
            
            foreach ($model->experiencias as $experiencia) {
                $stmt = $conexao->prepare("INSERT INTO experiencias_profissionais (cargo, empresa, data_inicio, data_saida, descricao) VALUES (?, ?, ?, ?, ?)");
                $stmt->bindValue(1, ["cargo"]);
                $stmt->bindValue(2, ["empresa"]);
                $stmt->bindValue(3, ["dataInicio"]);
                $stmt->bindValue(4, ["dataSaida"]);
                $stmt->bindValue(5, ["descricao"]);
                $stmt->execute();
                $experienciaId = $conexao->lastInsertId();
                
                $stmt = $conexao->prepare("INSERT INTO curriculos_experiencias (curriculo_id, experiencia_id) VALUES (?, ?)");
                $stmt->bindValue(1, $curriculoId);
                $stmt->bindValue(2, $experienciaId);
                $stmt->execute();
            }
            
            return $curriculoId;
        } catch (PDOException $e) {
            echo "Erro ao inserir currículo: " . $e->getMessage();
        }
    }

    public function update(CurriculoModel $curriculo){
        $query = "UPDATE curriculos SET usuario_id = :usuario_id, pretensao_salarial = :pretensao_salarial WHERE id = :id";

        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(":usuario_id", $curriculo->getUsuarioId());
        $stmt->bindValue(":pretensao_salarial", $curriculo->getPretensaoSalarial());
        $stmt->bindValue(":id", $curriculo->getId());

        if ($stmt->execute()) {
            // Deleta os cursos associados ao currículo
            $this->deleteCursos($curriculo->getId());
            
            // Deleta as experiências associadas ao currículo
            $this->deleteExperiencias($curriculo->getId());

            // Insere novamente as informações de cursos
            foreach ($curriculo->getCursos() as $curso) {
                $this->insertCurso($curriculo->getId(), $curso->getId());
            }

            // Insere novamente as informações de experiências profissionais
            foreach ($curriculo->getExperiencias() as $experiencia) {
                $this->insertExperiencia($curriculo->getId(), $experiencia->getId());
            }

            return true;
        }

        return false;
    }


    /*
    public function insert(CurriculoModel $model) {
        $sql = "INSERT INTO curriculos (usuario_id, pretensao_salarial) VALUES (?, ?)";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $model->usuario_id);
        $stmt->bindValue(2, $model->pretensao_salarial);
        $stmt->execute();

        $model->id = $this->conexao->lastInsertId();
    }

    public function addExperiencia(int $curriculoId, int $experienciaId) {
        $sql = "INSERT INTO curriculos_experiencias (curriculo_id, experiencia_id) VALUES (?, ?)";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $curriculoId);
        $stmt->bindValue(2, $experienciaId);
        $stmt->execute();
    }

    public function removeExperiencia(int $curriculoId, int $experienciaId) {
        $sql = "DELETE FROM curriculos_experiencias WHERE curriculo_id = ? AND experiencia_id = ?";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $curriculoId);
        $stmt->bindValue(2, $experienciaId);
        $stmt->execute();
    }
    
    
    public function update(CurriculoModel $model) {
        $sql = "UPDATE curriculos SET usuario_id = ?, pretensao_salarial = ? WHERE id = ?";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $model->usuario_id);
        $stmt->bindValue(2, $model->pretensao_salarial);
        $stmt->bindValue(3, $model->id);
        $stmt->execute();
    }
    
    public function delete(int $id) {
        $sql = "DELETE FROM curriculos WHERE id = ?";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();
    }

    public function select(){
        $sql = "SELECT * FROM curriculos";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS);        
    }

    public function selectById(int $id) {
        include_once 'Model/CurriculoModel.php';
        $sql = "SELECT * FROM curriculos WHERE id = ?";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $stmt->fetchObject("CurriculoModel");
    }
    
    public function selectByUsuarioId(int $usuario_id) {
        include_once 'Model/CurriculoModel.php';
        $sql = "SELECT * FROM curriculos WHERE usuario_id = ?";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $usuario_id);
        $stmt->execute();
        return $stmt->fetchObject("CurriculoModel");
    }
    */
    
}