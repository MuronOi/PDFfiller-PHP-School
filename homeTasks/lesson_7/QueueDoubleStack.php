<?php

require_once __DIR__.'/Structure.php';
require_once __DIR__.'/Stack.php';

class QueueDoubleStack extends Structure
{
    private $inStack;
    private $outStack;

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
    }

    public function isEmpty() {
        return ($this->inStack->isEmpty() && $this->outStack->isEmpty()) === true;
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

$obj = new QueueDoubleStack();

for ($i = 0; $i < 10; $i++) {
    $obj->in($i.'abc');
}

var_dump($obj->isEmpty());

for ($i = 0; $i < 10; $i++) {
    echo $obj->out(), PHP_EOL;
}

var_dump($obj->isEmpty());

