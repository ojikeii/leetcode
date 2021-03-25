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
    function minDepth($root/*, $depth = 0*/)
    {
        // BFS
        if ($root === null) return 0;
        $depth = 0;
        $queue = [$root];
        while (!empty($queue)) {
            $depth++;
            $count = count($queue);
            for ($i = 0; $i < $count; $i++) {
                $node = array_shift($queue);
                if ($node->left === null && $node->right === null) {
                    return $depth;
                }
                if ($node->left !== null) {
                    $queue[] = $node->left;
                }
                if ($node->right !== null) {
                    $queue[] = $node->right;
                }
            }
        }

        // DFS
        /*
        if ($root === null) return $depth;
        if ($root->left === null && $root->right === null) return $depth + 1;
        if ($root->left === null) {
            return $this->minDepth($root->right, $depth + 1);
        }
        if ($root->right === null) {
            return $this->minDepth($root->left, $depth + 1);
        }
        return min(
            $this->minDepth($root->left, $depth + 1),
            $this->minDepth($root->right, $depth + 1)
        );
        */
    }
}
