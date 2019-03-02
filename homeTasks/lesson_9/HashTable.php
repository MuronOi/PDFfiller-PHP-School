<?php

class HashTable
{
    /** @var array  */
    private $storage = [];

    /** @var int */
    private $hashTableMaxLength;

    /** @var ResolverInterface  */
    private $collisionResolver;

    /**
     * HashTable constructor.
     * @param $hashTableMaxLength
     * @param ResolverInterface $colisionResolver
     */
    public function __construct($hashTableMaxLength, ResolverInterface $colisionResolver)
    {
        $this->hashTableMaxLength = $hashTableMaxLength;
        $this->collisionResolver = $colisionResolver;
    }

    public function write($index, $value) {
        if(isset($this->storage[$index]) && !empty($this->storage[$index])) {
            $this->collisionResolver->resolveIn($index, $value, $this->storage, $this->hashTableMaxLength);

        } else {
            $this->storage[$index] = $value;
        }
    }

    public function get($index, $value){
        if($this->storage[$index] === $value) {
            return $this->storage[$index];
        } else {
            return $this->collisionResolver->resolveOut($index, $value, $this->storage, $this->hashTableMaxLength);            ;
        }
    }
}


