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
    private $traversal = [];

    /**
     * @param TreeNode $root
     * @return Integer[][]
     */
    function levelOrder($root)
    {
        $this->traverse($root, 0);
        return $this->traversal;
    }

    function traverse($node, $level)
    {
        if ($node === null) return;
        $this->traversal[$level][] = $node->val;
        $this->traverse($node->left, $level + 1);
        $this->traverse($node->right, $level + 1);
    }
}
