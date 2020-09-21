<?php
class Solution
{
    private $grid;
    private $lenX;
    private $lenY;
    private $emptyCount = 0;
    private $pathCount = 0;

    /**
     * @param Integer[][] $grid
     * @return Integer
     */
    function uniquePathsIII($grid)
    {
        $this->grid = $grid;

        $startX = 0;
        $startY = 0;

        $this->lenX = count($grid);
        $this->lenY = count($grid[0]);
        for ($x = 0; $x < $this->lenX; $x++) {
            for ($y = 0; $y < $this->lenY; $y++) {
                $sqware = $grid[$x][$y];
                if ($sqware === 0) {
                    $this->emptyCount++;
                    continue;
                }
                if ($sqware === 1) {
                    $startX = $x;
                    $startY = $y;
                }
            }
        }
        $this->searchGoal($startX, $startY);
        return $this->pathCount;
    }

    function searchGoal(int $x, int $y)
    {
        if ($x < 0 || $y < 0 || $x >= $this->lenX || $y >= $this->lenY) {
            return;
        }

        $sq = $this->grid[$x][$y];
        if ($sq === -1 || $sq === 3) {
            return;
        }

        if ($sq === 2) {
            if ($this->emptyCount === 0) {
                $this->pathCount++;
            }
            return;
        }

        if ($sq === 0) {
            $this->emptyCount--;
        }

        $this->grid[$x][$y] = 3;

        $this->searchGoal($x - 1, $y);
        $this->searchGoal($x, $y - 1);
        $this->searchGoal($x, $y + 1);
        $this->searchGoal($x + 1, $y);

        if ($this->grid[$x][$y] === 3) {
            $this->emptyCount++;
            $this->grid[$x][$y] = 0;
        }
    }
}
