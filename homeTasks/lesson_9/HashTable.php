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
            $newIndex = $this->collisionResolver->resolveIn($index, $this->storage, $this->hashTableMaxLength);
            $this->storage[$newIndex] = $value;
        } else {
            $this->storage[$index] = $value;
        }
    }

    public function get($index, $value){
        if($this->storage[$index] === $value) {
            return $this->storage[$index];
        } else {
            $newIndex = $this->collisionResolver->resolveOut($index, $this->storage, $this->hashTableMaxLength, $value);
            return $this->storage[$newIndex];
        }
    }
}


