<?php

//funkcija koja generise validan URL query string
function generateUrlQuery($params)
{
    $url = '';
    $keyArray = array_keys($params);
    for($i = 0; $i < count($keyArray);$i++){
        $url = $url . $keyArray[$i] . "=" . urlencode($params[$keyArray[$i]]);
        if($i != count($keyArray)-1){
            $url = $url . "&";
        }
    }

   return $url;
}

//funkcija koja generise href atribut za <a> tag
function generateHref($pageName, $params)
{
    return $pageName . "?" . generateUrlQuery($params);
}

//funkcija koja vraca html listu svih GET parametara koji su proslijedjeni trenutnoj stranici
function formatGetParams()
{
    $html = '<ul>';
    foreach($_GET as $key => $value){
        $html = $html . '<li>' . $key . ': ' . $value . '</li>';
    }
    $html = $html . '</ul>';
    return $html;
}

//funkcija koja provjerava da li string predstavlja validnu IP adresu
function validateIP($address)
{
    $addr = explode(".", $address);
    if(count($addr) != 4){
        return false;
    }
    foreach($addr as $a){
        if(!is_numeric($a)){
            return false;
        }
        if(intval($a) < 0 || intval($a) > 255){
            return false;
        }
    }
    return true;
}

?>