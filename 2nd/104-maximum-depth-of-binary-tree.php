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
    function maxDepth($root, $depth = 0)
    {
        // DFS
        if ($root === null) return $depth;

        return max(
            $this->maxDepth($root->left, $depth + 1),
            $this->maxDepth($root->right, $depth + 1)
        );

        // BFS
        /*
        if ($root === null) return 0;
        
        $depth = -1;
        $queue = [$root];
        while (!empty($queue)) {
            $count = count($queue);
            for ($i = 0; $i < $count; $i++) {
                $node = array_shift($queue);
                if ($node !== null) {
                    $queue[] = $node->left;
                    $queue[] = $node->right;
                }
            }
            $depth++;
        }
        
        return $depth;
        */
    }
}
