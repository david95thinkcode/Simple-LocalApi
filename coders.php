<?php
    header("Content-Type: application/json; charset=UTF-8");
    header('Access-Control-Allow-Origin: *'); // PREVENT CORS ERROR :) :D 
    
    include 'models/coder.class.php'; 

    $a = new Coder();
    $b = new Coder();
    $c = new Coder();

    $a->Hydrate(1, 'Djangoni GUTAMBERG', +8481126516, 'M', 'England');
    $b->Hydrate(2, 'Majin BOO', +11111111, 'M', 'Earth');
    $c->Hydrate(3, 'Hinata HYUGA', +256558565, 'W', 'Konoha');
    
    $tab = [$a, $b, $c];
    
    $response = new stdClass(); // this is how we create simple class in php
    $response = $tab;    
    
    echo json_encode($response);
