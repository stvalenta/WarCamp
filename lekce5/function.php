<?php 

const JSON_URL = 'https://data.cesko.digital/obce/1/obce.json';
function getContentString():string{
    return file_get_contents(JSON_URL);
}
function decodeJsonFileArray():array{
    return json_decode(getContentString(), TRUE);
}
function getDuplicates():array{
  $data = decodeJsonFileArray();
  $duplicatesLength = count($data["municipalities"]);
  $duplicates = [];
  for ($x = 0; $x < $duplicatesLength; $x++){
    $duplicates[$x] = explode(" - ", $data["municipalities"][$x]["adresaUradu"]["kraj"]);
  }
  $simpleDuplicates = [];
  for ($y = 0; $y < $duplicatesLength; $y++){
    $simpleDuplicates[$y] = $duplicates[$y][0];
  }
  return $simpleDuplicates;
}
function forOption():array{
  $nabidka = array_unique(getDuplicates());
  $krajeLength = count($nabidka);
  $nabidkaForOption = [];
  $i = 0;
  foreach(array_values($nabidka) as $x => $x_value) {
    $nabidkaForOption[$i] = $x_value;
    $i++;
  }
  $kraje = [];
  for($t=0;$t<$krajeLength-1;$t++){
   //  $kraje[$t] = "<option value=\"", $nabidkaForOption[$t], "\">", $nabidkaForOption[$t], "</option>";
    // $kraje[$t] = '<option value="'. $nabidkaForOption[$t]. '">'. $nabidkaForOption[$t]. '</option>'; //rychlejší
  $kraje[$t] = "<option value=\" $nabidkaForOption[$t] \"> $nabidkaForOption[$t] </option>"; 
   }
  return $kraje;
}
function stringForOption ():string{
  return implode(" ",forOption());
}

?>