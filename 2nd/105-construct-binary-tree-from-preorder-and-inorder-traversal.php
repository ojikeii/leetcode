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
    private $preIndex = 0;

    /**
     * @param Integer[] $preorder
     * @param Integer[] $inorder
     * @return TreeNode
     */
    function buildTree($preorder, $inorder)
    {
        return $this->build($preorder, $inorder, 0, count($inorder) - 1);
    }

    private function build(&$preorder, &$inorder, $left, $right)
    {
        if ($left > $right) return null;

        $rootVal = $preorder[$this->preIndex];
        $this->preIndex++;
        $rootIndex = false;
        for ($i = $left; $i <= $right; $i++) {
            if ($inorder[$i] === $rootVal) {
                $rootIndex = $i;
                break;
            }
        }
        if ($rootIndex === false) return null;
        $root = new TreeNode($rootVal);
        $root->left = $this->build($preorder, $inorder, $left, $rootIndex - 1);
        $root->right = $this->build($preorder, $inorder, $rootIndex + 1, $right);
        return $root;
    }
}
