<?php

namespace Amplitudo\Domaci4;

use Amplitudo\Domaci4\Stack;

class StackIterator implements Iterator
{
    private $stack;

    public function __construct(Stack $stack)
    {
        $this->stack = $stack;
    }

    public function next()
    {
        return $this->stack->pop();//vraca poslednji element kolekcije i brise ga
    }
    public function hasNext()
    {
        return !$this->stack->isEmpty();//provjerava da li u kolekciji ima vise elemenata
    }
}
?>