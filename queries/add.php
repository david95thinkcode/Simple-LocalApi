<?php

  header("Content-Type: application/json; charset=UTF-8");
  header('Access-Control-Allow-Origin: *');

  require '../shared/required.php';

  $coder = new Coder();
  $querystate = new XHRResponse();
  $coderManager = new CoderManager($bdd);

  // Extraction of received datas
  $response = json_decode(stripslashes(file_get_contents("php://input")));

  if ($response != NULL) {
    $querystate->_message = $response;

    $name = $response->name;
    $sex = $response->sex;
    $country = $response->country;
    $phone_number = $response->phone_number;

    // Hydrating coder object
    $coder->HydrateWithoutId($name, $phone_number, $sex, $country);

    // Inserting coder to database
    $coderManager->Add($coder);
    
    // When insertion succeed
    if ($coderManager) {
      $querystate->_success = TRUE;
      $querystate->_data = null;
      $querystate->_message = 'Successfully saved to database';
    }
    else {
      $querystate->_success = FALSE;
      $querystate->_data = null;
      $querystate->_message = 'Failed to save to database';
    }
  }
  else {
    $querystate->_success = TRUE;
    $querystate->_data = 'Error';
    $querystate->_message = 'Missing data';
  }

  echo json_encode($querystate);
