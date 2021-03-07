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
        if (empty($nums1) || empty($nums2)) return [];

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

        // Poor solution
        /*
        $sums = [];
        foreach($nums1 as $n1) {
            foreach($nums2 as $n2) {
                $sums[] = [$n1, $n2];
            }
        }
        
        usort($sums, function ($a, $b) {
            $s1 = $a[0] + $a[1];
            $s2 = $b[0] + $b[1];
            
            if ($s1 === $s2) return 0;
            if ($s1 > $s2) return 1;
            return -1;
        });
        
        return array_slice($sums, 0, $k);
        */
    }
}
