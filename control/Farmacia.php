<?php
include __DIR__.'/../model/Farmacia.php';
use \Firebase\JWT\JWT;

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
	function login($obj){
		$farmacia = new Farmacia();	
		$cnpj_existe=$farmacia->cnpj_exists($obj->cnpj);
		
		if($cnpj_existe && $farmacia->verificarSenha($farmacia->getSenha(), $obj->senha)){
			return $this->gerar_jwt($farmacia);
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
				"cnpj" => $medico->getCnpj(),
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
