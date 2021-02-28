<?php

class Solution {

    /**
     * Loop solution. Runtime: 8ms
     * @param Float $x
     * @param Integer $n
     * @return Float
     */
    function myPow($x, $n)
    {
        if ($x == 0 || $x == 1) return $x;
        if ($n == 0) return 1.0;
        if ($x == -1) return ($n % 2 == 0) ? 1 : -1;
        
        if ($n < 0) {
            $n = -$n;
            $x = 1 / $x;
        }        

        $ret = 1;
        while($n > 0) {
            if ($n & 1) $ret *= $x;
            $x *= $x;
            $n >> 1;
        }

        // straightforward loop solution. Runtime: 40ms
        // for ($i = 0; $i < $n; $i++) {
        //     if ($ret == 0) break;
        //     $ret *= $x;
        // }
        
        return $ret;
    }

    // Recursive solution. Runtime: 8ms
    // function myPow($x, $n)
    // {        
    //     if ($x == 0 || $x == 1) return $x;
    //     if ($x == -1) return ($n % 2 == 0) ? 1 : -1;
    //     if ($n < 0) {
    //         $n = -$n;
    //         $x = 1 / $x;
    //     }
    //
    //     return $this->myPowPrivate($x, $n);
    // }
    //
    // private function myPowPrivate($x, $n)
    // {
    //     if ($n == 0) return 1.0;
    //     $a = ($n % 2 == 0) ? 1 : $x;
    //     return $a * $this->myPowPrivate($x * $x, $n / 2);
    // }

}