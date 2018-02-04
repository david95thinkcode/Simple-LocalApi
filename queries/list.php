<?php

  header("Content-Type: application/json; charset=UTF-8");
  header('Access-Control-Allow-Origin: *');

  require '../shared/required.php';

  $coderManager = new CoderManager($bdd);

  $response = $coderManager->List(); // Retrieving all coders from DB
  
  echo json_encode($response);
