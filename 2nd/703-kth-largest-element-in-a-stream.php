<?php

class KthLargest
{
    private $k;
    private $minHeap;

    /**
     * @param Integer $k
     * @param Integer[] $nums
     */
    function __construct($k, $nums)
    {
        $this->k = $k;

        $this->minHeap = new SplMinHeap();

        foreach ($nums as $n) {
            $this->add($n);
        }
    }

    /**
     * @param Integer $val
     * @return Integer
     */
    function add($val)
    {
        if ($this->minHeap->count() >= $this->k) {
            if ($val > $this->minHeap->top()) {
                $this->minHeap->extract();
                $this->minHeap->insert($val);
            }
        } else {
            $this->minHeap->insert($val);
        }
        return $this->minHeap->top();
    }
}

/**
 * Your KthLargest object will be instantiated and called as such:
 * $obj = KthLargest($k, $nums);
 * $ret_1 = $obj->add($val);
 */
