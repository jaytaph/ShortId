<?php

namespace Noxlogic\ShortId\Tests\Generator;

use Noxlogic\ShortId\Generator\Plain;

class PlainTest extends GeneratorTestCase
{

    /**
     * @dataProvider generateDataProvider
     */
    public function testGenerate($seconds, $random, $short_id)
    {
        $generator = new Plain();

        $this->assertEquals($short_id, $generator->generate($seconds, $random));
    }

}
