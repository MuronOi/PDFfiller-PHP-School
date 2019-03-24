<?php

require_once __DIR__.'/SeparateNode.php';

/**
 * Class LinkedList
 */
class LinkedList extends SeparateNode
{
    /**
     * @var null
     */
    private $head = null;
    /**
     * @var null
     */
    private $tail = null;

    /**
     * @param $value
     */
    public function append($value)
    {
        $newElement = new SeparateNode();
        $newElement->setValue($value);
        if (empty($this->head)){
            $newElement->setNext(null);
            $newElement->setPrevious(null);
            $this->head = $newElement;
            $this->tail = $newElement;
        } else {
            $lastObj = $this->tail;

            $lastObj->setNext($newElement);
            $newElement->setPrevious($lastObj);
            $this->tail = $newElement;
        }
    }

    /**
     * @param $value
     */
    public function prepend($value)
    {
        $headObj = $this->head;
        $obj = new SeparateNode($value, $headObj, null);
        $headObj->setPrevious($obj);
        $this->head = $obj;
    }

    /**
     *
     */
    public function deleteFromHead()
    {
        if (empty($this->head)) {
            throw new RuntimeException('List is empty');
        } else {
            $this->head = $this->head->getNext();
        }
    }

    /**
     *
     */
    public function deleteFromEnd()
    {
        if (!empty($this->head)) {
            $this->tail = $this->tail->getPrevious();
            $this->tail->setNext(null);
        } else {
            throw new RuntimeException('List is empty');
        }
    }

    /**
     * @param $value
     * @param $at
     */
    public function insertAfterAt($value, $at)
    {
        $newElement = new SeparateNode();
        $newElement->setValue($value);

        $elementAt = $this->search($at);

        if ($elementAt->getNext() === null) {
            $this->tail = $newElement;
            $newElement->setPrevious($elementAt);
            $newElement->setNext(null);
        } else {
            $newElement->setPrevious($elementAt);
            $newElement->setNext($elementAt->getNext());
        }
        $elementAt->setNext($newElement);
    }

    /**
     * @param $value
     * @param $at
     */
    public function insertBeforeAt($value, $at)
    {
        $newElement = new SeparateNode();
        $newElement->setValue($value);

        $elementAt = $this->search($at);

        if ($elementAt->getPrevious() === null) {
            $this->head = $newElement;
            $newElement->setPrevious(null);
            $newElement->setNext($elementAt);
            $elementAt->setPrevious($newElement);
        } else {
            $newElement->setPrevious($elementAt->getPrevious());
            $newElement->setNext($elementAt);
            $elementAt->setPrevius($newElement);
        }
    }

    /**
     * @param $at
     */
    public function deleteAt($at)
    {
        $deletingElement = $this->search($at);
        if ($deletingElement == $this->head){
            $this->deleteFromHead();
        }
        if ($deletingElement == $this->tail){
            $this->deleteFromEnd();
        }
        $prevElement = $deletingElement->getPrevious();
        $nextElement = $deletingElement->getNext();

        $prevElement->setNext($nextElement);
        $nextElement->setPrevious($prevElement);
    }

    /**
     * @param $at
     * @return |null
     */
    public function search($at)
    {
//        if (empty($this->head)){
//            throw new RuntimeException('List is empty');
//        }
//        $start = $this->head;
//        while ($start !== $this->tail){
//            if (strcmp($start->getValue(), $at) == 0) {
//                return $start;
//            }
//            $start = $start->getNext();
//        }

        $item = $this->head;
        for ($i = 0; ;$i++) {
            if ($item->getValue() === $at) {
                return $item;
            }
            if ($item->getNext() === null) {
                break;
            }
            $item = $item->getNext();
        }
        return null;
    }

    /**
     * @return string|null
     */
    public function __toString()
    {
        $start = $this->head;
        $s = null;
        do {
            $s = $s. ' ' . $start->getValue() . ' ';
            $start = $start->getNext();
        } while ($start != null);
        return $s;
    }


}





