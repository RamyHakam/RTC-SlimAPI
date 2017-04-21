<?php
// Routes

$app->post('/{name}', function ($request, $response, $args) {
    // Sample log message

    $name=$args['name'];
    $this->logger->info("RTC Course '/' route".$name );
    $message=array('name'=>$name);
  return $response->withJson($message,200);
  
  
    // Render index view
//    return $this->renderer->render($response, 'index.phtml', $args);
});


//our first route

