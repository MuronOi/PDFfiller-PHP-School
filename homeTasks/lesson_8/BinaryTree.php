<?php

require_once __DIR__.'/SingleLeaf.php';

class BinaryTree extends SingleLeaf
{
    private $root = null;

    /**
     * BinaryTree constructor.
     * @param $value
     */
    public function __construct($value)
    {
        $leaf = new SingleLeaf($value);
//        $leaf->setTop(null);
        $this->root = $leaf;
    }

    public function isEmpty ()
    {
        return is_null($this->root);
    }

    public function append ($value)
    {
        if ($this->root == null) {
            $this->root = new SingleLeaf($value);
        } else {
            $subtree = $this->root;
            while (true) {
                if ($subtree->getLeft()) {
                    $subtree = $subtree->getLeft();
                } else {
                    $subtree->setLeft(new SingleLeaf($value));
                    break;
                }
                if ($subtree->getRight()) {
                    $subtree = $subtree->getRight();
                } else {
                    $subtree->setRight(new SingleLeaf($value));
                    break;
                }

            }
        }

    }
}

$obj = new BinaryTree(1);
$obj->append(2);
$obj->append(3);
$obj->append(4);
$obj->append(5);
$obj->append(7);



var_export($obj);

