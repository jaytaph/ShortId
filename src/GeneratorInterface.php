<?php

namespace Noxlogic\ShortId;

interface GeneratorInterface
{
    /**
     * @return string
     */
    function generate($seconds, $random);
}

