<?php

$app->get(PATH_ROUTE.'[/]', function($request, $response, $args) {

	$view = "home/index";

	$messages = $this->flash->getMessages();

	return $this->view->render($response, 'index.php', array("view" => $view, 'mensagem' => $messages));

});
