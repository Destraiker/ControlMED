<?php

include __DIR__ . '/Conexao.php';

class ClassName extends Conexao {

    Private $id_receita;
    Private $farmacia_cnpj;
    Private $medico_crm;
    Private $data_emicao;
    Private $vencimento;
    Private $descricao;
    Private $cpf_paciente;
    Private $status_receita;
    
    function getId_receita() {
        return $this->id_receita;
    }

    function getFarmacia_cnpj() {
        return $this->farmacia_cnpj;
    }

    function getMedico_crm() {
        return $this->medico_crm;
    }

    function getData_emicao() {
        return $this->data_emicao;
    }

    function getVencimento() {
        return $this->vencimento;
    }

    function getDescricao() {
        return $this->descricao;
    }

    function getCpf_paciente() {
        return $this->cpf_paciente;
    }

    function getStatus_receita() {
        return $this->status_receita;
    }

    function setId_receita($id_receita) {
        $this->id_receita = $id_receita;
    }

    function setFarmacia_cnpj($farmacia_cnpj) {
        $this->farmacia_cnpj = $farmacia_cnpj;
    }

    function setMedico_crm($medico_crm) {
        $this->medico_crm = $medico_crm;
    }

    function setData_emicao($data_emicao) {
        $this->data_emicao = $data_emicao;
    }

    function setVencimento($vencimento) {
        $this->vencimento = $vencimento;
    }

    function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    function setCpf_paciente($cpf_paciente) {
        $this->cpf_paciente = $cpf_paciente;
    }

    function setStatus_receita($status_receita) {
        $this->status_receita = $status_receita;
    }
    
    function insert($obj) {
        $sql = "INSERT INTO receita(farmacia_cnpj, medico_crm, data_emicao, vencimento, descricao, cpf_paciente, status_receita) VALUES (:farmacia_cnpj, :medico_crm, :data_emicao, :vencimento, :descricao, :cpf_paciente, :status_receita)";
        $consulta = Conexao::prepare($sql);
        $consulta->bindValue('farmacia_cnpj', null);
        $consulta->bindValue('medico_crm', $obj->medico_crm);
        $consulta->bindValue('data_emicao', date('d/m/Y'));
        $consulta->bindValue('vencimento', $obj->vencimento);
        $consulta->bindValue('descricao', $obj->descricao);
        $consulta->bindValue('cpf_paciente', $obj->cpf_paciente);
        $consulta->bindValue('status_receita', 1);
        return $consulta->execute();
    }

    function update($obj, $id_receita = null) {
        $sql = "UPDATE receita SET nome = :nome WHERE id_receita = :id_receita ";
        $consulta = Conexao::prepare($sql);
        $consulta->bindValue('nome', $obj->nome);
        $consulta->bindValue('id_receita', $id_receita);
        return $consulta->execute();
    }

    function delete($obj, $id_receita = null) {
        $sql = "DELETE FROM receita WHERE id_receita = :id_receita";
        $consulta = Conexao::prepare($sql);
        $consulta->bindValue('id_receita', $id_receita);
        $consulta->execute();
    }

    function find($id_receita = null) {
        $sql = "SELECT * FROM receita WHERE id_receita = :id_receita";
        $consulta = Conexao::prepare($sql);
        $consulta->bindValue('id_receita', $id_receita);
        $consulta->execute();
    }

    function findAll() {
        $sql = "SELECT * FROM receita";
        $consulta = Conexao::prepare($sql);
        $consulta->execute();
        return $consulta->fetchAll();
    }



}
