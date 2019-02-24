<?php

require_once __DIR__.'/SeparateNode.php';

class LinkedList extends SeparateNode
{
    private $head = null;
    private $tail = null;

    public function __construct($value)
    {
        if (empty($this->head)){
            $newElement = new SeparateNode($value, null, null);
            $this->head = $newElement;
            $this->tail = $newElement;
        }
    }


    public function append($value)
    {
        $lastObj = $this->tail;
        $newElement = new SeparateNode($value, null, $lastObj);
        $lastObj->setNext($newElement);
        $this->tail = $newElement;

    }

    public function prepend($value)
    {
        $headObj = $this->head;
        $obj = new SeparateNode($value, $headObj, null);
        $headObj->setPrevious($obj);
        $this->head = $obj;
    }

    public function deleteFromHead()
    {
        if (empty($this->head)) {
            throw new RuntimeException('Troubles  ');
        }
        $this->head = $this->head->getNext();
    }
    public function deleteFromEnd()
    {
        if (!empty($this->head)) {
            /** @var SeparateNode $lastElement */
            $lastElement = $this->head;
            $prev = null;
            // O(n)
            while (!empty($lastElement->getNext())) {
                $prev = $lastElement;
                $lastElement = $lastElement->getNext();
            } // end of the list
            $prev->setNext(null);
        } else {
            throw new RuntimeException('Notice');
        }
    }
}

$obj = new LinkedList(1);
$obj->append(2);
$obj->append(3);
$obj->append(4);
$obj->append(5);



//$obj->prepend('prprpr');
var_export($obj);
