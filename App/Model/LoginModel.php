<?php

class LoginModel
{
    public $id, $email, $senha;
    public $rows;

    public function save()
    {
        include 'DAO/LoginDAO.php';
        $dao = new LoginDAO();

        if (empty($this->id)) {
            $dao->insert($this);
        } else {
            $dao->update($this);
        }
    }

    public function getAllRows()
    {
        include 'DAO/LoginDAO.php';
        $dao = new LoginDAO();
        $this->rows = $dao->select();
    }

    public function getById(int $id)
    {
        include 'DAO/LoginDAO.php';
        $dao = new LoginDAO();
        $obj = $dao->selectById($id);
        return ($obj) ? $obj : new LoginModel();
    }

    public function delete(int $id)
    {
        include 'DAO/LoginDAO.php';
        $dao = new LoginDAO();
        $dao->delete($id);
    }
}
