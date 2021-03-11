<?php


class Solution
{

    /**
     * @param String[] $emails
     * @return Integer
     */
    function numUniqueEmails($emails)
    {
        $count = count($emails);
        if ($count === 1) return 1;

        $map = [];
        foreach ($emails as $email) {
            [$localTemp, $domain] = explode('@', $email);
            $local = str_replace('.', '', explode('+', $localTemp)[0]);
            $normalized = implode('@', [$local, $domain]);

            /*
            $at = strpos($email, '@');
            $local = substr($email, 0, $at);
            $plus = strpos($local, '+');
            if (false !== $plus) {
                $local = substr($local, 0, $plus);
            }
            $local = str_replace('.', '', $local);
            $normalized = $local . substr($email, $at);
            */

            /*
            $len = strlen($email);

            $normalized = '';
            for ($i = 0; $i < $len; $i++) {
                $c = substr($email, $i, 1);
                if ($c === '@') {
                    $normalized .= substr($email, $i);
                    break;
                }

                if ($c === '+') {
                    while ($c !== '@') {
                        $i++;
                        $c = substr($email, $i, 1);
                    }
                    $normalized .= substr($email, $i);
                    break;
                }

                if ($c === '.') {
                    continue;
                }

                $normalized .= $c;
            }
            */

            if (!array_key_exists($normalized, $map)) {
                $map[$normalized] = null;
            }
        }

        return count($map);
    }
}
