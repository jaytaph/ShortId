<?php

namespace Noxlogic\ShortId\Tests\Encoder;

use Noxlogic\ShortId\Encoder\Base64;

class Base64Test extends \PHPUnit_Framework_TestCase
{

    protected function setUp()
    {
        if (!extension_loaded('gmp')) {
            $this->markTestSkipped('The GMP extension is not available.');
        }
    }

    public function encoderDataProvider()
    {
        return array(
            array("121415959259252", "EhQVlZJZJSA="),
            array("1234567890", "EjRWeJA="),
            array("deadbeef", "3q2+7w=="),
        );
    }

    /**
     * @dataProvider encoderDataProvider
     */
    public function testEncode($plain_text, $encoded_text)
    {
        $encoder = new Base64();

        $this->assertEquals($encoded_text, $encoder->encode($plain_text));
    }

}
