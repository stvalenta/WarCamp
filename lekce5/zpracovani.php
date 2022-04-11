<?php

$var = "";

if(!isset($_GET)) {
  echo('Chybně vyplněný formulář!');
  die;
}

$citiesInDistrict = $citiesAndID->citiesInKraj();

if(count($citiesInDistrict) == 0) {
  echo('Chybně vyplněný formulář!');
  die;
}
if ($_SERVER["REQUEST_METHOD"] == "GET"){
  $var = ($_GET['taskOption']);
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
<p class="vyber">Vybrali jste kraj:  '.$var.'</p>
');

if ($_SERVER["REQUEST_METHOD"] == "GET"){

    echo "<div class='container mt-3'>";
    echo "<table class='table table-striped table-hover'>";
    echo "<thead>
            <tr>
             <th>Město, ID datové schránky</th>
            </tr>
          </thead>
          <tbody>";
          foreach ($citiesInDistrict as $city) {
              echo "<tr><td>".$city."</td></tr>";
          }
          echo "</tbody>";
          echo "</table>";
        }
echo ('
</body>
<script src="https://kit.fontawesome.com/6d2ea823d0.js"></script>

</html>
');
?>