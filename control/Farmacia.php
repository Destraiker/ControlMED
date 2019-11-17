<?php
include __DIR__.'/../model/Farmacia.php';

class FarmaciaControl{
	function insert($obj){
		$farmacia = new Farmacia();
		//echo $obj->titulo;
		return $farmacia->insert($obj);
	}

	function update($obj,$cnpj){
		$farmacia = new Farmacia();
		return $farmacia->update($obj,$cnpj);
	}

	function delete($obj,$cnpj){
		$farmacia = new Farmacia();
		return $farmacia->delete($obj,$cnpj);
	}

	function find($cnpj = null){
		$farmacia = new Farmacia();
		return $farmacia->find($cnpj);
	}

	function findAll(){
		$farmacia = new Farmacia();
		return $farmacia->findAll();
	}
}

?>