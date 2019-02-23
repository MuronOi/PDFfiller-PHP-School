<?php

class LinkedList extends SeparateNode
{
    private $head = null;
    private $tail = null;


    public function append($value) {
        $newElement = new SeparateNode();
        $newElement->setValue1($value);

        if (empty($this->head)){
            $lastElement = $this->head;
            while (!empty($lastElement->getNext())){
                $lastElement = $lastElement->getNext();
            }
            $lastElement->setNext($newElement);
        } else {
            $this->head = $newElement;
        }
    }

    public function prepend($value){
        $obj = new SeparateNode();
        $obj->setValue($value);


    }

    public function deleteFromHead(){
        if (empty($this->head)){
            throw new RuntimeException('Troubles  ');
        }
        $this->head = $this->head->getNext();
    }

    public function deleteFromTale
}