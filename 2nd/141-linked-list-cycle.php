<?php

/**
 * Definition for a singly-linked list.
 * class ListNode {
 * public $val = 0;
 * public $next = null;
 * function __construct($val) { $this->val = $val; }
 * }
 */

class Solution
{
    /**
     * @param ListNode $head
     * @return Boolean
     */
    function hasCycle($head)
    {
        if ($head === null) return false;

        $s = $f = $head;
        do {
            if ($f->next === null) return false;
            if ($f->next->next === null) return false;

            $s = $s->next;
            $f = $f->next->next;
        } while ($s !== $f);
        return true;

        /*
        $node = $head;
        $nodes = [];
        while($node->next !== null) {
            if (in_array($node->next, $nodes, true)) return true;
            $nodes[] = $node;
            $node = $node->next;
        }
        return false;
        */
    }
}
