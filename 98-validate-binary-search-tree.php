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
     * @return Boolean
     */
    function isValidBST($root)
    {
        return $this->isValid($root, PHP_INT_MIN, PHP_INT_MAX);
    }

    function isValid($node, $min, $max)
    {
        if ($node === null) return true;
        if ($node->val <= $min || $node->val >= $max) return false;
        return $this->isValid($node->left, $min, $node->val) &&
            $this->isValid($node->right, $node->val, $max);
    }
}