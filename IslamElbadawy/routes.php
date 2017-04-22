<?php
// Routes

$app->get('/[{name}]', function ($request, $response, $args) {
    // Sample log message
    $this->logger->info("Slim-Skeleton '/' route");

    // Render index view
    return $this->renderer->render($response, 'index.phtml', $args);
});




//our first route

$app->get('/{x}/{y}',function($request, $response, $args){
	//define variables

	$firstNum=$args['x'];
	$secondeNum=$args['y'];
	
	$message = array('sum' => $firstNum  +  $secondeNum);
	return $response->withJson($message);
});