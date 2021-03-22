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
    function maxDepth($root, $depth = 0)
    {
        if ($root === null) return $depth;

        return max(
            $this->maxDepth($root->left, $depth + 1),
            $this->maxDepth($root->right, $depth + 1)
        );
    }
}
