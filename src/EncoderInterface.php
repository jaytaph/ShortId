<?php

namespace Noxlogic\ShortId;

interface EncoderInterface
{
    /**
     * @return string
     */
    function encode($content);
}

