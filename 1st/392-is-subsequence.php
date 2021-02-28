<?php

class Solution
{

    /**
     * @param String $s
     * @param String $t
     * @return Boolean
     */
    function isSubsequence($s, $t)
    {
        $tlen = strlen($t);
        $slen = strlen($s);
        if ($slen === 0) return true;
        if ($tlen === 0) return false;
        if ($s === $t) return true;

        for ($sPos = 0, $tPos = 0; $tPos < $tlen; $tPos++) {
            if (substr($s, $sPos, 1) === substr($t, $tPos, 1)) {
                if ($sPos === $slen - 1) return true;
                $sPos++;
            }
        }
        return false;

        /*
        $prevPos = -1;
        for ($i = 0; $i < $slen; $i++) {
            $schar = substr($s, $i, 1);
            $pos = -1;
            for ($j = $prevPos + 1; $j < $tlen; $j++) {
                $tchar = substr($t, $j, 1);
                if ($tchar === $schar) {
                    $pos = $j;
                    break;
                }
            }
            if ($pos === -1) return false;
            $prevPos = $pos;
        }

        return true;
        */
    }
}
