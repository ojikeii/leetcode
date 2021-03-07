<?php

class Solution
{

    /**
     * @param Integer[] $nums1
     * @param Integer[] $nums2
     * @param Integer $k
     * @return Integer[][]
     */
    function kSmallestPairs($nums1, $nums2, $k)
    {

        $pq = new SplPriorityQueue();
        $pq->setExtractFlags(SplPriorityQueue::EXTR_PRIORITY);
        foreach ($nums1 as $n1) {
            foreach ($nums2 as $n2) {
                $s = $n1 + $n2;
                if ($pq->count() < $k) {
                    $pq->insert([$n1, $n2], $s);
                } else if ($s < $pq->top()) {
                    $pq->extract();
                    $pq->insert([$n1, $n2], $s);
                } else {
                    break;
                }
            }
        }

        $pq->setExtractFlags(SplPriorityQueue::EXTR_DATA);
        $ret = [];
        foreach ($pq as $pair) {
            $ret[] = $pair;
        }

        return $ret;
    }
}
