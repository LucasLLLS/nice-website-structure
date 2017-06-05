<?php

	
$app->group('/', function() use ($app) {

	$app->get('[/]', function ($request, $response, $args) use($app) {
		$flashMessagens = $this->flash->getMessages();

		$path = "teste";
		$title = "<a href='". \Back\Helpers\Links::CMS($path)."'>Teste</a>";

		$items = \Back\Models\Teste::all();

		$vars = array('titlePage' => 'Dashboard', 'view' => $path.'/index', 'items' => $items, 'flashMessagens' => $flashMessagens );

		return $this->view->render($response, 'index.php', $vars );
	});

})->add( new \Back\Middleware\Auth() );
