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
class Solution
{
    /**
     * @param TreeNode $root
     * @return Integer
     */
    function minDepth($root)
    {
        if ($root === null) return 0;

        $queue = new SplQueue();
        $queue->enqueue($root);
        $depth = 0;
        while (!empty($queue)) {
            $depth++;
            $size = count($queue);
            for ($i = 0; $i < $size; $i++) {
                $node = $queue->dequeue();
                if ($node->left === null && $node->right === null) {
                    return $depth;
                }
                if ($node->left !== null) $queue->enqueue($node->left);
                if ($node->right !== null) $queue->enqueue($node->right);
            }
        }

        throw new Exception("No leaf node!");
    }
}
