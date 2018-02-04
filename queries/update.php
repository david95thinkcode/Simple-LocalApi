<?php
require_once '../shared/required.php';

$querystate = new XHRResponse();
$coder = new Coder();
$coderManager = new CoderManager($bdd);

//Extraction
$response = json_decode(stripslashes(file_get_contents("php://input")));

if ($response != NULL) {
  $name = $response->name;
  $sex = $response->sex;
  $country = $response->country;
  $phone_number = $response->phone_number;

  //Hydrating coder object
  $coder->id = $response->id;
  $coder->HydrateForDBQueries($name, $phone_number, $country, $sex);

  $coderManager->Update($coder);

  // Query state
  if ($coderManager) {
      $insertedid = (int) ($bdd->lastInsertId());
      $querystate->ReturnSuccess($insertedid);
  }
  else { $querystate->ReturnFailure(); }
}

else {
  echo 'Some data is missing';
}
