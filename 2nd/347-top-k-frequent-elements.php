<?php

class Solution
{

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer[]
     */
    function topKFrequent($nums, $k)
    {
        $map = [];
        foreach ($nums as $num) {
            if (array_key_exists($num, $map)) {
                $map[$num]++;
                continue;
            }
            $map[$num] = 1;
        }

        $pq = new SplPriorityQueue();
        $pq->setExtractFlags(SplPriorityQueue::EXTR_PRIORITY);
        foreach ($map as $n => $c) {
            if ($pq->count() < $k) {
                $pq->insert($n, -$c);
            } else if (-$c < $pq->top()) {
                $pq->extract();
                $pq->insert($n, -$c);
            }
        }

        $pq->setExtractFlags(SplPriorityQueue::EXTR_DATA);
        $ret = [];
        foreach ($pq as $n) {
            $ret[] = $n;
        }

        return $ret;
    }
}
