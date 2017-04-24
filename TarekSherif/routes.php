<?php
// Routes

// $app->post('/TarekSherif/[{name}]', function ($request, $response, $args) {
//     // Sample log message
//     $this->logger->info("Slim-Skeleton '/' route");

//     // Render index view
//     return $this->renderer->render($response, 'index.phtml', $args);
// });

// $app->GET('/TarekSherif/SUM/{X}/[{Y}]', function ($request, $response, $args) {
//     // Sample log message
  
//   $X= $args['X'];
//   $Y= (isset($args['Y'])?$args['Y']:0);
  
//   $massage=array("sum"=>$X+$Y);

//    // return $response->getBody()->write($X+$Y);
//      return $response->withJson($massage);
// });



$app->post('/TarekSherif/SignUp',function($req,$res){


$data=$req->getParsedBody();

$name=(isset($data['name'])?$data['name']:null);
$Email=(isset($data['Email'])?$data['Email']:null);
$password=(isset($data['password'])?$data['password']:null);
$ErrMessage="";

if (is_null($name))
{
$ErrMessage = $ErrMessage ."Enter your  name <br/>";
}

if (is_null($Email))
{
$ErrMessage = $ErrMessage ."Enter your  Email <br/>";
}

if (is_null($password))
{
$ErrMessage = $ErrMessage ."Enter your  password <br/>";
}

if ($ErrMessage == "" )
{
$message=array('status'=>true,'data'=>"SignUp  true" );

return $res->withJson($message)
           ->withStatus(200);  
           }
else
{
$message=array('status'=>false,'data'=>$ErrMessage );
return $res->withJson($message)
           ->withStatus(400);  
}
});



// login route 

$app->get('/TarekSherif/login/{Name}/{Password}',function($req, $res, $args){

$Name=(isset($args['Name'])?$args['Name']:null);
$Password=(isset($args['Password'])?$args['Password']:null);

$ErrMessage="";

if ($ErrMessage == "" )
{

    	if($Name == 'TarekSherif' && $Password == '01115500920'){
            $message=array('status'=>true,'data'=>"You are logged in" );

            return $res->withJson($message)
                    ->withStatus(200);  
                }
        else {
            $message=array('status'=>false,'data'=>"Name or Password is not correct" );

                return $res->withJson($message, 404);
            }
  	
	}
else
{
$message=array('status'=>false,'data'=>$ErrMessage );
return $res->withJson($message)
           ->withStatus(400);  
}
});



//forget password


$app->get('/TarekSherif/forgetPassword/{Email}',function($req, $res, $args){

	$Email = $args['Email'];
	$message = array('Your Name is ' => 'TarekSherif','Your Password is ' => '01115500920');

	if($Email == 'Eng.tarek.sherif@gmail.com'){
		return $res->withJson($message, 200);
	}

	else {
		return $res->withJson('Your Email is not correct', 404);
	}
});

