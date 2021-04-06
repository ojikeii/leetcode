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
     * @return Integer[][]
     */
    function levelOrder($root)
    {
        if ($root === null) return [];

        $traversal = [];

        // BFS
        $queue = [$root];
        while (!empty($queue)) {
            $values = [];
            $count = count($queue);
            for ($i = 0; $i < $count; $i++) {
                $node = array_shift($queue);
                if ($node === null) continue;
                $values[] = $node->val;
                $queue[] = $node->left;
                $queue[] = $node->right;
            }
            if (!empty($values)) {
                $traversal[] = $values;
            }
        }

        // DFS
        //$this->levelOrderPrivate($root, 0, $traversal);

        return $traversal;
    }

    /*
    private function levelOrderPrivate($node, $level, &$traversal)
    {
        if ($node === null) return;

        if (array_key_exists($level, $traversal)) {
            $traversal[$level][] = $node->val;
        } else {
            $traversal[$level] = [$node->val];
        }

        $this->levelOrderPrivate($node->left, $level + 1, $traversal);
        $this->levelOrderPrivate($node->right, $level + 1, $traversal);
    }
    */
}
