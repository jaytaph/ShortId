<?php

namespace Noxlogic\ShortId;


use Noxlogic\ShortId\Encoder\Base64;

class ShortId
{
    /** @var string */
    protected $id;

    /**
     * @param GeneratorInterface $generator
     * @param EncoderInterface $encoder
     * @return ShortId
     */
    static function generate(GeneratorInterface $generator = null, EncoderInterface $encoder = null)
    {
        if (is_null($generator)) {
            $generator = GeneratorFactory::createGenerator(GeneratorFactory::PLAIN);
        }
        if (is_null($encoder)) {
            $encoder = new Base64();
        }

        // Calculate number of seconds in this year
        $year_start = mktime(0, 0, 0, 1, 1, date('Y'));
        $seconds = abs(time() - $year_start);

        // Generate random string
        $random = bin2hex(random_bytes(8));

        // Encode
        $id = $generator->generate($seconds, $random);

        return new self($encoder->encode($id));
    }

    /**
     * ShortId constructor.
     * @param string $id
     */
    protected function __construct($id)
    {
        $this->id = $id;
    }

    /**
     * @param ShortId $other
     * @return bool
     */
    function equals(ShortId $other)
    {
        return (string)$this == (string)$other;
    }

    /**
     * @return string
     */
    function __toString()
    {
        return $this->id;
    }
}
