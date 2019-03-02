<?php

interface ResolverInterface
{
    public function resolveIn($index, $value, &$hranilishche, $size);
    public function resolveOut($index, $value, &$hranilishche, $size);
}