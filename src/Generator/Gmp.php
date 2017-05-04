<?php

namespace Noxlogic\ShortId\Generator;

use Noxlogic\ShortId\Exception\ExtensionNotFoundException;
use Noxlogic\ShortId\GeneratorInterface;

class Gmp implements GeneratorInterface
{


    /**
     * Gmp constructor.
     */
    public function __construct()
    {
        if (! function_exists("gmp_init")) {
            // @codeCoverageIgnoreStart
            throw new ExtensionNotFoundException("The GMP generator needs the GMP extension.");
            // @codeCoverageIgnoreEnd
        }
    }

    function generate($seconds, $random)
    {
        $_seconds = $seconds;
        $_random = $random;

        $random = gmp_init("0x".$random);
        $random = gmp_and($random, gmp_init('0x7FFFFFFFFFFF', 16));     // Mask random lower 47 bits

        $id = gmp_init($seconds, 2);            // Create timestamp
        $id = gmp_mul($id, gmp_pow(2, 47));     // Shift left timestamp 47 bits
        $id = gmp_or($id, $random);             // Add random number

        // Make sure id is padded 18 chars (2 chars per byte)
        return sprintf("%018s", gmp_strval($id, 16));
    }
}
