<?php

require_once __DIR__.'/CollisionResolverInterface.php';

class ResolveCollisionsPlus1 implements ResolverInterface
{
    public function resolveIn($index, $value, &$hranilishche, $size)
    {
        $flag = false;
        for ($j = $index + 1; ; $j++) {
            if ($j >= $size) {
                if ($flag) {
                    throw Exception('Our table is full');
                }

                $j = 0;
                $flag = true;
            }

            if (isset($hranilishche[$j]) && !empty($hranilishche[$j])) {
                continue;
            } else {
                $hranilishche[$j] = $value;
                break;
            }
        }
    }
    public function resolveOut($index, $value, &$hranilishche, $size)
    {
        $flag = false;
        for ($j = $index + 1; ; $j++) {
            if ($j >= $size) {
                if ($flag) {
                    throw Exception('Our table is full');
                }

                $j = 0;
                $flag = true;
            }

            if($hranilishche[$j] !== $value){
                continue;
            } else {
                return $hranilishche[$j];
            }
        }
    }
}