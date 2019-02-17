<?php

require_once __DIR__.'/Structure.php';
require_once __DIR__.'/Stack.php';

class QueueDoubleStack extends Structure
{
    private $inStack;
    private $outStack;
    private $head = 0;
    private $tail = 0;

    /**
     * QueueDoubleStack constructor.
     */
    public function __construct()
    {
        $this->inStack = new Stack();
        $this->outStack = new Stack();
    }

    public function in($value)
    {
        $this->inStack->in($value);
        $this->tail++;
    }

    public function isEmpty() {
        return $this->head === $this->tail;
    }

    public function out()
    {
        if (!$this->outStack->isEmpty()) {
            return $this->outStack->out();
        } else {
            while (!$this->inStack->isEmpty()) {
                $this->outStack->in($this->inStack->out());
            }
            return $this->outStack->out();

        }
    }
}

//$obj = new QueueDoubleStack();
$obj = new QueueDoubleStack();
for ($i = 0; $i < 10; $i++) {
    $obj->in($i.'abc');
}
for ($i = 0; $i < 10; $i++) {
    echo $obj->out(), PHP_EOL;
}
//$obj->in(123465);
//var_dump($obj);