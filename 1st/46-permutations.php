<?php

class Solution
{
    private $permutations = [];
    private $count;
    private $stack = [];

    /**
     * @param Integer[] $nums
     * @return Integer[][]
     */
    function permute($nums)
    {
        $this->count = count($nums);
        $this->makePermutation($nums);
        return $this->permutations;
    }

    function makePermutation(&$nums)
    {
        if (count($this->stack) === $this->count) {
            $this->permutations[] = $this->stack;
            return;
        }

        for ($i = 0; $i < $this->count; $i++) {
            if (in_array($nums[$i], $this->stack)) {
                continue;
            }

            $this->stack[] = $nums[$i];
            $this->makePermutation($nums);
            array_splice($this->stack, count($this->stack) - 1, 1);
        }
    }
}
