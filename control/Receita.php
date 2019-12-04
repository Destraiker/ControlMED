<?php
include __DIR__.'/../model/Receita.php';

class ReceitaControl{
	function insert($obj){
		$receita = new Receita();
		//echo $obj->titulo;
		return $receita->insert($obj);
	}

	function update($obj,$id_receita){
		$receita = new Receita();
		return $receita->update($obj,$id_receita);
	}

	function delete($obj,$id_receita){
		$receita = new Receita();
		return $receita->delete($obj,$id_receita);
	}

	function find($obj){
		$receita = new Receita();
		if(isset($obj->cpf)){
			return $receita->find_cpf($obj->cpf);
		}else if(isset($obj->crm)){
			return $receita->find_crm($obj->crm);
		}else{
			return null;
		}
	}

	function findAll(){
		$receita = new Receita();
		return $receita->findAll();
	}
}

?>