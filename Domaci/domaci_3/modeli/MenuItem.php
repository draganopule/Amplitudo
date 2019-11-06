<?php

require_once './Renderable.php';

class MenuItem implements Renderable;
{
    private $label;
    private $pageName;
    private $params;

    //implementacija render() funkcije iz interfejsa Renderable
    public function render(): string
    {
        return "<a href = '" . generateHref() . "'>" . $label . "</a>";
    }

    //funkcija koja generise validan URL query string
    public function generateUrlQuery()
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
    function generateHref()
    {
        return $pageName . "?" . generateUrlQuery();
    }
}


?>