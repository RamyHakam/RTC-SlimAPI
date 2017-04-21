<?php


//Put Test 

$app->put('/PutTest',function($req,$res){

return $res->withStatus(401);


});


$app->delete('/DeleteTest',function($req,$res){

return $res->withStatus(401);

});





$app->get('/login/{name}/{password}',function($req,$res,$args){

$name=$args['name'];
$password=$args['password'];


if($name=='admin'&&$password='admin'){


$message=array('status'=>true,'message'=>"loged in ");

return $res->withJson($message);

}

else {


$message=array('status'=>false,'message'=>"name or password is not correct ");

return $res->withJson($message);


}

});



//


$app->get('/addpost/{title}/{text}[/{date}]',function($req,$res,$args){


$date=$args['date'];




if(isset ($date)){


$message=array('status'=>true,'message'=>"you are sent a new date  ");

return $res->withJson($message);

}

else {


$message=array('status'=>false,'message'=>"date is empty ");

return $res->withJson($message);


}

});







$app->post('/posttest',function($req,$res){


$data=$req->getParsedBody();

$name=$data['name'];
$password=$data['password'];
$message=array('status'=>true,'data'=>" your name is ".$name."  your password is  ".$password );


return $res->withJson($message)
           ->withStatus(200);  


});



//list of optional params



$app->get('/unlimited/optional[/{parms:.*}]',function($req ,$res ,$args){
$parms=explode('/', $req->getAttribute('parms'));
if (empty($parms[0])){
$res->getBody()->write("The parms list is null");
}
else{
	$out="";
foreach ($parms as $key => $value) {
	$out=$out." " ."$key => $value";
}
$res->getBody()->write($out);	
}
});






$app->get('/multiple/optional[/{year}[/{month}]]',function($req ,$res ,$args){
$year=$args['year'];
$month=$args['month'];
if (is_null($year)){
$res->getBody()->write("The year and month are null");
}
else{
if( is_null($month)){
$res->getBody()->write("The year=$year  and  the month is null");
}
else{
$res->getBody()->write("The year=$year  and  the month=$month");	
}}

});





















