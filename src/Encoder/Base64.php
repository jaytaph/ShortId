<?php

namespace Noxlogic\ShortId\Encoder;

use Noxlogic\ShortId\EncoderInterface;

class Base64 implements EncoderInterface
{
    /**
     * @return string
     */
    function encode($content)
    {
        if (strlen($content) % 2 == 1) $content .= "0";
        $content = hex2bin($content);

        return base64_encode($content);
    }
}

