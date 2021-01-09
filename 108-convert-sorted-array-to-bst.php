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
        return $this->convert($nums, 0, count($nums) - 1);
    }

    function convert($nums, $left, $right)
    {
        if ($right < $left) return null;

        $middle = $left + (int)(($right - $left) / 2);

        return new TreeNode(
            $nums[$middle],
            $this->convert($nums, $left, $middle - 1),
            $this->convert($nums, $middle + 1, $right)
        );
    }
}
