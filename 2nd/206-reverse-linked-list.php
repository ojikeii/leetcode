<?php

/**
 * Definition for a singly-linked list.
 * class ListNode {
 *     public $val = 0;
 *     public $next = null;
 *     function __construct($val = 0, $next = null) {
 *         $this->val = $val;
 *         $this->next = $next;
 *     }
 * }
 */
class Solution
{

    /**
     * @param ListNode $head
     * @return ListNode
     */
    function reverseList($head)
    {
        if ($head === null || $head->next === null) return $head;

        $node = $this->reverseList($head->next);
        $head->next->next = $head;
        $head->next = null;
        return $node;

        /*
        $p = null;
        $c = $head;
        while($c !== null) {
            $next = $c->next;
            $c->next = $p;
            $p = $c;
            $c = $next;
        }
        return $p;
        */
    }
}
