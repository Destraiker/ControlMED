<?php

include __DIR__.'/../model/Medico.php';
use \Firebase\JWT\JWT;

class MedicoControl{
	function insert($obj){
		$medico = new Medico();
		//echo $obj->titulo;
		return $medico->insert($obj);
	}

	function update($obj,$crm){
		$medico = new Medico();
		return $medico->update($obj,$crm);
	}

	function delete($obj,$crm){
		$medico = new Medico();
		return $medico->delete($obj,$crm);
	}

	function find($crm = null){
		$medico = new Medico();
		return $medico->find($crm);
	}
	function findAll(){
		$medico = new Medico();
		return $medico->findAll();
	}
	function login($obj){
		$medico = new Medico();	
		$crm_existe=$medico->crm_exists($obj->crm);

		if($crm_existe && $medico->verificarSenha($medico->getSenha(), $obj->senha)){
			return $this->gerar_jwt($medico);
		}else{	 
			// tell the user login failed
			return json_encode(array("mensagem" => "Falha login."));
		}
	}
	function gerar_jwt($medico){
		include_once 'jwt_libs/core.php';
		include_once 'jwt_libs/BeforeValidException.php';
		include_once 'jwt_libs/ExpiredException.php';
		include_once 'jwt_libs/SignatureInvalidException.php';
		include_once 'jwt_libs/JWT.php';
		
		$token = array(
			"iss" => $iss,
			"aud" => $aud,
			"iat" => $iat,
			"nbf" => $nbf,
			"data" => array(
				"crm" => $medico->getCrm(),
				"nome" => $medico->getNome()
			)
		 );
	  
		 // set response code
		 http_response_code(200);
	  
		 // generate jwt
		 $jwt = JWT::encode($token, $key);
		 return json_encode(
				 array(
					 "mensagem" => "Sucesso login.",
					 "jwt" => $jwt
				 )
			 ); 
	 }
	}
?>