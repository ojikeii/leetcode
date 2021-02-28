<?php

/**
 * Definition for a singly-linked list.
 * class ListNode {
 *     public $val = 0;
 *     public $next = null;
 *     function __construct($val) { $this->val = $val; }
 * }
 */

class Solution
{
    /**
     * @param ListNode $head
     * @return ListNode
     */
    function detectCycle($head)
    {
        if ($head === null) return null;

        $s = $f = $head;
        do {
            if ($f->next === null) return null;
            if ($f->next->next === null) return null;

            $s = $s->next;
            $f = $f->next->next;
        } while ($s !== $f);

        $h = $head;
        while ($h !== $s) {
            $h = $h->next;
            $s = $s->next;
        }

        return $s;
    }
}
