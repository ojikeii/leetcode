<?php

class Solution
{

    /**
     * @param String $s
     * @param Integer $numRows
     * @return String
     */
    function convert($s, $numRows)
    {
        if ($numRows === 1) return $s;

        $len = strlen($s);
        if ($len === 1) return $s;

        $rows = [];
        for ($i = 0; $i < $numRows; $i++) {
            $rows[$i] = '';
        }

        $size = 2 * $numRows - 2;
        $curRow = 0;
        $curChunk = 1;
        $i = 0;
        while ($i < $len) {
            while ($i < $size * $curChunk - $numRows + 2) {
                $rows[$curRow] .= substr($s, $i, 1);
                $curRow++;
                $i++;
            }
            $curRow -= 2;
            while ($i < $size * $curChunk) {
                $rows[$curRow] .= substr($s, $i, 1);
                $curRow--;
                $i++;
            }
            $curChunk++;
        }

        return implode($rows);
    }
}
