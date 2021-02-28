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
     * @param Integer $sum
     * @return Boolean
     */
    function hasPathSum($root, $sum)
    {
        return $this->has($root, $sum, 0);
    }

    function has($node, $sum, $current)
    {
        if ($node === null) return false;

        $current += $node->val;
        return ($current === $sum && $node->left === null && $node->right === null) ||
            $this->has($node->left, $sum, $current) ||
            $this->has($node->right, $sum, $current);
    }
}
