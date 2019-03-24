<?php

require_once __DIR__.'/Structure.php';
require_once __DIR__.'/Queue.php';

class StackDoubleQueue extends Structure
{
    private $queue1;
    private $queue2;

    /**
     * StackDoubleQueue constructor.
     */
    public function __construct()
    {
        $this->queue1 = new Queue();
        $this->queue2 = new Queue();
    }

    public function isEmpty()
    {
        return ($this->queue1->isEmpty() && $this->queue2->isEmpty()) === true;
    }

    public function in($value)
    {
        if ($this->queue1->isEmpty()) {
            $this->queue2->in($value);
        } else {
            $this->queue1->in($value);
        }
    }

    public function out()
    {
        if ($this->queue2->isEmpty()) {
            $size = $this->queue1->size();
            $count = 0;
            while ($count < $size - 1) {
                $this->queue2->in($this->queue1->out());
                $count++;
            }
            return $this->queue1->out();
        } else {
            $size = $this->queue2->size();
            $count = 0;
            while ($count < $size - 1) {
                $this->queue1->in($this->queue2->out());
                $count++;
            }
            return $this->queue2->out();
        }
    }
}

$obj = new StackDoubleQueue();

//for ($i = 0; $i < 10; $i++) {
//    $obj->in($i.'abc');
//}
//var_export($obj);
//var_dump($obj->isEmpty());
//
//for ($i = 0; $i < 10; $i++) {
//    echo $obj->out(), PHP_EOL;
//}
//
//var_dump($obj->isEmpty());

$line =  '"(<{}>)"';

function eyeOfSauron ($line) {
    $line1 = new StackDoubleQueue();
  //  $line2 = new StackDoubleQueue();
    $lineStr = str_split($line);
    for ($i = 0; $i < count($lineStr); $i++) {
        $line1->in($lineStr[$i]);
    }
    $line2 = '';
    for ($i = 0; $i < count($lineStr); $i++) {
        $line2 .= $line1->out();
    }
    echo $line2, PHP_EOL;
}

eyeOfSauron($line);