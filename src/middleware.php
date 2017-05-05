<?php

use \Firebase\JWT\JWT;
use \Slim\Middleware\HttpBasicAuthentication\AuthenticatorInterface;

require '../vendor/autoload.php';

$app = new \Slim\App;

class RandomAuthenticator implements AuthenticatorInterface {
   public function __invoke(array $arguments) {
    //  return (bool)rand(0,1);
   
    
     $Password=$arguments['password'];
        $Phone=$arguments['user'];
if(($Password=="71110") &&($Phone=="0123") ){
return true;
}  
else{

    return false ;

    }
    
}}


$app->add(new \Slim\Middleware\HttpBasicAuthentication([
    "path" => "/api/token",
     "realm" => "Protected",
    "authenticator" => new RandomAuthenticator()

]));


$app->post("/api/token", function ($request, $response, $arguments) {

    $now = new DateTime();
    $future = new DateTime("now +2 minutes");
    $server = $request->getServerParams();

    $payload = [
        "iat" => $now->getTimeStamp(),
        "exp" => $future->getTimeStamp(),
        "sub" => $server["PHP_AUTH_USER"],
    ];
    $secret = "supersecretkeyyoushouldnotcommittogithub";
    $token = JWT::encode($payload, $secret, "HS512");
    $data["status"] = "ok";
    $data["token"] = $token;

    return $response->withStatus(201)
        ->withHeader("Content-Type", "application/json")
        ->write(json_encode($data, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT));
});

$app->add(new \Slim\Middleware\JwtAuthentication([
	 "path" => ["/"],
    "passthrough" => ["/api/token"],
    "secret" => "supersecretkeyyoushouldnotcommittogithub",
    "error" => function ($request, $response, $arguments) {
        $data["status"] = "error";
        $data["message"] = $arguments["message"];
        return $response
            ->withHeader("Content-Type", "application/json")
            ->write(json_encode($data, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT));
    }
]));