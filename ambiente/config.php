<?php

switch ($_SERVER['HTTP_HOST']) {
	case 'dev.devurl.com':
	$enviroment = 'dev';
	break;

	case 'dev.devurl2.com.br':
	$enviroment = 'dev';
	break;

	default:
	$enviroment = 'prod';
	break;

}

$settings['prod']['driver']    = 'mysql';
$settings['prod']['host']      = 'production-host';
$settings['prod']['database']  = 'production-db';
$settings['prod']['username']  = 'production-user';
$settings['prod']['password']  = 'production-pass';
$settings['prod']['charset']   = 'utf8';
$settings['prod']['collation'] = 'utf8_unicode_ci';
$settings['prod']['prefix']    = '';


$settings['dev']['driver']    = 'mysql';
$settings['dev']['host']      = 'localhost';
$settings['dev']['database']  = 'dev_user';
$settings['dev']['username']  = 'root';
$settings['dev']['password']  = '';
$settings['dev']['charset']   = 'utf8';
$settings['dev']['collation'] = 'utf8_unicode_ci';
$settings['dev']['prefix']    = '';


define('ENV', $enviroment );

$arq = __DIR__ . '/config_' . ENV . '.php';

if (is_file($arq)){
	require_once $arq;
}else{
	error_reporting(E_ALL);
	ini_set('display_errors', true);

	define('PATH_ROUTE',  '' );
	define('HOST',  'http://productionurl.com.br');

	define('PATH_UPLOADS', realpath(dirname(__FILE__).'/../front/publicos/uploads/').'/' );
	define('VIEW_UPLOADS', HOST.'/front/publicos/uploads/' );
	// define('VIEW_UPLOADS', '' );
	
	define('VIEW_UPLOADS_USER', HOST.'/front/publicos/uploads/users/' );
	define('IMAGENS_URL', HOST.'/front/publicos/imagens/' );
	
	define('FONTS_URL', realpath(dirname(__FILE__).'/../front/publicos/estilos/fonts/').'/'  );


	define('IMG_REAL_URL', realpath(dirname(__FILE__).'/../front/publicos/imagens/').'/'  );
	

	define('BASE_URL_PUBLIC_ADMIN', HOST.'/cms/public/');

}
