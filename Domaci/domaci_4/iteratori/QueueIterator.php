<?php

namespace Amplitudo\Domaci4;

use Amplitudo\Domaci4\Stack;

class QueueIterator implements Iterator
{
    private $queue;

    public function __construct(Queue $queue)
    {
        $this->queue = $queue;
    }

    public function next()
    {
        return $this->queue->dequeue();//vraca prvi element kolekcije i brise ga
    }
    public function hasNext()
    {
        return !$this->queue->isEmpty();//provjerava da li u kolekciji ima vise elemenata
    }
}

?>