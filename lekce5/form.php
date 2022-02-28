<?php

require('function.php');

$districtOptions = stringForOption();
$var = "";
if ($_SERVER["REQUEST_METHOD"] == "POST"){
  $var = ($_POST['taskOption']);
  var_dump($var);
}
echo('
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
      <form method="post" action="/WarCamp/lekce5/form.php">
        <label for="kraje">Vyberte kraj: </label>
        <select id="kraje" name="taskOption" >
        '.$districtOptions.'
        </select>
        <input type="submit" value="Submit the form">
      </form>
    </div>
    echo "<p class="vyber">Vybrali jste kraj:  '.$var.'</p>";
    <div id="cekani">
      <i class="fas fa-10x fa-sync fa-spin"></i>
    </div>
if ($_SERVER["REQUEST_METHOD"] == "POST"){
  echo "<div class="container mt-3">";
  echo "<table class="table table-striped table-hover">";
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
</body>
<script src="https://kit.fontawesome.com/6d2ea823d0.js"></script>

</html>
');
