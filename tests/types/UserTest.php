<?php
/**
 * @author Alexey Samoylov <alexey.samoylov@gmail.com>
 */
use Tigris\Exceptions\TelegramTypeException;
use Tigris\Types\Scalar\ScalarInteger;
use Tigris\Types\Scalar\ScalarString;
use Tigris\Types\User;

class UserTest extends PHPUnit_Framework_TestCase
{
    public function testBuild()
    {
        $a = User::parse([
            'id' => 100500,
            'first_name' => 'Tigris',
            'last_name' => 'Bot',
            'username' => '@tigrisbot',
        ]);

        $this->assertInstanceOf(User::class, $a);
        $this->assertAttributeSame(100500, 'id', $a);
        $this->assertAttributeSame('Tigris', 'first_name', $a);
        $this->assertAttributeSame('Bot', 'last_name', $a);
        $this->assertAttributeSame('@tigrisbot', 'username', $a);

        $b = User::parse($a);
        $this->assertSame($a, $b);

        $z = User::parse(null);
        $this->assertNull($z);

        try {
            User::parse('scalar');
            $this->fail('Expected exception not thrown');
        } catch (\Exception $e) {
            $this->assertInstanceOf(TelegramTypeException::class, $e);
        }

        try {
            User::parse([]);
            $this->fail('Expected exception not thrown');
        } catch (\Exception $e) {
            $this->assertInstanceOf(TelegramTypeException::class, $e);
        }
    }
}
