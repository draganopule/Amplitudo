<?php
require_once './interfejsi/Renderable.php';
require_once './modeli/MenuItem.php';

class Menu implements Renderable
{
    private $items;

    //konstruktor
    public function __construct()
    {
        $this->items[0] = new MenuItem('Homepage','./homepage.php',[]);
        $this->items[1] = new MenuItem('Page 1','./page_1.php',[]);
        $this->items[2] = new MenuItem('Page 2','./page_2.php',[]);
    }

    //implementacija render() funkcije iz interfejsa Renderable
    public function render(): string
    {
        $html = '<ul>';
        foreach($this->items as $item){
            $html = $html . '<li>';
            $html = $html . $item->render();
            $html = $html .'</li>';
        }
        $html = $html .'</ul>';
        return $html;
    }
}



?>