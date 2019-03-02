<?php

interface ResolverInterface
{
    public function resolveIn($index, $hranilishche, $size);
    public function resolveOut($index, $hranilishche, $size, $value);
}