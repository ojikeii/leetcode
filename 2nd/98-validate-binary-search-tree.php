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
     * @return Boolean
     */
    function isValidBST($root, $lower = PHP_INT_MIN, $upper = PHP_INT_MAX)
    {
        // DFS
        if ($root === null) return true;
        if ($root->val <= $lower || $root->val >= $upper) return false;

        return $this->isValidBST($root->left, $lower, $root->val)
            && $this->isValidBST($root->right, $root->val, $upper);

        // BFS
        /*
        $queue = [[$root, PHP_INT_MIN, PHP_INT_MAX]];
    
        while(!empty($queue)) {
            [$node, $lower, $upper] = array_shift($queue);
            if ($node === null) continue;
            if ($node->val <= $lower || $node->val >= $upper) return false;
            $queue[] = [$node->left, $lower, $node->val];
            $queue[] = [$node->right, $node->val, $upper];
        }
        
        return true;
        */
    }
}
