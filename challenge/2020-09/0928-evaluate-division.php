<?php

class Solution
{

    /**
     * @param String[][] $equations
     * @param Float[] $values
     * @param String[][] $queries
     * @return Float[]
     */
    function calcEquation($equations, $values, $queries)
    {
        $count = count($equations);
        $map = [];
        for ($i = 0; $i < $count; $i++) {
            $n = $equations[$i][0];
            $d = $equations[$i][1];
            $value = $values[$i];
            $map[$d][$n] = $value;
            $map[$n][$d] = 1 / $value;
        }

        //var_dump($map);

        $qCount = count($queries);
        $answers = [];
        for ($i = 0; $i < $qCount; $i++) {
            $found = false;
            $trace = [];
            $this->search($queries[$i][1], $queries[$i][0], $map, $found, $trace);
            // var_dump($trace);
            if ($found) {
                $ret = 1;
                $tCount = count($trace);
                for ($j = 0; $j < $tCount - 1; $j++) {
                    $ret *= $map[$trace[$j]][$trace[$j + 1]];
                }
                $answers[] = $ret;
            } else {
                $answers[] = -1.0;
            }
        }

        return $answers;
    }

    function search($src, $dst, &$map, &$found, &$trace)
    {
        if (!array_key_exists($src, $map)) {
            return;
        }

        $trace[] = $src;
        if ($src == $dst) {
            $found = true;
            return;
        }

        foreach ($map[$src] as $k => $v) {
            if ($found) continue;
            if (in_array($k, $trace)) {
                continue;
            }

            $this->search($k, $dst, $map, $found, $trace);
        }

        if (!$found) array_pop($trace);
    }
}
