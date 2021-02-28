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
    function deleteDuplicates($head)
    {
        if ($head === null || $head->next === null) return $head;

        $cur = $head;
        $dummy = new ListNode(-100, $cur);
        $prev = $dummy;
        while ($cur->next !== null) {
            if ($cur->val === $cur->next->val) {
                while ($cur->next !== null && $cur->val === $cur->next->val) $cur = $cur->next;
                $prev->next = $cur->next;
            } else {
                $prev = $cur;
            }
            $cur = $cur->next;
        }

        return $dummy->next;
    }
}
