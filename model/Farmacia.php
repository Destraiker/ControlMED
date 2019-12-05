<?php

include __DIR__ . '/Conexao.php';

class Farmacia extends Conexao {

    Private $Cnpj;
    Private $Nome;
    Private $Senha;
    
    function getSenha() {
        return $this->Senha;
    }

    function setSenha($senha) {
        $this->Senha = $senha;
    }
    function getCnpj() {
        return $this->Cnpj;
    }

    function getNome() {
        return $this->Nome;
    }

    function setCnpj($Cnpj) {
        $this->Cnpj = $Cnpj;
    }

    function setNome($Nome) {
        $this->Nome = $Nome;
    }

    function insert($obj) {
        $sql = "INSERT INTO farmacia(cnpj,nome,senha) VALUES (:cnpj,:nome,:senha)";
        $consulta = Conexao::prepare($sql);
        $consulta->bindValue('cnpj', $obj->cnpj);
        $consulta->bindValue('nome', $obj->nome);
        $consulta->bindValue('senha', $this->gerarHashSenha($obj->senha));
        return $consulta->execute();
    }

    function update($obj, $cnpj = null) {
        $sql = "UPDATE farmacia SET nome = :nome WHERE cnpj = :cnpj ";
        $consulta = Conexao::prepare($sql);
        $consulta->bindValue('nome', $obj->nome);
        $consulta->bindValue('cnpj', $cnpj);
        return $consulta->execute();
    }

    function delete($obj, $cnpj = null) {
        $sql = "DELETE FROM farmacia WHERE cnpj = :cnpj";
        $consulta = Conexao::prepare($sql);
        $consulta->bindValue('cnpj', $cnpj);
        $consulta->execute();
    }

    function find($cnpj = null) {
        $sql = "SELECT * FROM farmacia WHERE cnpj = :cnpj";
        $consulta = Conexao::prepare($sql);
        $consulta->bindValue('cnpj', $cnpj);
        $consulta->execute();
    }

    function findAll() {
        $sql = "SELECT * FROM farmacia";
        $consulta = Conexao::prepare($sql);
        $consulta->execute();
        return $consulta->fetchAll();
    }
    function cnpj_exists($cnpj = null)
    {
        $sql = "SELECT * FROM farmacia WHERE cnpj = :cnpj";
        $consulta = Conexao::prepare($sql);
        $consulta->bindValue('cnpj', $cnpj);
        $consulta->execute();
        if ($consulta->rowCount() > 0) {
            // get record details / values
            $row = $consulta->fetch(PDO::FETCH_ASSOC);

            // assign values to object properties
            $this->Cnpj = $row['cnpj'];
            $this->Nome = $row['nome'];
            $this->Senha = $row['senha'];

            return true;
        } else {
            return false;
        }
    }
    function gerarHashSenha($senha){
        return password_hash($senha, PASSWORD_DEFAULT);;
    }
    function verificarSenha($hash,$senha){
        return password_verify($senha, $hash);
    }

}
