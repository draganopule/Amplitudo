<?php

namespace Amplitudo\Domaci4;

require_once './Stack.php';
require_once './Iterator.php';

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
        $this->stack->pop();
    }
    public function hasNext()
    {
        return $this->stack->isEmpty();
    }
}
?>