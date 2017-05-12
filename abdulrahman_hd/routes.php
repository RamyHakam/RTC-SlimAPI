<?php


           // Routes

$app->get('/[{name}]', function ($request, $response, $args) {
    // Sample log message
    $this->logger->info("Slim-Skeleton '/' route");

    // Render index view
    return $this->renderer->render($response, 'index.phtml', $args);
});
           //  our first route

$app->get('/{x}/{y}',function($request, $response, $args){
	//define variables

	$firstNum=$args['x'];
	$secondeNum=$args['y'];
	
	$message = array('sum' => $firstNum  +  $secondeNum);
	return $response->withJson($message);
});

// signUp  Routes

	$app->POST('/abdulrahman/signUp',function($req, $res){

		$date = $req->getParsedBody();

		$name = $date['name'];
		$password = $date['password'];
		$Email = $date['email'];
		if($name == ''){
				return $res->withJson('Your Name Is Missing',400);
		}
		if($password == ''){
				return $res->withJson('Your Name Is Missing',400);
		}
		if($Email == ''){
				return $res->withJson('Your Name Is Missing',400);
		}else{

				return $res->withJson('Your Not SignUp',400);
		}
	});

	// Routes Login 

	$app->get('/abdulrahman/login/{'name'}/{'password'}',function($req, $res ,$args){



	});