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

    // Inserting coder to database
    $coderManager->Delete($response->id);
    
    // When insertion succed
    if ($coderManager) {
      $querystate->_success = TRUE;
      $querystate->_data = null;
      $querystate->_message = 'Removed successfully';
    }
    else {
      $querystate->_success = FALSE;
      $querystate->_data = null;
      $querystate->_message = 'Failed remove';
    }
  }
  else {
    $querystate->_success = TRUE;
    $querystate->_data = 'Error';
    $querystate->_message = 'Missing data';
  }

  echo json_encode($querystate);
