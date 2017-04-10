<?php
// Routes

$app->post('/TarekSherif/[{name}]', function ($request, $response, $args) {
    // Sample log message
    $this->logger->info("Slim-Skeleton '/' route");

    // Render index view
    return $this->renderer->render($response, 'index.phtml', $args);
});

$app->GET('/TarekSherif/SUM/{X}/[{Y}]', function ($request, $response, $args) {
    // Sample log message
  
  $X= $args['X'];
  $Y= (isset($args['Y'])?$args['Y']:0);
  
  $massage=array("sum"=>$X+$Y);

   // return $response->getBody()->write($X+$Y);
     return $response->withJson($massage);
});