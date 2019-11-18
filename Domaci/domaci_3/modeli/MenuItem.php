<?php

require_once './interfejsi/Renderable.php';

class MenuItem implements Renderable
{
    private $label;
    private $pageName;
    private $params;

    //konstruktor
    public function __construct($label, $pageName, $params)
    {
        $this->label = $label;
        $this->pageName = $pageName;
        $this->params = $params;
    }
    
    //implementacija render() funkcije iz interfejsa Renderable
    public function render(): string
    {
        return "<a href = '" . $this->generateHref() . "'>" . $this->label . "</a>";
    }

    //funkcija koja generise validan URL query string
    public function generateUrlQuery()
    {
        $url = '';
        $keyArray = array_keys($this->params);
        for($i = 0; $i < count($keyArray);$i++){
            $url = $url . $keyArray[$i] . "=" . urlencode($this->params[$keyArray[$i]]);
            if($i != count($keyArray)-1){
                $url = $url . "&";
            }
        }

        return $url;
    }

    //funkcija koja generise href atribut za <a> tag
    function generateHref()
    {
        return $this->pageName . "?" . $this->generateUrlQuery();
    }
}


?>