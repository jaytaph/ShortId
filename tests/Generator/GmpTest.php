<?php

namespace Noxlogic\ShortId\Tests\Generator;

use Noxlogic\ShortId\Generator\Gmp;

class GmpTest extends GeneratorTestCase
{

    protected function setUp()
    {
        if (!extension_loaded('gmp')) {
            $this->markTestSkipped('The GMP extension is not available.');
        }
    }


    /**
     * @dataProvider generateDataProvider
     */
    public function testGenerate($seconds, $random, $short_id)
    {
        $generator = new Gmp();

        $this->assertEquals($short_id, $generator->generate($seconds, $random));
    }

}
