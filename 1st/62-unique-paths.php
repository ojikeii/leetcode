<?php

class Solution {

    /**
     * @param Integer $m
     * @param Integer $n
     * @return Integer
     */
    function uniquePaths($m, $n)
    {
        // Straightfoward solution. Runtime: 16ms
        // calculate (n+m-2)_P_(n-1) / (n-1)!
        // $small = ($m > $n) ? $n : $m;
        // return intdiv(
        //     self::permutation($n + $m - 2, $small - 1), 
        //     self::fact($small - 1));
        
        // DP solution. Rumtime: 4ms
        $dp = [];
        for ($i = 0; $i < $m; $i++) {
            for ($j = 0; $j < $n; $j++) {
                $dp[$i][$j] = ($i === 0 || $j === 0) ? 1 : $dp[$i-1][$j] + $dp[$i][$j-1];
            }
        }
        return $dp[$m-1][$n-1];
        
        
    }
    
    // private static function permutation($n, $m)
    // {
    //     if ($n === 0 || $m === 0) return 1;
        
    //     $ret = $n;
    //     for ($i = 1; $i < $m; $i++) {
    //         $ret *= $n - $i;
    //     }
    //     return $ret;
    // }
    
    // private static function fact($n)
    // {
    //     return self::permutation($n, $n);
    // }
}