<?php
include('./helpers.php'); //ukljucili smo stranicu u kojoj se nalaze funkcije koje koristimo

echo formatGetParams();//stampamo html listu svih GET parametara koji su proslijedjeni trenutnoj stranici

//niz Ip adresa koje ce biti prosljedjene funkciji za provjeru validnosti
$testExamples = [
    '82.0.45.112',
    '10.192.168.255',
    '4.256.12.78',
    '1a.23.56.4'
];

//provjeravamo svaku adresu iz niza, da li je validna
foreach($testExamples as $t){
    if(validateIP($t)){
        echo '</br>' . $t . ' je validna IP adresa</br>';
    }
    else{
        echo '</br>' . $t . ' NIJE validna IP adresa</br>';
    }
}

?>

