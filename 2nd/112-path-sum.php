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
     * @param Integer $targetSum
     * @return Boolean
     */
    function hasPathSum($root, $targetSum, $currentSum = 0)
    {
        if ($root === null) return false;

        // DFS
        $currentSum += $root->val;
        if ($root->left === null && $root->right === null) return $currentSum === $targetSum;

        return $this->hasPathSum($root->left, $targetSum, $currentSum)
            || $this->hasPathSum($root->right, $targetSum, $currentSum);

        // BFS
        /*
        $queue = [[0, $root]];
        while (!empty($queue)) {
            [$currentSum, $node] = array_shift($queue);
            if ($node === null) continue;
            $currentSum += $node->val;
            if ($node->left === null && $node->right === null) {
                if ($currentSum === $targetSum) return true;
            }
            $queue[] = [$currentSum, $node->left];
            $queue[] = [$currentSum, $node->right];
        }

        return false;
        */
    }
}
