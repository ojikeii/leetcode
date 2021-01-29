<?php

class Solution
{

    /**
     * @param Integer[][] $obstacleGrid
     * @return Integer
     */
    function uniquePathsWithObstacles($obstacleGrid)
    {
        $m = count($obstacleGrid);
        $n = count($obstacleGrid[0]);

        if ($obstacleGrid[0][0] === 1) return 0;
        if ($obstacleGrid[$m - 1][$n - 1] === 1) return 0;

        $dp = [];
        for ($i = 0; $i < $m; $i++) {
            for ($j = 0; $j < $n; $j++) {
                if ($obstacleGrid[$i][$j] === 1) {
                    $dp[$i][$j] = 0;
                    continue;
                }
                if ($i === 0 && $j === 0) {
                    $dp[$i][$j] = 1;
                    continue;
                }
                if ($i === 0) {
                    $dp[$i][$j] = $dp[$i][$j - 1];
                } else if ($j === 0) {
                    $dp[$i][$j] = $dp[$i - 1][$j];
                } else {
                    $dp[$i][$j] = $dp[$i - 1][$j] + $dp[$i][$j - 1];
                }
            }
        }
        return $dp[$m - 1][$n - 1];
    }
}
