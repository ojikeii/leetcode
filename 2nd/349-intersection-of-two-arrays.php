<?php

class Solution
{

    /**
     * @param Integer[] $nums1
     * @param Integer[] $nums2
     * @return Integer[]
     */
    function intersection($nums1, $nums2)
    {
        $count1 = count($nums1);
        $count2 = count($nums2);

        if ($count1 === 0 || $count2 === 0) return [];

        $map2 = [];
        foreach ($nums2 as $n) {
            if (!array_key_exists($n, $map2)) $map2[$n] = true;
        }

        $ret = [];
        foreach ($nums1 as $n1) {
            if (array_key_exists($n1, $map2) && $map2[$n1]) {
                $ret[] = $n1;
                $map2[$n1] = false;
            }
        }

        return $ret;

        /*
        $ret = [];
        foreach ($nums1 as $n1) {
            if (!in_array($n1, $ret, true) && in_array($n1, $nums2, true)) {
                $ret[] = $n1;
            }
        }

        return $ret;
        */
    }
}
