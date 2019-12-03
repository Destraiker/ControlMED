<?php
//define('PASTAPROJETO', 'AulaBanco');
define('PASTAPROJETO', 'ControlMED');
define('PASTAFRONT', 'view');
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
	case '/' . PASTAPROJETO . '/':
		require __DIR__ . '/api/api.php';
		break;
	case '':
		require __DIR__ . '/api/api.php';
		break;
	case '/' . PASTAPROJETO . '/medico':
		require __DIR__ . '/api/' . $answer . '_medico.php';
		break;
	case '/' . PASTAPROJETO . '/farmacia':
		require __DIR__ . '/api/' . $answer . '_farmacia.php';
		break;
	case '/' . PASTAPROJETO . '/receita':
		require __DIR__ . '/api/' . $answer . '_receita.php';
		break;
	case '/' . PASTAPROJETO . '/' . PASTAFRONT . '/medico/inicio':
		echo HTMLMODELOP1;
		echo "<title>ControlMED | Medico | Inicio</title>";
		require __DIR__ . '/' . PASTAFRONT . '/medico/head.html';
		echo HTMLMODELOP2;
		require __DIR__ . '/' . PASTAFRONT . '/medico/menu.html';
		echo HTMLMODELOP3;
		require __DIR__ . '/' . PASTAFRONT . '/medico/cabecalho.html';
		require __DIR__ . '/' . PASTAFRONT . '/medico/inicio.html';
		echo HTMLMODELOP4;
		require __DIR__ . '/' . PASTAFRONT . '/medico/rodape.html';
		echo HTMLMODELOP5;
		require __DIR__ . '\\' . PASTAFRONT . '\\medico\\modals.html';
		require __DIR__ . '\\' . PASTAFRONT . '\\medico\\scripts.html';
		echo HTMLMODELOP6;
		break;
	case '/' . PASTAPROJETO . '/' . PASTAFRONT . '/medico/receitas':
		echo HTMLMODELOP1;
		echo "<title>ControlMED | Medico | Receitas</title>";
		require __DIR__ . '/' . PASTAFRONT . '/medico/head.html';
		echo "<link href='../vendor/datatables/dataTables.bootstrap4.min.css' rel='stylesheet'>";
		echo HTMLMODELOP2;
		require __DIR__ . '/' . PASTAFRONT . '/medico/menu.html';
		echo HTMLMODELOP3;
		require __DIR__ . '/' . PASTAFRONT . '/medico/cabecalho.html';
		require __DIR__ . '/' . PASTAFRONT . '/medico/listar_receitas.html';
		echo HTMLMODELOP4;
		require __DIR__ . '/' . PASTAFRONT . '/medico/rodape.html';
		echo HTMLMODELOP5;
		require __DIR__ . '\\' . PASTAFRONT . '\\medico\\modals.html';
		require __DIR__ . '\\' . PASTAFRONT . '\\medico\\scripts.html';
		echo "<script src='../vendor/datatables/jquery.dataTables.min.js'></script><script src='../vendor/datatables/dataTables.bootstrap4.min.js'></script><script src='../js/controlmed.js'></script>";
		echo HTMLMODELOP6;
		break;
	case '/' . PASTAPROJETO . '/' . PASTAFRONT . '/medico/login':
		echo HTMLMODELOP1;
		echo "<title>ControlMED | Medico | Login</title>";
		require __DIR__ . '/' . PASTAFRONT . '/medico/head.html';
		echo "</head><body class='bg-gradient-primary'>";
		require __DIR__ . '/' . PASTAFRONT . '/medico/login.html';
		require __DIR__ . '\\' . PASTAFRONT . '\\medico\\scripts.html';
		echo HTMLMODELOP6;
		break;

	default:
		echo HTMLMODELOP1;
		echo "<title>ControlMED | 404</title>";
		require __DIR__ . '/' . PASTAFRONT . '/medico/head.html';
		echo "</head><body id='page-top'><div id='wrapper' style='height: 100%;position: absolute;width: 100%;'>";
		echo HTMLMODELOP3;
		require __DIR__ . '/' . PASTAFRONT . '/404.html';
		echo HTMLMODELOP4;
		echo HTMLMODELOP4 . HTMLMODELOP4;
		require __DIR__ . '\\' . PASTAFRONT . '\\medico\\scripts.html';
		echo HTMLMODELOP6;
		break;
}
