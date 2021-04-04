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
     * @param Integer[] $nums
     * @return TreeNode
     */
    function sortedArrayToBST($nums)
    {
        $count = count($nums);
        if ($count === 1) return new TreeNode($nums[0]);
        return $this->BST(0, $count - 1, $nums);
    }

    private function BST($left, $right, &$nums)
    {
        if ($left > $right) return null;

        $middle = $left + intdiv($right - $left, 2);

        $node = new TreeNode($nums[$middle]);
        $node->left = $this->BST($left, $middle - 1, $nums);
        $node->right = $this->BST($middle + 1, $right, $nums);

        return $node;
    }
}
