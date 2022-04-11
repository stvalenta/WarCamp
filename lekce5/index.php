<?php
require('prepravka.php');
$citiesAndID = new CitiesAndID();

if (isset($_GET) && !empty($_GET)) {
    require('zpracovani.php');
}
else {
    require('form.php');
}