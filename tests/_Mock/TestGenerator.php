<?php

namespace Noxlogic\ShortId\Tests\_Mock;

use Noxlogic\ShortId\GeneratorInterface;

class TestGenerator implements GeneratorInterface
{
    protected $seconds;
    protected $random;

    public function __construct($seconds, $random)
    {
        $this->seconds = $seconds;
        $this->random = $random;
    }


    function generate($seconds, $random)
    {
        return $this->seconds . $this->random;
    }
}
