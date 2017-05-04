<?php

namespace Noxlogic\ShortId\Tests\Encoder;

use Noxlogic\ShortId\Encoder\Base58;

class Base58Test extends \PHPUnit_Framework_TestCase
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
            array("121415959259252", "BxmQxcGDNy"),
            array("1234567890", "348ALp7"),
            array("0xdeadbeef", "6h8cQN"),
        );
    }

    /**
     * @dataProvider encoderDataProvider
     */
    public function testEncode($plain_text, $encoded_text)
    {
        $encoder = new Base58();

        $this->assertEquals($encoded_text, $encoder->encode($plain_text));
    }

}
