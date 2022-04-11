<?php
class CitiesAndID {

    public $kraje = [];
    public $mesta = [];

    const JSON_URL = 'https://data.cesko.digital/obce/1/obce.json';
    const CACHED_JSON_FILE_PATH = './cache/districts.json';
    function getContentString(){
      return file_get_contents('https://data.cesko.digital/obce/1/obce.json');
    }
    function decodeJsonFileArray(){
            $jsonDistrictsFile = $this->getContentString();
            return json_decode($jsonDistrictsFile);
    }
    function getMunicipalityList(){
      $jsonDataSourceObject = $this->decodeJsonFileArray();
      foreach($jsonDataSourceObject->municipalities as $municipality){
        $kraj = $municipality->adresaUradu->kraj;
        if(!empty($kraj)){
          $kraje[$kraj] = '<option value="'.$kraj.'">'.$kraj.'</option>';
        }
      }
      return implode(' ', $kraje);
    }
    function citiesInKraj(){
      $listOfCitiesAndID = [];
      $selectedKraj = $_GET['taskOption'];
      $listOfCitiesAndID = $this->decodeJsonFileArray();
      $obecIDSchranky = [];
      foreach($listOfCitiesAndID->municipalities as $municipality){
        if($municipality->adresaUradu->kraj == $selectedKraj){
          $obecIDSchranky[] = $municipality->hezkyNazev.' - '.$municipality->datovaSchrankaID;
        }
      }
      return $obecIDSchranky;
    }
    function isJsonFileCached(){
      return file_exists(CACHED_JSON_FILE_PATH);
    }
    function cacheObtainedJsonFile($jsonDistrictsFile){
        file_put_contents(CACHED_JSON_FILE_PATH, $jsonDistrictsFile);
    }
}