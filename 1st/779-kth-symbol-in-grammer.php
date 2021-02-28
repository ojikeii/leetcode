<?php

class Solution {

    /**
     * @param Integer $N
     * @param Integer $K
     * @return Integer
     */
    function kthGrammar($N, $K) 
    {
        if ($N === 1) return 0;
        if ($K % 2 === 0) {
            if ($this->kthGrammar($N - 1, $K / 2) === 1) return 0;
            return 1;
        } else {
            if ($this->kthGrammar($N - 1, ($K + 1) / 2) === 1) return 1;
            return 0;
        }
    }
    
}
