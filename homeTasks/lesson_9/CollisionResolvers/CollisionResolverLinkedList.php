<?php

require_once __DIR__.'/CollisionResolverInterface.php';
require_once dirname(__DIR__, 2).'/lesson_8/LinkedList.php';
require_once dirname(__DIR__, 2).'/lesson_8/SeparateNode.php';


class CollisionResolverLinkedList implements ResolverInterface
{
    private $list;

    /**
     * @param $index
     * @param $value
     * @param $hranilishche
     * @param $size
     */
    public function resolveIn($index, $value, &$hranilishche, $size)
    {
        if ($hranilishche[$index] instanceof SplDoublyLinkedList){
            $hranilishche[$index]->push($value);
        } else {
            $list = new SplDoublyLinkedList();
            $list->push($hranilishche[$index]);
            $list->push($value);
            $hranilishche[$index] = $list;
        }
    }

    public function resolveOut($index, $value, &$hranilishche, $size)
    {
        $element = $hranilishche[$index]->search($value);
        return $element->getValue();
    }
}