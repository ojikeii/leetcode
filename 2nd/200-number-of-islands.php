<?php

class Solution
{
    //private $grid;
    private $rowNum;
    private $colNum;
    //private $reached = [];

    /**
     * @param String[][] $grid
     * @return Integer
     */
    function numIslands($grid)
    {
        $this->rowNum = count($grid);
        $this->colNum = count($grid[0]);
        //$this->grid = $grid;

        $islandNum = 0;
        $queue = [];
        for ($row = 0; $row < $this->rowNum; $row++) {
            for ($col = 0; $col < $this->colNum; $col++) {
                if ($grid[$row][$col] === '0') continue;
                //if (isset($this->reached[$row][$col])) continue;

                // BFS
                /*
                $queue[] = [$row, $col];
                while (!empty($queue)) {
                    $pos = array_pop($queue);
                    if ($pos[0] < 0 || $pos[0] >= $this->rowNum) continue;
                    if ($pos[1] < 0 || $pos[1] >= $this->colNum) continue;
                    if ($grid[$pos[0]][$pos[1]] === '0') continue;
                    $grid[$pos[0]][$pos[1]] = '0';
                    array_unshift(
                        $queue,
                        [$pos[0], $pos[1] - 1],
                        [$pos[0], $pos[1] + 1],
                        [$pos[0] - 1, $pos[1]],
                        [$pos[0] + 1, $pos[1]]
                    );
                }
                */

                // DFS
                $this->exploreIsLand($row, $col, $grid);

                $islandNum++;
            }
        }

        return $islandNum;
    }

    function exploreIsland($row, $col, &$grid)
    {
        if ($row < 0 || $row >= $this->rowNum) return;
        if ($col < 0 || $col >= $this->colNum) return;
        if ($grid[$row][$col] === '0') return;
        //if (isset($this->reached[$row][$col])) return;

        //$this->reached[$row][$col] = true;        
        $grid[$row][$col] = '0';

        $this->exploreIsland($row, $col + 1, $grid);
        $this->exploreIsland($row, $col - 1, $grid);
        $this->exploreIsland($row + 1, $col, $grid);
        $this->exploreIsland($row - 1, $col, $grid);
    }
}
