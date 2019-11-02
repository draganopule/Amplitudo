<?php
include('./helpers.php');//ukljucili smo stranicu u kojoj se nalaze funkcije koje koristimo

//kreiramo asocijatvni niz koji predstavlja dostupne linkove
$links = [
    [
        "label"=>"Page 1", 
        "pageName"=>"./page_1.php",
        "params"=>[
            "naziv"=>"M&M'S",
            "cijena"=>"2.5"
        ]
    ],
    [
        "label"=>"Page 2", 
        "pageName"=>"./page_2.php",
        "params"=>[
            "naziv"=>"Coca Cola",
            "cijena"=>"1.85"
        ]
    ]
];

//prolazimo kroz sve elemente niza i ispisujemo ih u html listi
echo '<ul>';
foreach($links as $link){
    echo '<li>';
    echo '<a href = "' . generateHref($link['pageName'], $link['params']) . '">' . $link['label'] . '</a>';
    echo '</li>';
}
echo '</ul>';
?>