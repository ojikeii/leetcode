<?php

class Solution
{

    /**
     * @param String $s
     * @param String[] $wordDict
     * @return Boolean
     */
    function wordBreak($s, $wordDict)
    {
        $count = count($wordDict);
        if ($count === 0) return false;

        $len = strlen($s);
        $dp = [true];
        for ($i = 1; $i <= $len; $i++) {
            for ($j = 0; $j < $i; $j++) {
                $substr = substr($s, $j, $i - $j);
                if ($dp[$j] && in_array($substr, $wordDict, true)) {
                    $dp[$i] = true;
                    break;
                }
            }
        }

        return isset($dp[$len]) && $dp[$len];

        // Poor solution(time limit exceeded)
        // return $this->wordBreakPrivate($s, $wordDict, 0);
    }

    /*
    private function wordBreakPrivate(&$s, &$wordDict, $start)
    {
        $len = strlen($s);
        if ($start === $len) return true;

        $list = [];
        foreach ($wordDict as $word) {
            $pos = strpos($s, $word, $start);
            if ($pos === $start) {
                $list[] = $word;
            }
        }

        if (empty($list)) return false;

        $ret = false;
        foreach ($list as $word) {
            $ret = $ret || $this->wordBreakPrivate($s, $wordDict, $start + strlen($word));
            if ($ret) break;
        }

        return $ret;
    }
    */
}
