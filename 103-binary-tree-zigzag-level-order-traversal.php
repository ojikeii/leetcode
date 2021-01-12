<?php

/**
 * Definition for a binary tree node.
 * class TreeNode {
 *     public $val = null;
 *     public $left = null;
 *     public $right = null;
 *     function __construct($val = 0, $left = null, $right = null) {
 *         $this->val = $val;
 *         $this->left = $left;
 *         $this->right = $right;
 *     }
 * }
 */
class Solution {

    /**
     * @param TreeNode $root
     * @return Integer[][]
     */
    function zigzagLevelOrder($root) {
        $traversal = [];
        $queue = new SplQueue();
        $queue->enqueue($root);
        $count = 1;
        $level = 0;
        while ($count > 0) {
            $order = [];
            for ($i = 0; $i < $count; $i++) {
                $node = $queue->dequeue();
                if ($node === null) continue;
                $order[] = $node->val;
                $queue->enqueue($node->left);
                $queue->enqueue($node->right);
            }
            if (!empty($order)) {
                if ($level % 2 === 0) {
                    $order = array_reverse($order);
                }
                $traversal[] = $order;
            }
            $level++;
            $count = count($queue);
        }

        return $traversal;
    }
}