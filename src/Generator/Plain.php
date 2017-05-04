<?php

namespace Noxlogic\ShortId\Generator;

use Noxlogic\ShortId\GeneratorInterface;

/*
 * A much slower implementation, but doesn't require GMP extension
 */

class Plain implements GeneratorInterface
{

    /**
     * @return string
     */
    function generate($seconds, $random)
    {
        $_seconds = $seconds;
        $_random = $random;

        $seconds = base_convert($seconds, 10, 2);
        while (strlen($seconds) < 25) $seconds = "0" . $seconds;

        // Conversions must use 32bit numbers at a time
        $hex = "";
        while (strlen($random)) {
            $part = substr($random, -4, 4);
            $hex = sprintf("%016s", base_convert($part, 16, 2)) . $hex;
            $random = substr($random, 0, -4);
        }
        $random = $hex;

        $random = substr($random, -47);
        while (strlen($random) < 47) $random = "0" . $random;

        $id = $seconds. $random;

        // Conversions must use 32bit numbers at a time
        $num = "";
        while (strlen($id)) {
            $tmp = substr($id, -4, 4);
            $num = dechex(bindec($tmp)) . $num;
            $id = substr($id, 0, -4);
        }

        return $num;
    }
}
