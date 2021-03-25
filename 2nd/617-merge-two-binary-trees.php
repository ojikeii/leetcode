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
     * @param TreeNode $root1
     * @param TreeNode $root2
     * @return TreeNode
     */
    function mergeTrees($root1, $root2)
    {
        if ($root1 === null) return $root2;
        if ($root2 === null) return $root1;

        // DFS
        $root1->val += $root2->val;
        if ($root1->left === null) {
            $root1->left = $root2->left;
        } else {
            $this->mergeTrees($root1->left, $root2->left);
        }
        if ($root1->right === null) {
            $root1->right = $root2->right;
        } else {
            $this->mergeTrees($root1->right, $root2->right);
        }
        return $root1;

        // BFS
        /*
        $queue1 = [$root1];
        $queue2 = [$root2];
        while(!empty($queue1)) {
            $count = count($queue1);
            for ($i = 0; $i < $count; $i++) {
                $node1 = array_shift($queue1);
                $node2 = array_shift($queue2);
                $node1->val += $node2->val;
                
                if ($node1->left === null) {
                    $node1->left = $node2->left;
                } else {
                    $queue1[] = $node1->left;
                    $queue2[] = $node2->left;
                }
                if ($node1->right === null) {
                    $node1->right = $node2->right;
                } else {
                    $queue1[] = $node1->right;
                    $queue2[] = $node2->right;
                }
            }
        }
        return $root1;
        */
    }
}
