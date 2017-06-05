<?php
session_start();

require_once dirname(__FILE__) . '/vendor/autoload.php';
require_once dirname(__FILE__) . '/ambiente/config.php';

/*
Connection with Eloquent ORM
*/

$capsule = new Illuminate\Database\Capsule\Manager;
$capsule->addConnection( $settings[$enviroment] );
$capsule->bootEloquent();

$config = new \Slim\Container();
/*
Config Slim Framework
*/
$config['settings']['displayErrorDetails'] = true;
$config['settings']['logger'] =  ['name' => 'cms-slim', 'path' => __DIR__ . '/logs/front.log'];
$config['settings']['debug'] = true;
$config['settings']['determineRouteBeforeAppMiddleware'] = true;
$config['notFoundHandler'] = function ($c) {
    return function ($request, $response) use ($c) {
        return $c['response']
            ->withHeader('Location', \Back\Helpers\Links::Front('404') );
    };
};


$app = new \Slim\App($config);

/*
ADD Flash Messages in Container
*/
$container = $app->getContainer();
$container['flash'] = function () {
    return new \Slim\Flash\Messages();
};


/*
Config midleware responsable for render view (html/php) - slim/php-view
*/
$container = $app->getContainer();
$container['view'] = function ($container) {
    return new \Slim\Views\PhpRenderer('./front/templates/');
};


/*
Loading route of the folder routes
*/

foreach( scandir(dirname(__FILE__).'/front/routes') as $file ){
    preg_match('/.*\.php$/', $file, $match);
    if( isset($match) && isset($match[0]) && $match[0] ){
        require_once 'front/routes/'.$match[0];
    }
}

/*
Page of error
*/
$app->get('/404[/]', function($request, $response, $args){
    $vars = array('titlePage' => 'Error', 'view' => 'error/404' );
    return $this->view->render($response, 'index.php', $vars);
});


/*
* RUN FOREST, RUN, JUST RUN!!
*/
$app->run();

?>
