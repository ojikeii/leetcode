<?php

class Solution
{

    /**
     * @param String[] $strs
     * @return String[][]
     */
    function groupAnagrams($strs)
    {
        $count = count($strs);

        if ($count === 0) return [[""]];
        if ($count === 1) return [[$strs[0]]];

        $map = [];
        foreach ($strs as $str) {
            $sp = str_split($str);
            sort($sp);
            $sorted = implode($sp);

            if (!array_key_exists($sorted, $map)) {
                $map[$sorted] = [$str];
            } else {
                $map[$sorted][] = $str;
            }
        }

        return array_values($map);
    }
}
