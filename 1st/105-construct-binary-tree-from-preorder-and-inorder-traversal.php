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
    private $preorder;
    private $inorder;
    private $preIndex = 0;
    private $count;
    private $inorderMap;

    /**
     * @param Integer[] $preorder
     * @param Integer[] $inorder
     * @return TreeNode
     */
    function buildTree($preorder, $inorder) {
        $this->preorder = $preorder;
        $this->inorder = $inorder;
        $this->count = count($preorder);

        for($i = 0; $i < $this->count; $i++) {
            $this->inorderMap[$inorder[$i]] = $i;
        }

        return $this->build(0, $this->count - 1);
    }

    private function build($left, $right)
    {
        if ($left > $right) return null;
        if ($this->preIndex >= $this->count) return null;

        $val = $this->preorder[$this->preIndex++];
        $node = new TreeNode($val);

        for ($index = $left; $index <= $right; $index++) {
            if ($val === $this->inorder[$index]) break;
        }
        if (array_key_exists($val, $this->inorderMap)) {
            $index = $this->inorderMap[$val];
            $node->left = $this->build($left, $index - 1);
            $node->right = $this->build($index + 1, $right);
        }
        return $node;
    }
}