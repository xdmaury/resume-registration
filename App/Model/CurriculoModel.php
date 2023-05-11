<?php

class CurriculoModel {

    public $id, $usuario_id, $pretensao_salarial, $data_registro, $cursos, $experiencias;
    public $rows;

    public function save(){
        include 'DAO/CurriculoDAO.php';
        $dao = new CurriculoDAO();

        if (empty($this->id)) {
            $dao->insert($this);
        } else {
            $dao->update($this);
        }
    }
}