<?php

class Solution
{

    /**
     * @param String $s
     * @return Boolean
     */
    function isValid($s)
    {
        $len = strlen($s);
        if ($len === 1 || $len % 2 !== 0) return false;

        $lefts = [];
        for ($i = 0; $i < $len; $i++) {
            $p = substr($s, $i, 1);

            if (in_array($p, ['(', '{', '['], true)) {
                $lefts[] = $p;
                continue;
            }

            if (empty($lefts)) {
                return false;
            }

            $last = array_pop($lefts);
            if ($last === '(' && $p !== ')') {
                return false;
            }
            if ($last === '{' && $p !== '}') {
                return false;
            }
            if ($last === '[' && $p !== ']') {
                return false;
            }
        }
        return empty($lefts);
    }
}
