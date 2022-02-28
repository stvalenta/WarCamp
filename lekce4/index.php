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
$var = "";
var_dump($nabidkaForOption[0]);
if ($_SERVER["REQUEST_METHOD"] == "POST"){
  $var = ($_POST['taskOption']);
  var_dump($var);
}


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
      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label for="kraje">Vyberte kraj: </label>
        <select id="kraje" name="taskOption" >
          <?php 
          for($t=0;$t<$krajeLength-1;$t++){
            echo "<option value=\"", $nabidkaForOption[$t], "\">", $nabidkaForOption[$t], "</option>";
         //   echo '<option value="'. $nabidkaForOption[$t]. '">'. $nabidkaForOption[$t]. '</option>'; //rychlejší
         //   echo "<option value=\" $nabidkaForOption[$t] \"> $nabidkaForOption[$t] </option>"; 
          }
          ?>
        </select>
        <input type="submit" value="Submit the form"/>
      </form>
    </div>
    <?php
    echo "<p class='vyber'>Vybrali jste kraj: ", $var, "</p>";
    ?>
    
    <div id="cekani">
      <i class="fas fa-10x fa-sync fa-spin"></i>
    </div>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST"){
  echo "<div class='container mt-3'>";
  echo "<table class='table table-striped table-hover'>";
  echo "<thead>
          <tr>
           <th>Město</th>
           <th>ID datové schránky</th>
          </tr>
        </thead>
        <tbody>";
  for ($q=0; $q<$dataLength; $q++){
    if ($var == $data["municipalities"][$q]["adresaUradu"]["kraj"]){
      echo "<tr><td>";
      echo $data["municipalities"][$q]["hezkyNazev"], "</td><td>";
      echo $data["municipalities"][$q]["datovaSchrankaID"], "</td>";
      echo "</tr>";
      
    }
  }
  echo "</tbody></table></div>";
}
 
?>
</body>
<script src="https://kit.fontawesome.com/6d2ea823d0.js"></script>

</html>