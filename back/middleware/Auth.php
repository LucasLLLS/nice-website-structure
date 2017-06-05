<?php

namespace Back\Middleware;

class Auth {

    public function __invoke( $request, $response, $next ) {


        $isLogged = isset($_SESSION['logged'])? $_SESSION['logged'] : false;

        if ( !$isLogged ) {
            return $response->withRedirect( \Back\Helpers\Links::CMS('login'), 301 );
        }

        return $next($request, $response);
    }

}
