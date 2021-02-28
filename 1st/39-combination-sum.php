<?php

class Solution
{
    private $stack = [];
    private $combinations = [];

    /**
     * @param Integer[] $candidates
     * @param Integer $target
     * @return Integer[][]
     */
    function combinationSum($candidates, $target)
    {
        $this->combination($candidates, count($candidates), $target, 0);
        return $this->combinations;
    }

    private function combination(&$candidates, $count, $target, $start)
    {
        if ($target < 0) {
            return;
        }

        if ($target === 0) {
            $this->combinations[] = $this->stack;
            return;
        }

        for ($i = $start; $i < $count; $i++) {
            $c = $candidates[$i];
            $this->stack[] = $c;
            $this->combination($candidates, $count, $target - $c, $i);
            array_pop($this->stack);
        }
    }
}
