<?php
/**
 * @author Alexey Samoylov <alexey.samoylov@gmail.com>
 */
use Tigris\Exceptions\TelegramTypeException;
use Tigris\Types\Contact;
use Tigris\Types\Scalar\ScalarInteger;
use Tigris\Types\Scalar\ScalarString;

class ContactTest extends PHPUnit_Framework_TestCase
{
    public function testBuild()
    {
        $a = Contact::parse([
            'phone_number' => '+100500',
            'first_name' => 'Tigris',
            'last_name' => 'Bot',
            'user_id' => 123,
        ]);

        $this->assertInstanceOf(Contact::class, $a);
        $this->assertAttributeSame('+100500', 'phone_number', $a);
        $this->assertAttributeSame('Tigris', 'first_name', $a);
        $this->assertAttributeSame('Bot', 'last_name', $a);
        $this->assertAttributeSame(123, 'user_id', $a);

        $b = Contact::parse($a);
        $this->assertSame($a, $b);

        $z = Contact::parse(null);
        $this->assertNull($z);

        try {
            Contact::parse('scalar');
            $this->fail('Expected exception not thrown');
        } catch (\Exception $e) {
            $this->assertInstanceOf(TelegramTypeException::class, $e);
        }

        try {
            Contact::parse([]);
            $this->fail('Expected exception not thrown');
        } catch (\Exception $e) {
            $this->assertInstanceOf(TelegramTypeException::class, $e);
        }
    }
}
