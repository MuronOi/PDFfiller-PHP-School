<?php

class SeparateNode
{
    private $value;
    private $next;
    private $previous;

    /**
     * SeparateNode constructor.
     * @param $value
     * @param $next
     * @param $previous
     */
    public function __construct($value, $next, $previous)
    {
        $this->value = $value;
        $this->next = $next;
        $this->previous = $previous;
    }


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
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param mixed $value
     */
    public function setValue($value): void
    {
        $this->value = $value;
    }


}