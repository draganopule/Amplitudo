<?php

namespace Amplitudo\Domaci4;

require_once './Collection.php';

class Queue extends Collection
{
    public function enqueue($item)
    {
        parent::add($item, $this->count);
        $this->count++;
    }

    public function dequeue()
    {
        $this->count--;
        return array_shift($this->items);
    }

    public function getIterator()
    {
        
    }
}

?>