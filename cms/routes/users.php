<?php


$app->group( 'users', function() use ($app){

	$app->get('[/]', function() use ($app) {

		$items = array();
		$vars = array('titlePage' => "Usuários", 'view' => 'users/index', 'items' => $items );
		return $this->view->render($response, 'login.php', $vars);

	});


	$app->get('/new[/]', function() use ($app) {

		$vars = array('titlePage' => "Usuários", 'view' => 'users/new' );
		return $this->view->render($response, 'index.php', $vars);

	});

	$app->get('/edit/{id}[/]', function($id) use ($app) {

		$i = Model::factory('Users')->findOne($id);

		if( $i ){
			$vars = array('titlePage' => 'Home', 'view' => 'users/new', 'content' => $i );
				return $this->view->render($response, 'index.php', $vars);
		}else{
			$app->redirect(  \Back\Helpers\Links::CMS( 'users' ) );
		}

	});



	$app->post('/', function() use ($app) {
		// \Back\Helpers\Bcrypt::hash( $senha )
	});



	$app->put('/:id[/]', function($id) use ($app) {


	});


	$app->get('/delete/(:id)[/]', function($id) use ($app) {

	});


})->add( new \Back\Middleware\Auth() );
