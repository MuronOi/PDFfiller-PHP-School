<?php

require_once __DIR__.'/SingleLeaf.php';

class BinaryTree extends SingleLeaf
{
    private $root = null;

    /**
     * BinaryTree constructor.
     * @param null $root
     */
    public function __construct($value)
    {
        $leaf = new SingleLeaf($value);
        $leaf->setTop(null);
        $this->root = $leaf;

    }

    public function append($value){
        $newLeaf = new SingleLeaf();
        $newLeaf->setValue($value);

//        if (empty($this->root)){
//            $this->root = $newLeaf;
//        } elseif () {
//
//        }
    }

    public function isEmpty ()
    {
        return is_null($this->root);
    }

    public function insert ($value)
    {
        $leaf = new SingleLeaf($value);
        $this->insertNode($leaf, $this->root);
    }

    protected function insertNode (SingleLeaf $node, $subtree)
    {
        if (is_null($subtree)) {
            $subtree = $node;
        } else {
            if ( is_null($subtree->getLeft())){
                $this->insertNode($node, $subtree->getLeft());
                $subtree->setLeft($node);
            } elseif (is_null($subtree->getRight())) {
                $this->insertNode($node, $subtree->getRight());
                $subtree->setRight($node);
            }
        }
        return $this;
    }
}

$obj = new BinaryTree(1);
$obj->insert(2);
$obj->insert(3);
$obj->insert(4);


var_export($obj);

