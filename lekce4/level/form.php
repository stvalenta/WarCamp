<?php

require('function.php');

$districtOptions = getMunicipalityList();
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
      <form method="post">
        <label for="kraje">Vyberte kraj: </label>
        <select id="kraje" name="taskOption" >
        '.$districtOptions.'
        <option>Krakonošovo</option>
        </select>
        <input type="submit" value="Submit the form">
      </form>
    </div>
</body>
<script src="https://kit.fontawesome.com/6d2ea823d0.js"></script>

</html>
');
?>