<?php


$app->group('/teste', function() use ($app) {

	$app->get('[/]', function ($request, $response, $args) use($app) {
		$flashMessagens = $this->flash->getMessages();

		$path = "teste";
		$title = "<a href='". \Back\Helpers\Links::CMS($path)."'>Teste</a>";

		$items = \Back\Models\Teste::all();

		$vars = array('titlePage' => 'Dashboard', 'view' => $path.'/index', 'items' => $items, 'flashMessagens' => $flashMessagens );

		return $this->view->render($response, 'index.php', $vars );
	});


	$app->get('/new[/]', function ($request, $response, $args) use($app) {

		$path = "teste";
		$title = "<a href='". \Back\Helpers\Links::CMS($path)."'>Teste</a>";

		$vars = array('titlePage' => 'Dashboard', 'view' => $path.'/new', 'flashMessagens' => $flashMessagens );

		return $this->view->render($response, 'index.php', $vars );
	});


	$app->post('[/]', function ($request, $response, $args) use($app) {

		$path = "teste";
		$title = "<a href='". \Back\Helpers\Links::CMS($path)."'>Teste</a>";

		$dados = $request->getParsedBody();

		$teste = new \Back\Models\Teste;

		if($_FILES['imagem']['size'] > 0){

			$upFile = new \Back\Helpers\Upload( $_FILES['imagem'], PATH_UPLOADS  );

			$validaImagem = $upFile->valida();

			if( $validaImagem['error'] ){
				$app->response()->status(404);
				$app->flash('error_form', $validaImagem['msg'] );
				$app->redirect(  \Back\Helpers\Links::CMS( $path ));
			}else{

				$file = $upFile->envia();
				$teste->imagem = $file;
			}
		}

		$teste->titulo = $dados['titulo'];


		$teste->save();

		return $response->withStatus(404)->withHeader('Location',  \Back\Helpers\Links::CMS( $path ) );
	});


	// EDITA ARTIGOS
	$app->get('/edit/{id}[/]', function ($request, $response, $args) use($app) {

		$path = "teste";
		$flashMessagens = $this->flash->getMessages();


		$title = "<a href='". \Back\Helpers\Links::CMS($path)."'>Teste</a>";
		
		$id = isset($args['id']) && $args['id'] ? $args['id'] : false;
		$results = \Back\Models\Teste::find( $id );

		$vars = array('titlePage' => 'Dashboard', 'view' => $path.'/new', 'content' => $results, 'flashMessagens' => $flashMessagens );
		return $this->view->render($response, 'index.php', $vars );

	});


	$app->get('/delet/{id}[/]', function ($request, $response, $args) use($app) {

		$path = 'teste';
		$id = isset($args['id']) && $args['id'] ? $args['id'] : false;
		$teste = \Back\Models\Teste::find( $id );

		if(!is_null($img)){
			$upFile = new \Back\Helpers\Upload( false );

			$upFile->deleta( $img );

			$upFile->deleta( $img, PATH_UPLOADS );

		}

		$teste->delete();

		return $response->withStatus(404)->withHeader('Location',  \Back\Helpers\Links::CMS( $path ) );

	});


	$app->put('/{id}[/]', function($request, $response, $args){

		$path = "teste";

		$dados = $request->getParsedBody();

		$id = isset($args['id']) && $args['id'] ? $args['id'] : false;

		$teste = \Back\Models\Teste::find( $id );
		$current_img = $artigo->imagem;

		if($_FILES['imagem']['size'] > 0){


			$upFile = new  \Back\Helpers\Upload( $_FILES['imagem'], PATH_UPLOADS );

			$validaImagem =  $upFile->valida();


			if( $validaImagem['error'] ){
				$app->response()->status(404);
				$app->flash('error_form', $validaImagem['msg'] );
				$app->redirect(  \Back\Helpers\Links::CMS( $path ));
			}else{

				$file = $upFile->envia();
				$artigo->imagem = $file;

				if(!is_null($current_img)){
					$upFile->deleta( $current_img, PATH_UPLOADS );
				}
			}
		}

		$teste->titulo = $dados['titulo'];

		$teste->save();

		return $response->withStatus(404)->withHeader('Location', \Back\Helpers\Links::CMS( $path ) );

	});

})->add( new \Back\Middleware\Auth() );
