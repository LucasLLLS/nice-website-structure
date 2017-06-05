<?php

use \Slim\App;

namespace Back\Helpers;

class Response {

    static function json( $error = true, $message = '', $data = array() ) {

        // $app               = \Slim\App::getInstance();
        // $response          = new stdClass();
        // $response->error   = $error;
        // $response->message = $message;
        // $response->data    = $data;
        //
        // $app->response()->header('Content-Type', 'application/json');
        // return $app->response()->body( json_encode($response) );

    }

    static function render( $error = false, $view = '', $title = '', $data = array() ){

    }


}
