<?php

namespace Noxlogic\ShortId\Tests;

use Noxlogic\ShortId\Encoder\Base58;
use Noxlogic\ShortId\Encoder\Base64;
use Noxlogic\ShortId\Generator\Plain;
use Noxlogic\ShortId\ShortId;
use Noxlogic\ShortId\Tests\_Mock\TestGenerator;

class ShortIdTest extends \PHPUnit_Framework_TestCase
{

    public function testGenerate()
    {
        $this->assertInstanceOf("\\Noxlogic\\ShortId\\ShortId", ShortId::generate());
    }

    public function testGenerator()
    {
        $this->assertInstanceOf("\\Noxlogic\\ShortId\\ShortId", ShortId::generate(new Plain()));
    }

    public function testEncoder()
    {
        $this->assertEquals("EjRWePANEjQ=", (string)ShortId::generate(new TestGenerator(12345678, "f00d1234")));
        $this->assertEquals("EjRWePANEjQ=", (string)ShortId::generate(new TestGenerator(12345678, "f00d1234"), new Base64()));
    }

    public function testBase58GmpEncoder() {
        if (! extension_loaded('gmp')) {
            $this->markAsSkipped();
        }

        $this->assertEquals("43c9JK1Avbd", (string)ShortId::generate(new TestGenerator(12345678, "f00d1234"), new Base58()));
    }

    public function testEquals()
    {
        $id1 = ShortId::generate();
        $id2 = ShortId::generate();

        $this->assertTrue($id1->equals($id1));

        $this->assertFalse($id1->equals($id2));
        $this->assertFalse($id2->equals($id1));
    }

}
