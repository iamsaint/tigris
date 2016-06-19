<?php
/**
 * @author Alexey Samoylov <alexey.samoylov@gmail.com>
 */
use Tigris\Exceptions\TelegramTypeException;
use Tigris\Types\Location;
use Tigris\Types\Scalar\ScalarFloat;
use Tigris\Types\Video;

class LocationTest extends PHPUnit_Framework_TestCase
{
    public function testBuild()
    {
        $a = Location::build([
            'longitude' => 0.5,
            'latitude' => 0.5,
        ]);

        $this->assertInstanceOf(Location::class, $a);
        $this->assertAttributeInstanceOf(ScalarFloat::class, 'longitude', $a);
        $this->assertAttributeInstanceOf(ScalarFloat::class, 'latitude', $a);

        $b = Location::build($a);
        $this->assertSame($a, $b);

        $z = Location::build(null);
        $this->assertNull($z);

        try {
            Location::build(123);
            $this->fail('Expected exception not thrown');
        } catch (\Exception $e) {
            $this->assertInstanceOf(TelegramTypeException::class, $e);
        }

        try {
            Location::build([]);
            $this->fail('Expected exception not thrown');
        } catch (\Exception $e) {
            $this->assertInstanceOf(TelegramTypeException::class, $e);
        }
    }
}
