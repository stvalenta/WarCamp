<?php

require 'functions.php';
require 'Clovek.php';
require 'Student.php';
require 'MojeVypocetniRozhrani.php';
require 'JednoduchyVypocetniModul.php';
require 'SlozityVypocetniModul.php';
require 'Kalkulacka.php';

// Level 1
echo '============LEVEL1=============';
echo "\r\n";

echo '==Úkol 1==';
echo "\r\n";
$trojuhelnik = [];
$a = '';
$d = 0;
for ($i = 0; $i < 5; $i++) {
    $a = 'b';  // 5x
    for ($j = 0; $j <= $i; $j++) {
        $trojuhelnik[$i][$j] = '*'; //5+4+3+2+1=15 
        $d++;
    }
}
var_dump($d);

vytiskniTrojuhelnik($trojuhelnik);

echo '==Úkol 2==';
echo "\r\n";

$a = 2;
$b = 3;
$c = vynasob($a, $b); //null, funkce postrádá návratovou hodnotu
echo sprintf('Výsledek násobení čísel %s a %s je %s', $a, $b, $c);
echo "\r\n";


echo '==Úkol 3==';
echo "\r\n";

$cisla = [1, 2, 3, 4, 5, 6, 7, 8, 9];
zobrazLichacisla($cisla);

echo '===============================';
echo "\r\n";


// Level 2
echo '============LEVEL2=============';
echo "\r\n";
echo '==Úkol 1==';
echo "\r\n";

echo deleni(2, 1) . "\r\n";
echo deleni(2,0) . "\r\n";
//echo deleni('retezec',3) . "\r\n"; to už je ošetřeno ve funkci od výroby, jde vložit float, což zahrnuje float a integer.


echo '===============================';
echo "\r\n";

// Level 3
echo '============LEVEL3=============';
echo "\r\n";

echo '==Úkol 1==';
echo "\r\n";

$clovek = new Clovek('Petr'); 
$student = new Student('Standa', 'programator');

pozdrav($clovek);
pozdrav($student); // Na řádku 71 jsme si vytvořili objekt student, funkce pozdrav je definována pro již vytvořený objekt a obsahuje pozdrav..

skolniPozdrav($student);
//skolniPozdrav($clovek); funkce je definována pro třídu student, která zahrnuje více informací, které funkce volá..

echo '==Úkol 2==';
echo "\r\n";

$jednoduchyVypocetniModul = new JednoduchyVypocetniModul();
$kalkulacka = new Kalkulacka($jednoduchyVypocetniModul);

echo $kalkulacka->secti(1, 1) . "\r\n";
echo $kalkulacka->odecti(1, 1) . "\r\n";

//$slozityVypocetniModul = new SlozityVypocetniModul();
//$kalkulacka = new Kalkulacka($slozityVypocetniModul);
//
//echo $kalkulacka->secti(1, 1) . "\r\n";
//echo $kalkulacka->odecti(1, 1) . "\r\n";


echo '===============================';
echo "\r\n";