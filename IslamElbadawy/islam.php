<?php
// Routes






//our first route

//



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




















































