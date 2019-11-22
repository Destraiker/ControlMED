<?php
//define('PASTAPROJETO', 'AulaBanco');
define('PASTAPROJETO', 'ControlMED');

/* Função criada para retornar o tipo de requisição */
function checkRequest() {
	$method = $_SERVER['REQUEST_METHOD'];
	switch ($method) {
	  case 'PUT':
	  	$answer = "update";
	    break;
	  case 'POST':	  
	  	$answer = "post";
	    break;
	  case 'GET':
	  	$answer = "get";
	    break;
	  case 'DELETE':
	  	$answer = "delete";
	    break;	
	  default:
	    handle_error($method);  
	    break;
	}
	return $answer;
}

$answer = checkRequest();

$request = $_SERVER['REQUEST_URI']; 
http://localhost:8080/PhpBackEnd
//echo $request;

// IDENTIFICA A URI DA REQUISIÇÃO


switch ($request) {
    case '/'.PASTAPROJETO.'/' :
        require __DIR__ . '/api/api.php';
        break;
    case '' :
        require __DIR__ . '/api/api.php';
        break;
    case '/'.PASTAPROJETO.'/medico' :
        require __DIR__ . '/api/'.$answer.'_medico.php';
        break;
    case '/'.PASTAPROJETO.'/farmacia' :
        require __DIR__ . '/api/'.$answer.'_farmacia.php';
        break;
		case '/'.PASTAPROJETO.'/receita' :
        require __DIR__ . '/api/'.$answer.'_receita.php';
        break;
    
    default:
        //require __DIR__ . '/api/404.php';
        break;
}