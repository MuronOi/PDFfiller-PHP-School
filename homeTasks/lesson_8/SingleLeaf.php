<?php

class SingleLeaf
{
    private $value;
    private $left = null;
    private $right = null;
 //   private $top = null;

    /**
     * SingleLeaf constructor.
     * @param $value
     */
    public function __construct($value)
    {
        $this->value = $value;
    }


    /**
     * @param mixed $value
     */
    public function setValue($value): void
    {
        $this->value = $value;
    }

    /**
     * @param null $left
     */
    public function setLeft($left): void
    {
        $this->left = $left;
    }

    /**
     * @param null $right
     */
    public function setRight($right): void
    {
        $this->right = $right;
    }

    /**
     * @param null $top
     */
    public function setTop($top): void
    {
        $this->top = $top;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @return null
     */
    public function getLeft()
    {
        return $this->left;
    }

    /**
     * @return null
     */
    public function getRight()
    {
        return $this->right;
    }

    /**
     * @return null
     */
    public function getTop()
    {
        return $this->top;
    }



}