<?php

$app->get( '/login[/]', function($request, $response, $args) {

    $flashMessagens = $this->flash->getMessages();
    return $this->view->render($response, 'login.php' ,['flashMessagens' => $flashMessagens]);
});


$app->get('/logout[/]', function($request, $response, $args) {
    $_SESSION['logged'] = false;
    return $response->withStatus(406)->withHeader('Location', \Back\Helpers\Links::CMS('login') );
});

$app->post('/login[/]', function($request, $response, $args)  {



    $dados = $request->getParsedBody();

    $email = isset($dados['email']) ? $dados['email'] : false;
    $senha = isset($dados['password']) ? $dados['password'] : false;

    if( !$email || !$senha ){
        $this->flash->addMessage('error', 'Todos os campos são obrigatórios');
        $_SESSION['logged'] = false;
        return $response->withStatus(406)->withHeader('Location', \Back\Helpers\Links::CMS('login') );

    }else{


        $i = \Back\Models\Users::where('email', '=', $email)->get()->toArray();


        if( isset( $i[0]['email'] ) &&  $email ==  $i[0]['email'] ){

            $hash_bd = $i[0]['senha'];

            if(  \Back\Helpers\Bcrypt::check($senha, $hash_bd) ){
                $_SESSION['logged'] = true;

                if (isset($_SESSION['urlRedirect'])) {

                    $tmp = $_SESSION['urlRedirect'];
                    unset($_SESSION['urlRedirect']);

                    $this->redirect( \Back\Helpers\Links::CMS( $tmp ));
                    
                }else{
                    return $response->withStatus(301)->withHeader('Location', \Back\Helpers\Links::CMS('') );
                }

            }else{
                $this->flash->addMessage('error', 'Senha inválida');
                $_SESSION['logged'] = false;
                return $response->withStatus(406)->withHeader('Location', \Back\Helpers\Links::CMS('login') );
            }


        }else{
            $this->flash->addMessage('error', 'Usuario inválido');
            $_SESSION['logged'] = false;
            return $response->withStatus(406)->withHeader('Location', \Back\Helpers\Links::CMS('login') );
        }

    }



});
