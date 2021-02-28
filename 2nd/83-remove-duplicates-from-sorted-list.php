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

        $n = $head;
        while ($n->next !== null) {
            if ($n->val === $n->next->val) {
                $n->next = $n->next->next;
                continue;
            }
            $n = $n->next;
        }

        return $head;
    }
}
