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
     * @return Integer[][]
     */
    function zigzagLevelOrder($root)
    {
        if ($root === null) return [];

        $traversal = [];

        // BFS
        $queue = [$root];
        $leftToRight = true;
        while (!empty($queue)) {
            $values = [];
            $count = count($queue);
            for ($i = 0; $i < $count; $i++) {
                $node = array_shift($queue);
                if ($node === null) continue;
                $values[] = $node->val;
                $queue[] = $node->left;
                $queue[] = $node->right;
            }
            if (!empty($values)) {
                if (!$leftToRight) {
                    $values = array_reverse($values);
                }
                $traversal[] = $values;
            }
            $leftToRight = !$leftToRight;
        }

        return $traversal;
    }
}
