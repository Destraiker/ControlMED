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

	function find($id_receita = null){
		$receita = new Receita();
		return $receita->find($id_receita);
	}

	function findAll(){
		$receita = new Receita();
		return $receita->findAll();
	}
}

?>