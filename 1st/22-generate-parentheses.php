<?php

class Solution
{
    private $stack = [];
    private $parentheses = [];

    /**
     * @param Integer $n
     * @return String[]
     */
    function generateParenthesis($n)
    {
        $this->generate(0, 0, $n);
        return $this->parentheses;
    }

    private function generate($left, $right, $n)
    {
        if (count($this->stack) === $n * 2) {
            $this->parentheses[] = implode($this->stack);
            return;
        }

        if ($left < $n) {
            $this->stack[] = '(';
            $this->generate($left + 1, $right, $n);
            array_pop($this->stack);
        }
        if ($right < $left) {
            $this->stack[] = ')';
            $this->generate($left, $right + 1, $n);
            array_pop($this->stack);
        }
    }
}
