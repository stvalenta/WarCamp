<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body style="background-color: green; color: black; text-align: center">
<h1> Seznam měst v kraji:</h1>

<form action="index.php" method="get">
    <label for="kraj">Vyberte kraj:</label>

    <select id="taskOption" name="taskOption" >
<?php

echo $citiesAndID->getMunicipalityList();
?>
    </select>
    <br><br>

    <input type="submit" value="Odeslat">
</form>
</body>
</html>