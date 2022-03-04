<?php 

const JSON_URL = 'https://data.cesko.digital/obce/1/obce.json';
const CACHED_JSON_FILE_PATH = './cache/districts.json';
function getContentString(){
    return file_get_contents(JSON_URL);
}
function decodeJsonFileArray(){
  if (isJsonFileCached()) {
    $jsonDistrictsFile = file_get_contents(CACHED_JSON_FILE_PATH);
}
if (empty($jsonDistrictsFile)) {
        $jsonDistrictsFile = getContentString();
        cacheObtainedJsonFile($jsonDistrictsFile);
    }
    return json_decode($jsonDistrictsFile);
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
function isJsonFileCached()
{
    return file_exists(CACHED_JSON_FILE_PATH);
}
function cacheObtainedJsonFile($jsonDistrictsFile)
{
    file_put_contents(CACHED_JSON_FILE_PATH, $jsonDistrictsFile);
}