<?php

class Solution
{

    private $subsets = [];
    private $stack = [];

    /**
     * @param Integer[] $nums
     * @return Integer[][]
     */
    function subsets($nums)
    {
        $this->subsetsPrivate($nums, count($nums), 0);
        return $this->subsets;
    }

    private function subsetsPrivate(&$nums, $count, $start)
    {
        $this->subsets[] = $this->stack;

        if ($count === count($this->stack)) {
            return;
        }

        for ($i = $start; $i < $count; $i++) {
            $this->stack[] = $nums[$i];
            $this->subsetsPrivate($nums, $count, $i + 1);
            array_splice($this->stack, count($this->stack) - 1, 1);
        }
    }
}
