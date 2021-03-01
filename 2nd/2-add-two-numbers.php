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
     * @param ListNode $l1
     * @param ListNode $l2
     * @return ListNode
     */
    function addTwoNumbers($l1, $l2)
    {
        $dummy = new ListNode();
        $cur = $dummy;
        $c = 0;

        $first = $l1;
        $second = $l2;
        while ($first !== null || $second !== null) {
            $sum = ($first !== null) ? $first->val : 0;
            $sum += ($second !== null) ? $second->val : 0;
            $sum += $c;
            $v = $sum % 10;
            $cur->next = new ListNode($v);
            $c = ($sum >= 10) ? 1 : 0;
            if ($first !== null) $first = $first->next;
            if ($second !== null) $second = $second->next;
            $cur = $cur->next;
        }

        if ($c > 0) $cur->next = new ListNode(1);

        return $dummy->next;
    }
}
