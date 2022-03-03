<?php 

const JSON_URL = 'https://data.cesko.digital/obce/1/obce.json';
function getContentString(){
    $jsonDataSource = file_get_contents(JSON_URL);
    return $jsonDataSource;
}
function decodeJsonFileArray(){
  $jsonDataSourceObject = json_decode(getContentString());
    return $jsonDataSourceObject;
}
function getMunicipalityList(){
  $jsonDataSourceObject = decodeJsonFileArray();
  $kraje = [];
  foreach($jsonDataSourceObject->municipalities as $municipality){
    $kraj = $municipality->adresaUradu->kraj;
    if(!empty($kraj)){
      $kraje[$kraj] = '<option>'.$kraj.'</option>';
    }
  }
  return implode(' ', $kraje);
}
function citiesInKraj(){
  $selectedCity = $_POST['taskOption'];
  $listOfCitiesAndID = decodeJsonFileArray();
  $obecIDSchranky = [];
  foreach($listOfCitiesAndID->municipalities as $municipality){
    if($municipality->adresaUradu->kraj == $selectedCity){
      $obecIDSchranky[] = $municipality->hezkyNazev.' - '.$municipality->datovaSchrankaID;
    }
  }
  return $obecIDSchranky;
}