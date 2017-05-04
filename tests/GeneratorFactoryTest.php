<?php

namespace Noxlogic\ShortId\Tests;

use Noxlogic\ShortId\Encoder\Base58;
use Noxlogic\ShortId\Encoder\Base64;
use Noxlogic\ShortId\Exception\GeneratorNotFoundException;
use Noxlogic\ShortId\Generator\Plain;
use Noxlogic\ShortId\GeneratorFactory;
use Noxlogic\ShortId\ShortId;
use Noxlogic\ShortId\Tests\_Mock\TestGenerator;

class GeneratorFactoryTest extends \PHPUnit_Framework_TestCase
{

    public function testFactoryFindsGenerators()
    {
        $this->assertInstanceOf("\\NoxLogic\\ShortId\\Generator\\Plain", GeneratorFactory::createGenerator(GeneratorFactory::PLAIN));
        if (extension_loaded('gmp')) {
            $this->assertInstanceOf("\\NoxLogic\\ShortId\\Generator\\Gmp", GeneratorFactory::createGenerator(GeneratorFactory::GMP));
        }
    }

    /**
     * @expectedException \Noxlogic\ShortId\Exception\GeneratorNotFoundException
     */
    public function testFactoryDoesNotFindUnknownGenerator()
    {
        GeneratorFactory::createGenerator("unknown-generator");
    }

}
