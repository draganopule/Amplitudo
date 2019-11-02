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