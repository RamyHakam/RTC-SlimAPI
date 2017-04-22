<?php
// Routes


$app->post('/Saleem',function($req,$res){

$data=$req->getParsedBody();

$name=$data['name'];
$phone = $data['phone'];
$password=$data['password'];
$error = '';
if($name == '' ){
	$error = 'Please Enter your name.';
}
if($phone == ''){
	$error .= ' - Please Enter your phone.';
}
if($password == ''){
	$error .= '  - Please Enter your password.';
}
$message= '';
if($error == ''){
	$message=array('status'=>true,'data'=>" your name is ".$name."  your password is  ".$password." your phone number is ".$phone);
}
else {
	$message=array('status'=>false,'data'=>" Some errors:".$error);	
}

return $res->withJson($message)
           ->withStatus($error == '' ? 200 : 404);  

});


$app->get('/Saleem/login/{name}/{password}',function($req,$res,$args){

$name=$args['name'];
$password=$args['password'];


if($name=='Salamonty' && $password='123'){
	$message=array('status'=>true,'message'=>"loged in ");
	return $res->withJson($message)->withStatus(200);
}
else {
	$message=array('status'=>false,'message'=>"name or password is not correct ");
	return $res->withJson($message)->withStatus(400);  
}

});


$app->get('/Saleem/forgerpassword/{phone}',function($req,$res,$args){

$phone=$args['phone'];


if($phone == '01146564959'){
	$message=array('status'=>true,'message'=>"your password is : 123 ");
	return $res->withJson($message)->withStatus(200); 
}
else {
	$message=array('status'=>false,'message'=>"phone number is not correct ");
	return $res->withJson($message)->withStatus(400);
}

});
