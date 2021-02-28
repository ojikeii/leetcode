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
     * @param TreeNode $t1
     * @param TreeNode $t2
     * @return TreeNode
     */
    function mergeTrees($t1, $t2)
    {
        if ($t1 === null && $t2 === null) return null;
        if ($t1 === null) return $t2;
        if ($t2 === null) return $t1;

        $this->merge($t1, $t2);

        return $t1;
    }

    function merge($base, $merged)
    {
        $base->val += $merged;

        if ($base->left !== null && $merged->left !== null) {
            $this->merge($base->left, $merged->left);
        } else if ($base->left === null && $merged->left !== null) {
            $base->left = $merged->left;
        }

        if ($base->right !== null && $merged->right !== null) {
            $this->merge($base->right, $merged->right);
        } else if ($base->right === null && $merged->right !== null) {
            $base->right = $merged->right;
        }
    }
}
