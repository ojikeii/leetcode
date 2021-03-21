<?php

class Solution
{
    private $rowNum;
    private $colNum;

    /**
     * @param Integer[][] $grid
     * @return Integer
     */
    function maxAreaOfIsland($grid)
    {
        $this->rowNum = count($grid);
        $this->colNum = count($grid[0]);

        $maxArea = 0;
        for ($row = 0; $row < $this->rowNum; $row++) {
            for ($col = 0; $col < $this->colNum; $col++) {
                if ($grid[$row][$col] === 0) continue;

                // DFS
                $area = $this->exploreIsLand($row, $col, $grid);
                $maxArea = ($area > $maxArea) ? $area : $maxArea;
            }
        }

        return $maxArea;
    }

    function exploreIsland($row, $col, &$grid)
    {
        if ($row < 0 || $row >= $this->rowNum) return 0;
        if ($col < 0 || $col >= $this->colNum) return 0;
        if ($grid[$row][$col] === 0) return 0;

        $area = 1;
        $grid[$row][$col] = 0;

        $area += $this->exploreIsland($row, $col + 1, $grid);
        $area += $this->exploreIsland($row, $col - 1, $grid);
        $area += $this->exploreIsland($row + 1, $col, $grid);
        $area += $this->exploreIsland($row - 1, $col, $grid);

        return $area;
    }
}
