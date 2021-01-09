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
        if ($count === 0) return null;

        $middle = ($count % 2 === 0) ? $count / 2  - 1 : ($count - 1) / 2;
        $leftNums = ($middle > 0) ? array_slice($nums, 0, $middle) : [];
        $rightNums = ($middle < $count - 1) ? array_slice($nums, $middle + 1, $count - $middle - 1) : [];

        return new TreeNode($nums[$middle], $this->sortedArrayToBST($leftNums), $this->sortedArrayToBST($rightNums));
    }
}
