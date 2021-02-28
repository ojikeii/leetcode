<?php

/**
 * Definition for a binary tree node.
 * class TreeNode {
 * public $val = null;
 * public $left = null;
 * public $right = null;
 * function __construct($val = 0, $left = null, $right = null) {
 * $this->val = $val;
 * $this->left = $left;
 * $this->right = $right;
 * }
 * }
 */
class Solution
{
    private $current;
    private $max;

    /**
     * @param TreeNode $root
     * @return Integer
     */
    function maxDepth($root)
    {
        if ($root === null) return 0;

        $this->current = 1;
        $this->max = 1;

        $this->depth($root);

        return $this->max;
    }

    function depth($node)
    {
        if ($node->left === null && $node->right === null) {
            if ($this->max < $this->current) {
                $this->max = $this->current;
            }
            return;
        }

        $this->current++;

        if ($node->left !== null) {
            $this->depth($node->left);
        }

        if ($node->right !== null) {
            $this->depth($node->right);
        }

        $this->current--;
    }
}
