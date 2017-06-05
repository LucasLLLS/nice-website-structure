<?php

session_start();

require_once dirname(__FILE__) . '/../vendor/autoload.php';
require_once dirname(__FILE__) . '/../ambiente/config.php';

/*
Connection with Eloquent ORM
*/

$capsule = new Illuminate\Database\Capsule\Manager;
$capsule->addConnection( $settings[$enviroment] );
$capsule->bootEloquent();


/*
Config Slim Framework
*/
$config['settings']['displayErrorDetails'] = true;
$config['settings']['logger'] =  ['name' => 'cms-slim', 'path' => __DIR__ . '/logs/cms.log'];
$config['settings']['debug'] = true;
$config['settings']['determineRouteBeforeAppMiddleware'] = true;
$config['settings']['notFoundHandler'] = function ($c) {
    /* Redirect for Page not founf 404 */
    return function ($request, $response) use ($c) {
        return $response->withStatus(404)->withHeader('Location', '404');
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
    return new \Slim\Views\PhpRenderer('templates/');
};


/*
Loading route of the folder routes
*/
foreach( scandir(dirname(__FILE__).'/routes') as $file ){
    preg_match('/.*\.php$/', $file, $match);
    if( isset($match) && isset($match[0]) && $match[0] ){
        require_once 'routes/'.$match[0];
    }
}

/*
Page of error
*/
$app->get('/404[/]', function($request, $response, $args){
    $vars = array('titlePage' => 'Error', 'view' => 'error/404' );
    return $this->view->render($response, '404.php', $vars);
});


/*
* RUN FOREST, RUN, JUST RUN!!
*/
$app->run();

?>
