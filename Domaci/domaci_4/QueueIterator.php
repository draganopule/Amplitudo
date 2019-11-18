<?php

namespace Amplitudo\Domaci4;

require_once './Queue.php';
require_once './Iterator.php';

use Amplitudo\Domaci4\Stack;

class QueueIterator implements Iterator
{
    private $queue;

    public function __construct(Queue $queue)
    {
        $this->squeuetack = $queue;
    }

    public function next()
    {
        $this->queue->dequeue();
    }
    public function hasNext()
    {
        return $this->queue->isEmpty();
    }
}

?>