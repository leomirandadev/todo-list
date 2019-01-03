<?php
namespace Routers;

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use Models\User;


//========================================================================================================
//                                              POST
//========================================================================================================

$app->post('/user/login', function (Request $request, Response $response, array $args) {
    $args = $request->getParams();
    // check if args are set
    if ( !isset($args['email']) || !isset($args['email']) ) {
        return json_encode( array( "ok" => false, "error" => "Alguns campos nao foram fornecidos" ) );
    }

    $user = new User( '', $args['email'], $args['password'] );
    $result = $user->login();
    
    return json_encode( array( "ok" => $result, "error" => $user->lastError ) );
});