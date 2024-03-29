<?php
//define('PASTAPROJETO', 'AulaBanco');
define('PASTAPROJETO', 'ControlMED');
define('PASTAFRONT', 'ControlMED_FRONT');
define('RAIZ_FRONT', 'C:\xampp\htdocs');

define('HTMLMODELOP1', "<!DOCTYPE html><html lang='pt-br'><head>");
define('HTMLMODELOP2', "</head><body id='page-top'><div id='wrapper'>");
define('HTMLMODELOP3', "<div id='content-wrapper' class='d-flex flex-column'><div id='content'>");
define('HTMLMODELOP4', "</div>");
define('HTMLMODELOP5', "</div></div><a class='scroll-to-top rounded' href='#page-top'><i class='fas fa-angle-up'></i></a>");
define('HTMLMODELOP6', "</body></html>");

/* Função criada para retornar o tipo de requisição */
function checkRequest()
{
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
http: //localhost:8080/PhpBackEnd
//echo $request;

// IDENTIFICA A URI DA REQUISIÇÃO


switch ($request) {
	case '/' . PASTAPROJETO . '/medico/receitas':
		require __DIR__ . '/api/get_receita.php';
		break;
	case '/' . PASTAPROJETO . '/medico/emitir_receita':
		require __DIR__ . '/api/post_receita.php';
		break;
	case '/' . PASTAPROJETO . '/medico/cadastrar':
		require __DIR__ . '/api/post_medico.php';
		break;
	case '/' . PASTAPROJETO . '/medico/login':
		require __DIR__ . '/api/login_medico.php';
		break;
	case '/' . PASTAPROJETO . '/farmarcia/cadastrar':
		require __DIR__ . '/api/post_farmarcia.php';
		break;
	case '/' . PASTAPROJETO . '/farmarcia/login':
		require __DIR__ . '/api/login_farmarcia.php';
		break;
	case '/' . PASTAPROJETO . '/farmacia/receitas_cpf':
		require __DIR__ . '/api/get_receita.php';
		break;
	case '/' . PASTAPROJETO . '/farmacia/receitas_cnpj':
		require __DIR__ . '/api/get_receita.php';
		break;
	case '/' . PASTAPROJETO . '/api/validar':
		require __DIR__ . '/api/validar_token.php';
		break;
	case '/' . PASTAPROJETO . '/':
		require __DIR__ . '/api/api.php';
		break;
	default:

		break;
}
