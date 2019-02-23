<?php

class SeparateNode
{
    private $value1;
    private $next;
    private $previous;

    /**
     * @return mixed
     */
    public function getNext()
    {
        return $this->next;
    }

    /**
     * @param mixed $next
     */
    public function setNext($next): void
    {
        $this->next = $next;
    }

    /**
     * @return mixed
     */
    public function getPrevious()
    {
        return $this->previous;
    }

    /**
     * @param mixed $previous
     */
    public function setPrevious($previous): void
    {
        $this->previous = $previous;
    }

    /**
     * @return mixed
     */
    public function getValue1()
    {
        return $this->value1;
    }

    /**
     * @param mixed $value1
     */
    public function setValue1($value1): void
    {
        $this->value1 = $value1;
    }


}