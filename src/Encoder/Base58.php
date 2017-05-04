<?php

namespace Noxlogic\ShortId\Encoder;

use Noxlogic\ShortId\EncoderInterface;

class Base58 implements EncoderInterface
{
     protected $alphabet = '123456789ABCDEFGHJKLMNPQRSTUVWXYZabcdefghijkmnopqrstuvwxyz';

    /**
     * @return string
     */
    function encode($content)
    {
        $hex = gmp_init($content, 16);

        $output = '';
        while (gmp_cmp($hex, strlen($this->alphabet)) >= 0) {
            list($hex, $mod) = gmp_div_qr($hex, strlen($this->alphabet));
            $output .= $this->alphabet[gmp_intval($mod)];
        }
        // If there's still a remainder, append it
        if (gmp_cmp($hex, 0) > 0) {
            $output .= $this->alphabet[gmp_intval($hex)];
        }
        // Now we need to reverse the encoded data
        $output = strrev($output);

        return $output;
    }
}

