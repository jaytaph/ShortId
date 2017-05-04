A simple short ID generator as an alternative for UUIDs

This package is based on the blogpost: https://eager.io/blog/how-long-does-an-id-need-to-be/
and others.


Usage:

    composer require noxlogic/shortid
    

In your code:

    $id = ShortId::generate();
    
Or a bit more in control:

    $generator = new Gmp();
    $encoder = new Base58();
    $id = ShortId::generate($generator, $encoder);


# Generators
These are the actual generators that converts the generated number. This can be done in multiple ways but by 
leveraging extensions like GMP (and possibly BCMATH) should speed up generation. Currently there is a plain generator
and a GMP generator. When possible, the shortner will use GMP when available.
  
# Encoders
This will convert the actual number into something that can be used on your website by encoding the data. There are
two: base64, which will encode in a generic way, and base58 encoder, which will compact the number even a bit more. It
will also generate only url-safe numbers by not using some url-unsafe characters that base64 uses.

