<?php 
$json_url = "https://data.cesko.digital/obce/1/obce.json";
$json = file_get_contents($json_url);
$data = json_decode($json, TRUE);
var_dump($data["municipalities"][0]["hezkyNazev"]);
echo "<br>";
$dataLength = count($data["municipalities"]);
$duplicates = [];
for ($x = 0; $x < $dataLength; $x++){
  $duplicates[$x] = explode(" - ", $data["municipalities"][$x]["adresaUradu"]["kraj"]);
}
$simpleDuplicates = [];
for ($y = 0; $y < $dataLength; $y++){
  $simpleDuplicates[$y] = $duplicates[$y][0];
}
$nabidka = array_unique($simpleDuplicates);
$krajeLength = count($nabidka);
$nabidkaForOption = [];
$i = 0;
foreach(array_values($nabidka) as $x => $x_value) {
  $nabidkaForOption[$i] = $x_value;
  $i++;
}
var_dump($nabidkaForOption[0]);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="styl.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <h1>ID datových schránek</h1>
    
    <div id="okraje">
      <label for="kraje">Vyberte kraj: </label>
      <select id="kraje"></select>
    </div>
    
    <div id="cekani">
      <i class="fas fa-10x fa-sync fa-spin"></i>
    </div>

    <div class="row">
    <div class='container col-sm-6 mt-3'>
        <table class='table table-dark table-striped table-bordered table-hover' id="zobraz"></table>
    </div>
    </div>

</body>
<script src="https://kit.fontawesome.com/6d2ea823d0.js"></script>
<script>
<?php
$js_array = json_encode($nabidkaForOption);
echo "var javascript_array = ". $js_array . ";\n";
?>
    for(z=-1;z<javascript_array.length; z++){javascript_array
      document.getElementById('kraje').innerHTML += "<option value='" + javascript_array[z] + "'>" + javascript_array[z] + "</option>";
      console.log(javascript_array[1]);
    }
  </script>
</html>