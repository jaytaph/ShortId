<?php

namespace Noxlogic\ShortId;

use Noxlogic\ShortId\Exception\GeneratorNotFoundException;

class GeneratorFactory
{

    const GMP = "gmp";
    const PLAIN = "plain";

    /**
     * @param $type
     * @return GeneratorInterface
     */
    static public function createGenerator($type)
    {

        $class = "NoxLogic\\ShortId\\Generator\\".$type;
        if (! class_exists($class)) {
            throw new GeneratorNotFoundException(sprintf("Generator of type '%s' does not exist", $type));
        }

        $generator = new $class();
        return $generator;
    }
}

