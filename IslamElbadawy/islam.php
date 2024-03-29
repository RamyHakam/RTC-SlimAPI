<?php

use \Firebase\JWT\JWT;
use \Slim\Middleware\HttpBasicAuthentication\AuthenticatorInterface;

$app = new \slim\App;


class islamAuthenticator implements AuthenticatorInterface{
	public function __invoke(array $arguments){
		$user = $arguments['user'];
		$Password = $arguments['password'];
		if(($user=="islam") &&($Password== "01157568599")){
			return true;
		}
		else{
			return false;
		}
	}
}


$app->add(new \slim\Middleware\HttpBasicAuthentication([
	"path" => "/islam/api/token",
	"realm" => "protected",
	"authenticator" => new islamAuthenticator()
]));

$app->post("/islam/api/token", function($req,$res,$args){
	$now = new DateTime();
	$future = new DateTime("now +2 minutes");
	$server = $req->getServerParams();

	$payload = [
        "iat" => $now->getTimeStamp(),
        "exp" => $future->getTimeStamp(),
        "sub" => $server["PHP_AUTH_USER"],
    ];
    $secret = "supersecretkeyyoushouldnotcommittogithub";
    $token = JWT::encode($payload, $secret, "HS512");
    $data["status"] = "ok";
    $data["token"] = $token;

    return $res->withStatus(201)
        ->withHeader("Content-Type", "application/json")
        ->write(json_encode($data, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT));
});


$app->add(new \Slim\Middleware\JwtAuthentication([
	 "path" => ["/"],
    "passthrough" => ["/islam/api/token"],
    "secret" => "supersecretkeyyoushouldnotcommittogithub",
    "error" => function ($request, $response, $arguments) {
        $data["status"] = "error";
        $data["message"] = $arguments["message"];
        return $response
            ->withHeader("Content-Type", "application/json")
            ->write(json_encode($data, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT));
    }
]));


// Routes




//sign up route

$app->post('/islam/signup',function($req, $res){
	//define variables

$data = $req->getParsedBody();

$Name = $data['Name'];
$Email = $data['Email'];
$Password = $data['Password'];
if ($Name = ''){
	return $res->withJson('Your Name Is Missing', 404);
}
elseif($Email = ''){
	return $res->withJson('Your Email Is Missing', 404);
}

elseif($Password = ''){
	return $res->withJson('Your Password Is Missing', 404);
}
else {
	return $res->withJson('Your have signed up', 200);
}
	
	
});




// login route 

$app->get('/islam/login/{Name}/{Password}',function($req, $res, $args){

	if($Name == 'islam' && $Password == '01157568599'){
		return $res->withJson('You hav logged in', 200);
	}

	else {
		return $res->withJson('Name or Password is not correct', 404);
	}


});



//forget password


$app->get('/islam/forgetPassword/{Email}',function($req, $res, $args){

	$Email = $args['Email'];
	$message = array('Your Name is ' => 'islam','Your Password is ' => '01157568599');

	if($Email == 'islam201211@gmailcom'){
		return $res->withJson($message, 200);
	}

	else {
		return $res->withJson('Your Email is not correct', 404);
	}


});




















































